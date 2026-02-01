@extends('frontend.dashboard.layout')

@section('dashboard-content')
    <div class="dashboard-content">
        <div class="row g-4">
            <div class="col-12">
                <div class="dashboard-card p-0 overflow-hidden mb-4">
                    <!-- Header with Status -->
                    <div class="card-header-premium p-4 d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-1">Booking Details</h4>
                            <span class="application-id fs-18 text-gold">{{ $booking->booking_id }}</span>
                        </div>
                        <div class="text-end">
                            <span
                                class="status-badge status-{{ $booking->payment_status === 'paid' ? 'paid' : 'pending' }} fs-14">
                                {{ strtoupper($booking->payment_status) }}
                            </span>
                            <a href="{{ route('dashboard.bookings') }}" class="d-block mt-2 text-gold fs-12">
                                <i class="fa fa-arrow-left me-1"></i> Back to Tickets
                            </a>
                        </div>
                    </div>

                    <div class="p-4">

                        <div class="row g-5">
                            <!-- Event Information section -->
                            <div class="col-12">
                                <div class="detail-section mb-2">
                                    <h5 class="section-title">Event Information</h5>

                                    <div class="info-grid mt-4">
                                        <div class="info-item mb-4">
                                            <label class="text-gold fs-12 text-uppercase fw-bold mb-1 d-block">Event
                                                Name</label>
                                            <h4 class="text-white mb-0 lh-1-4" style="font-size: 28px;">
                                                {{ optional($booking->event)->title ?? 'N/A' }}</h4>
                                        </div>

                                        <div class="row g-4">
                                            <div class="col-md-4">
                                                <div class="info-item">
                                                    <label class="text-gold fs-12 text-uppercase fw-bold mb-1 d-block">Event
                                                        Date</label>
                                                    <div class="text-white fs-18">
                                                        <i class="fa fa-calendar me-2 text-gold"></i>
                                                        {{ $booking->event && $booking->event->event_date ? $booking->event->event_date->format('M d, Y') : 'N/A' }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="info-item">
                                                    <label
                                                        class="text-gold fs-12 text-uppercase fw-bold mb-1 d-block">Booking
                                                        ID</label>
                                                    <div class="text-white">
                                                        <code class="fs-16 fw-bold">{{ $booking->booking_id }}</code>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="info-item">
                                                    <label
                                                        class="text-gold fs-12 text-uppercase fw-bold mb-1 d-block">Ticket
                                                        Number</label>
                                                    <div class="text-white">
                                                        <code class="fs-16 fw-bold">{{ $booking->ticket_number }}</code>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border-white opacity-10 my-2">
                            </div>

                            <!-- Payment Snapshot section -->
                            <div class="col-12">
                                <div class="detail-section">
                                    <h5 class="section-title">Payment Snapshot</h5>

                                    <div class="payment-card p-4 mt-4"
                                        style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 215, 0, 0.05);">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <div class="payment-item mb-3 mb-md-0">
                                                    <span
                                                        class="text-muted fs-11 text-uppercase fw-600 d-block mb-1">Status</span>
                                                    <span
                                                        class="status-badge status-{{ $booking->payment_status === 'paid' ? 'paid' : 'pending' }} fs-11">
                                                        {{ strtoupper($booking->payment_status) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="payment-item mb-3 mb-md-0">
                                                    <span
                                                        class="text-muted fs-11 text-uppercase fw-600 d-block mb-1">Gateway</span>
                                                    <span
                                                        class="text-white fw-bold text-uppercase fs-14">{{ $booking->payment_gateway ?? 'N/A' }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="payment-item mb-3 mb-md-0">
                                                    <span
                                                        class="text-muted fs-11 text-uppercase fw-600 d-block mb-1">Transaction
                                                        ID</span>
                                                    <span
                                                        class="text-gold fs-13 fw-500">{{ $booking->transaction_id ?? 'N/A' }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-md-end">
                                                <div class="payment-item">
                                                    <span class="text-white-80 fs-12 fw-600 d-block mb-1">Amount Paid</span>
                                                    <span
                                                        class="text-gold fs-32 fw-bold lh-1">${{ number_format($booking->amount, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-muted fs-11 mt-4 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-info-circle me-2 text-gold"></i>
                                        <span>SETTLEMENT COMPLETED ON:
                                            {{ $booking->paid_at ? $booking->paid_at->format('F d, Y - H:i') : 'PENDING' }}</span>
                                    </div>

                                    {{-- Remaining contents like Captured Gateway Details commented as requested --}}
                                    {{--
                                    @if ($booking->payment_details)
                                        <div class="mt-4">
                                            <label class="text-muted fs-11 text-uppercase fw-bold mb-2 d-block">Captured Gateway Details</label>
                                            <div class="details-box p-3 rounded-10 bg-white-02 border-white-05">
                                                <div class="details-scrollable custom-scrollbar" style="max-height: 250px; overflow-y: auto;">
                                                    @foreach ($booking->payment_details as $key => $value)
                                                        @if (!is_array($value))
                                                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-white-05">
                                                                <small class="text-muted-gold fs-11 text-uppercase">{{ str_replace('_', ' ', $key) }}</small>
                                                                <small class="text-white-80 fs-12">{{ is_bool($value) ? ($value ? 'TRUE' : 'FALSE') : $value }}</small>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card-header-premium {
            background: rgba(255, 215, 0, 0.05);
            border-bottom: 1px solid rgba(255, 215, 0, 0.1);
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .status-paid {
            background: rgba(40, 167, 69, 0.15);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .status-pending {
            background: rgba(255, 193, 7, 0.15);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        .section-title {
            color: #FFD700;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
            font-weight: 700;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 30px;
            height: 2px;
            background: #FFD700;
        }

        .lh-1-4 {
            line-height: 1.4;
        }

        .fw-600 {
            font-weight: 600;
        }

        .fw-500 {
            font-weight: 500;
        }

        .fs-24 {
            font-size: 24px;
        }

        .fs-11 {
            font-size: 11px;
        }

        .payment-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 215, 0, 0.1);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .bg-white-02 {
            background: rgba(255, 255, 255, 0.02);
        }

        .border-white-05 {
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .text-white-80 {
            color: rgba(255, 255, 255, 0.8);
        }

        .text-muted-gold {
            color: rgba(255, 215, 0, 0.5);
        }

        .rounded-10 {
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.02);
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 215, 0, 0.2);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 215, 0, 0.4);
        }

        code {
            background: rgba(255, 215, 0, 0.1);
            color: #FFD700;
            padding: 4px 8px;
            border-radius: 4px;
            border: 1px solid rgba(255, 215, 0, 0.2);
        }

        .text-gold {
            color: #FFD700;
        }
    </style>
@endsection
