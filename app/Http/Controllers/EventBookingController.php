<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EventBookingController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|exists:events,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            DB::beginTransaction();

            $event = Event::findOrFail($request->event_id);
            $user = auth()->user();

            if (! $user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please login to book tickets.',
                ], 401);
            }

            // Backend date validation
            $now = now();
            if ($now->lt($event->booking_start_date)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Booking for this event has not started yet.',
                ], 400);
            }

            if ($now->gt($event->booking_deadline_date->endOfDay())) {
                return response()->json([
                    'success' => false,
                    'message' => 'Booking for this event has closed.',
                ], 400);
            }

            // Create a pending booking
            $booking = EventBooking::create([
                'booking_id' => EventBooking::generateBookingId(),
                'user_id' => $user->id,
                'event_id' => $event->id,
                'amount' => $event->ticket_price,
                'payment_status' => 'pending',
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Booking initiated!',
                'data' => [
                    'booking_id' => $booking->id,
                    'booking_display_id' => $booking->booking_id,
                    'event_title' => $event->title,
                    'amount' => $event->ticket_price,
                    'user_email' => $user->email,
                ],
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while initiating the booking.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function manualPaymentStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booking_id' => 'required|exists:event_bookings,id',
            'transaction_id' => 'nullable|string|max:255',
            'manual_payment_invoice' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Custom validation: Require at least one proof
        if (! $request->hasFile('manual_payment_invoice') && ! $request->filled('transaction_id')) {
            return response()->json([
                'success' => false,
                'message' => 'Please provide either a transaction ID or upload a payment proof.',
            ], 422);
        }

        try {
            DB::beginTransaction();

            $booking = EventBooking::where('id', $request->booking_id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            if ($booking->payment_status === 'completed') {
                return response()->json([
                    'success' => false,
                    'message' => 'This booking is already paid.',
                ], 400);
            }

            $booking->payment_gateway = 'wiretransfer/ach';
            $booking->payment_status = 'pending';

            if ($request->filled('transaction_id')) {
                $booking->transaction_id = $request->transaction_id;
            }

            if ($request->hasFile('manual_payment_invoice')) {
                $path = $request->file('manual_payment_invoice')->store('event-invoices', 'public');
                $booking->manual_payment_invoice = $path;
            }

            // Store bank account ID in details if provided
            if ($request->filled('bank_account_id')) {
                $booking->payment_details = ['bank_account_id' => $request->bank_account_id];
            }

            $booking->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Payment proof submitted successfully.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting payment proof.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
