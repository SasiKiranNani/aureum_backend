@extends('frontend.dashboard.layout')

@section('dashboard-content')
    <div class="dashboard-content">
        <div class="row g-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">My Event Tickets</h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Event</th>
                                    <th>Ticket Number</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $booking)
                                    <tr>
                                        <td><span class="text-gold">{{ $booking->booking_id }}</span></td>
                                        <td>
                                            <div class="event-info">
                                                <span class="d-block fw-bold text-white">{{ $booking->event->title }}</span>
                                                <small class="text-muted"><i class="fa fa-calendar me-1"></i>
                                                    {{ $booking->event->event_date->format('M d, Y') }}</small>
                                            </div>
                                        </td>
                                        <td><code>{{ $booking->ticket_number }}</code></td>
                                        <td>{{ number_format($booking->amount, 2) }}</td>
                                        <td>
                                            @if ($booking->payment_status === 'paid')
                                                <span class="badge bg-success-soft text-success">Paid</span>
                                            @else
                                                <span
                                                    class="badge bg-warning-soft text-warning">{{ ucfirst($booking->payment_status) }}</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('dashboard.bookings.view', $booking->id) }}"
                                                style="display: inline-block; padding: 8px 20px; background-color: #FFD700; color: #000 !important; font-weight: 700; text-decoration: none !important; border-radius: 8px; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255, 215, 0, 0.2);"
                                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(255, 215, 0, 0.4)';"
                                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(255, 215, 0, 0.2)';"
                                                onclick="window.location.href=this.href; return true;">
                                                <i class="fa fa-eye me-1"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5">
                                            <div class="empty-state">
                                                <i class="fa fa-ticket fs-1 text-muted mb-3 d-block"></i>
                                                <p class="text-muted">No event bookings found.</p>
                                                <a href="{{ route('events') }}" class="btn btn-gold btn-sm mt-3">Browse
                                                    Events</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-table {
            color: #fff;
        }

        .custom-table thead th {
            border-top: none;
            border-bottom: 1px solid rgba(255, 215, 0, 0.1);
            color: rgba(255, 255, 255, 0.5);
            font-weight: 500;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            padding: 15px;
        }

        .custom-table tbody td {
            padding: 20px 15px;
            vertical-align: middle;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .text-gold {
            color: #FFD700;
        }

        .bg-success-soft {
            background: rgba(40, 167, 69, 0.1);
        }

        .bg-warning-soft {
            background: rgba(255, 193, 7, 0.1);
        }

        .btn-gold {
            background: #FFD700;
            color: #000;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            background: #e6c200;
            color: #000;
            transform: translateY(-2px);
        }

        code {
            background: rgba(255, 215, 0, 0.1);
            color: #FFD700;
            padding: 4px 8px;
            border-radius: 4px;
        }
    </style>
@endsection
