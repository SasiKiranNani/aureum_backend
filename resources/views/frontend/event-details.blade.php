@extends('layouts.frontend.index')

@section('contents')
    <section id="section-hero" class="section-dark no-top no-bottom text-light jarallax relative mh-500 jarallax">
        <img src="{{ asset('frontend/images/background/3.webp') }}" class="jarallax-img" alt="">
        <div class="gradient-edge-bottom h-50"></div>
        <div class="sw-overlay op-5"></div>
        <div class="abs bottom-10 z-2 w-100">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-8">
                        <h1 class="text-start fs-48 fs-sm-10vw wow fadeIn" data-wow-delay=".6s">
                            {{ $event->title }}
                        </h1>
                        <div class="spacer-single"></div>
                        <div class="d-flex gap-4 wow fadeIn" data-wow-delay=".8s">
                            <div>
                                <i class="fa fa-calendar id-color me-2"></i>
                                <span>{{ $event->event_date->format('d M, Y') }}</span>
                            </div>
                            <div>
                                <i class="fa fa-ticket id-color me-2"></i>
                                <span>${{ number_format($event->ticket_price, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="relative text-lg-end">
                            <div class="d-inline-block z-2 bg-color rounded-1 text-white p-4 text-center fw-600 wow fadeIn"
                                data-wow-delay="1s">
                                <h4 class="fs-60 mb-0 lh-1">{{ $event->event_date->format('d') }}</h4>
                                <span class="fs-20 fw-60">{{ $event->event_date->format('M') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-read">
                        <div class="post-text">
                            <img src="{{ asset('storage/' . $event->thumbnail_img) }}" class="w-100 rounded-20 mb-4"
                                alt="{{ $event->title }}">

                            <div class="mb-5 p-4 rounded-20 bg-dark text-light border-gold-op">
                                <div class="row g-4">
                                    <div class="col-md-6 border-end border-white-op-1">
                                        <h5 class="text-gold text-uppercase mb-2">Booking Opens</h5>
                                        <p class="mb-0 fs-18">{{ $event->booking_start_date->format('d M, Y') }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="text-gold text-uppercase mb-2">Booking Deadline</h5>
                                        <p class="mb-0 fs-18">{{ $event->booking_deadline_date->format('d M, Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="description-text mb-5">
                                {!! $event->description !!}
                            </div>

                            @if ($event->images && count($event->images) > 0)
                                <div class="gallery-section mt-5">
                                    <h3 class="mb-4">Event Gallery</h3>
                                    <div class="row g-3">
                                        @foreach ($event->images as $image)
                                            <div class="col-md-4">
                                                <div class="rounded-10 overflow-hidden relative hover">
                                                    <img src="{{ asset('storage/' . $image) }}"
                                                        class="w-100 hover-scale-1-1" alt="Gallery Image"
                                                        style="height: 200px; object-fit: cover;">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sticky-top pt-5" style="top: 100px;">
                        <div class="p-4 rounded-20 bg-dark text-light border-gold shadow-lg">
                            <h4 class="mb-4">Reserve Your Spot</h4>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Ticket Price</span>
                                    <span class="fw-bold text-gold">${{ number_format($event->ticket_price, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Event Date</span>
                                    <span>{{ $event->event_date->format('d M, Y') }}</span>
                                </div>
                            </div>

                            @php
                                $now = now();
                                $isBookingOpen = $now->between(
                                    $event->booking_start_date,
                                    $event->booking_deadline_date->endOfDay(),
                                );
                            @endphp

                            @if ($isBookingOpen)
                                @auth
                                    <button class="btn-main w-100 text-center py-3" id="btn-book-now">Book Now</button>
                                @else
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#authModal"
                                        class="btn-main w-100 text-center py-3">Login to Book</a>
                                @endauth
                            @elseif($now->lt($event->booking_start_date))
                                <div class="booking-status-box coming-soon p-3 rounded-12 text-center">
                                    <i class="fa fa-hourglass-start text-gold fs-24 mb-2"></i>
                                    <h6 class="text-white mb-1">Booking Opens Soon</h6>
                                    <p class="small text-white-50 mb-0">Starting
                                        {{ $event->booking_start_date->format('d M, Y') }}</p>
                                </div>
                            @else
                                <div class="booking-status-box closed p-3 rounded-12 text-center">
                                    <i class="fa fa-calendar-times text-danger fs-32 mb-2"></i>
                                    <h5 class="text-white mb-1">Bookings Closed</h5>
                                    <p class="small text-white-50 mb-0">The booking deadline for this event has passed.</p>
                                </div>
                            @endif

                            <p class="small text-center mt-3 text-muted">Limited seats available. Book early to secure your
                                ticket.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-gold text-light">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title text-gold uppercase letter-spacing-1">Secure Your Entry</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="booking-summary mb-4 p-3 rounded-12 bg-white-op-05">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-white-op-60">Event</span>
                            <span class="fw-bold">{{ $event->title }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-white-op-60">Ticket Price</span>
                            <span class="text-gold fw-bold">${{ number_format($event->ticket_price, 2) }}</span>
                        </div>
                        <hr class="border-white-op-1">
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold">Total Amount</span>
                            <span class="text-gold fw-bold fs-20">${{ number_format($event->ticket_price, 2) }}</span>
                        </div>
                    </div>

                    <h6 class="mb-3 text-uppercase small letter-spacing-1 text-white-op-60">Select Payment Method</h6>
                    <div class="payment-methods row g-3">
                        @foreach ($paymentGateways as $gateway)
                            <div class="col-6">
                                <label class="payment-card w-100 h-100 d-flex flex-column align-items-center gap-2">
                                    <input type="radio" name="payment_method"
                                        value="{{ strtolower($gateway->name) }}">
                                    <div class="payment-icon text-gold fs-32">
                                        @if (strtolower($gateway->name) === 'paypal')
                                            <i class="icofont-brand-paypal"></i>
                                        @elseif(strtolower($gateway->name) === 'stripe' ||
                                                strtolower($gateway->name) === 'razorpay' ||
                                                strtolower($gateway->name) === 'payu')
                                            <i class="icofont-credit-card"></i>
                                        @else
                                            <i class="icofont-money"></i>
                                        @endif
                                    </div>
                                    <span class="small fw-600">{{ $gateway->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div id="payment-error" class="alert alert-danger mt-3 d-none"></div>

                    <button id="btn-confirm-payment" class="btn-main w-100 mt-4 py-3 btn-pay">
                        Confirm & Pay
                    </button>

                    <p class="text-center mt-3 small text-white-op-40">
                        <i class="fa fa-lock me-1"></i> Secure Encrypted Payment
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bank Account Details Modal -->
    <div class="modal fade" id="bankAccountModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content"
                style="background: rgba(18, 18, 18, 0.98); backdrop-filter: blur(20px); border: 1px solid rgba(255, 215, 0, 0.3); border-radius: 20px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title text-gold text-uppercase" style="letter-spacing: 1px;">
                        <i class="icofont-bank me-2"></i>Wire Transfer / ACH
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- Step 1: Select Bank Account -->
                    <div id="step-1-bank">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h6 class="text-white mb-0">Step 1: Select Bank Account</h6>
                            <span class="badge bg-gold text-dark">1 of 2</span>
                        </div>

                        <div class="alert alert-info mb-4"
                            style="background: rgba(13, 110, 253, 0.1); border: 1px solid rgba(13, 110, 253, 0.3); color: #fff;">
                            <i class="icofont-info-circle me-2"></i>
                            Select a bank account below to view details and complete your payment.
                        </div>

                        <div id="bank-accounts-list">
                            @if (isset($bankAccounts) && $bankAccounts->count() > 0)
                                @foreach ($bankAccounts as $index => $account)
                                    <label class="bank-account-card d-block mb-3 p-0" style="cursor: pointer;">
                                        <input type="radio" name="selected_bank_account" value="{{ $account->id }}"
                                            class="d-none bank-radio"
                                            {{ $index === 0 && $bankAccounts->count() == 1 ? 'checked' : '' }}>

                                        <div class="card-content p-4"
                                            style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 215, 0, 0.2); border-radius: 15px; transition: all 0.3s ease;">

                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="text-gold mb-0">
                                                    <i class="icofont-bank-alt me-2"></i>Option {{ $index + 1 }}
                                                </h6>
                                                <div class="check-indicator">
                                                    <i class="icofont-check-circled fs-4 text-white-50"></i>
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="account-field">
                                                        <label class="text-white-50 small mb-1">Account Holder Name</label>
                                                        <div class="d-flex align-items-center justify-content-between p-2 rounded"
                                                            style="background: rgba(255, 255, 255, 0.05);">
                                                            <span
                                                                class="text-white fw-bold">{{ $account->holder_name }}</span>
                                                            <button type="button"
                                                                class="btn btn-sm btn-gold-filled copy-btn"
                                                                data-copy="{{ $account->holder_name }}" title="Copy">
                                                                <i class="icofont-copy"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="account-field">
                                                        <label class="text-white-50 small mb-1">Account Number</label>
                                                        <div class="d-flex align-items-center justify-content-between p-2 rounded"
                                                            style="background: rgba(255, 255, 255, 0.05);">
                                                            <span
                                                                class="text-white fw-bold">{{ $account->account_number }}</span>
                                                            <button type="button"
                                                                class="btn btn-sm btn-gold-filled copy-btn"
                                                                data-copy="{{ $account->account_number }}"
                                                                title="Copy">
                                                                <i class="icofont-copy"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="account-field">
                                                        <label class="text-white-50 small mb-1">Account Type</label>
                                                        <div class="d-flex align-items-center justify-content-between p-2 rounded"
                                                            style="background: rgba(255, 255, 255, 0.05);">
                                                            <span
                                                                class="text-white fw-bold">{{ $account->account_type }}</span>
                                                            <button type="button"
                                                                class="btn btn-sm btn-gold-filled copy-btn"
                                                                data-copy="{{ $account->account_type }}" title="Copy">
                                                                <i class="icofont-copy"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if ($account->routing_number)
                                                    <div class="col-md-6">
                                                        <div class="account-field">
                                                            <label class="text-white-50 small mb-1">
                                                                Routing Number
                                                                <span class="text-muted" style="font-size: 10px;">(For US
                                                                    transfers)</span>
                                                            </label>
                                                            <div class="d-flex align-items-center justify-content-between p-2 rounded"
                                                                style="background: rgba(255, 255, 255, 0.05);">
                                                                <span
                                                                    class="text-white fw-bold">{{ $account->routing_number }}</span>
                                                                <button type="button"
                                                                    class="btn btn-sm btn-gold-filled copy-btn"
                                                                    data-copy="{{ $account->routing_number }}"
                                                                    title="Copy">
                                                                    <i class="icofont-copy"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($account->swift_bic)
                                                    <div class="col-md-6">
                                                        <div class="account-field">
                                                            <label class="text-white-50 small mb-1">
                                                                SWIFT/BIC Code
                                                                <span class="text-muted" style="font-size: 10px;">(For
                                                                    international transfers)</span>
                                                            </label>
                                                            <div class="d-flex align-items-center justify-content-between p-2 rounded"
                                                                style="background: rgba(255, 255, 255, 0.05);">
                                                                <span
                                                                    class="text-white fw-bold">{{ $account->swift_bic }}</span>
                                                                <button type="button"
                                                                    class="btn btn-sm btn-gold-filled copy-btn"
                                                                    data-copy="{{ $account->swift_bic }}" title="Copy">
                                                                    <i class="icofont-copy"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            @else
                                <div class="alert alert-warning"
                                    style="background: rgba(255, 193, 7, 0.1); border: 1px solid rgba(255, 193, 7, 0.3); color: #fff;">
                                    <i class="icofont-warning me-2"></i>
                                    No bank account details are currently available. Please contact support.
                                </div>
                            @endif
                        </div>

                        <div id="step-1-error" class="alert alert-danger d-none mb-3"></div>

                        <div class="mt-4 text-center">
                            <button type="button" id="btn-next-step" class="btn-main w-100 py-3">
                                Next: Upload Proof <i class="icofont-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Upload Proof -->
                    <div id="step-2-proof" class="d-none">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h6 class="text-white mb-0">Step 2: Upload Proof of Payment</h6>
                            <span class="badge bg-gold text-dark">2 of 2</span>
                        </div>

                        <div class="alert alert-warning mb-4"
                            style="background: rgba(255, 193, 7, 0.1); border: 1px solid rgba(255, 193, 7, 0.3); color: #fff;">
                            <i class="icofont-exclamation-circle me-2"></i>
                            <strong>Important:</strong> Please upload the payment receipt OR enter the transaction ID.
                        </div>

                        <div class="mb-3">
                            <label class="text-white mb-2">Upload Invoice / Receipt</label>
                            <input type="file" id="manual_payment_invoice" class="form-control"
                                accept="image/*,.pdf">
                            <small class="text-white-50">Accepted formats: JPG, PNG, PDF. Max 5MB.</small>
                        </div>

                        <div class="text-center my-3 text-white-50">- OR -</div>

                        <div class="mb-4">
                            <label class="text-white mb-2">Transaction ID / Reference Number</label>
                            <input type="text" id="transaction_id" class="form-control"
                                placeholder="e.g. TXN123456789">
                        </div>

                        <div id="manual-payment-error" class="alert alert-danger d-none mb-3"></div>

                        <div class="mt-4 d-flex gap-3">
                            <button type="button" id="btn-prev-step" class="btn btn-outline-light w-50 py-3">
                                <i class="icofont-arrow-left me-2"></i> Back
                            </button>
                            <button type="button" id="btn-submit-manual" class="btn-main w-50 py-3">
                                <i class="icofont-check-circled me-2"></i> Submit Payment
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        html,
        body {
            overflow: visible !important;
        }

        .modal-gold {
            background: rgba(18, 18, 18, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 215, 0, 0.3);
            border-radius: 20px;
        }

        .payment-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .payment-card:hover,
        .payment-card.active {
            border-color: #FFD700;
            background: rgba(255, 215, 0, 0.05);
        }

        .payment-card input {
            position: absolute;
            opacity: 0;
        }

        .payment-card img {
            height: 30px;
            object-fit: contain;
        }

        .btn-pay {
            background: linear-gradient(135deg, #FFD700 0%, #FF6B00 100%);
            border: none;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 0, 0.4);
        }

        .sticky-top {
            z-index: 0;
        }

        .border-gold-op {
            border: 1px solid rgba(255, 215, 0, 0.2);
        }

        .border-gold {
            border: 1px solid #FFD700;
        }

        .text-gold {
            color: #FFD700;
        }

        .bg-blur {
            backdrop-filter: blur(10px);
        }

        .rounded-20 {
            border-radius: 20px;
        }

        .rounded-10 {
            border-radius: 10px;
        }

        .cursor-not-allowed {
            cursor: not-allowed;
        }

        .description-text p {
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .booking-status-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .booking-status-box.coming-soon {
            border-color: rgba(255, 215, 0, 0.2);
        }

        .booking-status-box.closed {
            border-color: rgba(220, 53, 69, 0.3);
            background: rgba(220, 53, 69, 0.02);
        }

        /* Bank Account Card Selectable Styles */
        .bank-radio:checked+.card-content {
            border-color: #FFD700 !important;
            background: rgba(255, 215, 0, 0.1) !important;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.2);
        }

        .bank-radio:checked+.card-content .check-indicator i {
            color: #FFD700 !important;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
        }

        .btn-gold-filled {
            background: #FFD700;
            color: #000;
            border: 1px solid #FFD700;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-gold-filled:hover {
            background: #fff;
            color: #000;
            border-color: #fff;
            transform: scale(1.05);
        }

        /* Manual Payment Input Styles */
        #manual_payment_invoice,
        #transaction_id {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        #manual_payment_invoice:focus,
        #transaction_id:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #FFD700;
            box-shadow: 0 0 0 0.25rem rgba(255, 215, 0, 0.25);
            color: #fff;
        }

        #transaction_id::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        #manual_payment_invoice::file-selector-button {
            background: #FFD700;
            border: none;
            color: #000;
            padding: 5px 10px;
            margin-right: 10px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        /* SweetAlert2 Overrides for Premium Feel */
        div.swal2-popup.border-gold {
            border: 1px solid #FFD700 !important;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.2) !important;
            padding: 40px !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
        }

        div.swal2-icon {
            margin: 0 auto 20px auto !important;
            display: flex !important;
        }

        div.swal2-title {
            padding: 0 !important;
            margin-bottom: 10px !important;
            width: 100% !important;
            text-align: center !important;
        }

        div.swal2-html-container {
            margin: 30px 0 30px 0 !important;
            width: 100% !important;
            text-align: center !important;
        }

        div.swal2-actions {
            width: 100% !important;
            justify-content: center !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookingModalEl = document.getElementById('bookingModal');
            if (!bookingModalEl) return;

            const bookingModal = new bootstrap.Modal(bookingModalEl);
            const btnBookNow = document.getElementById('btn-book-now');
            const btnConfirmPayment = document.getElementById('btn-confirm-payment');
            const paymentError = document.getElementById('payment-error');
            let selectedMethod = null;

            if (btnBookNow) {
                btnBookNow.addEventListener('click', function() {
                    bookingModal.show();
                });
            }

            document.querySelectorAll('.payment-card').forEach(card => {
                card.addEventListener('click', function() {
                    document.querySelectorAll('.payment-card').forEach(c => c.classList.remove(
                        'active'));
                    this.classList.add('active');
                    const radio = this.querySelector('input[name="payment_method"]');
                    if (radio) {
                        radio.checked = true;
                        selectedMethod = radio.value;
                    }
                });
            });

            // Manual Payment 2-Step Logic
            const btnNextStep = document.getElementById('btn-next-step');
            const btnPrevStep = document.getElementById('btn-prev-step');
            const btnSubmitManual = document.getElementById('btn-submit-manual');
            const step1 = document.getElementById('step-1-bank');
            const step2 = document.getElementById('step-2-proof');
            const step1Error = document.getElementById('step-1-error');
            const manualPaymentError = document.getElementById('manual-payment-error');

            let currentBookingId = null; // Store after initial "Confirm & Pay"

            // Create booking on "Confirm & Pay" if Wire Transfer
            if (btnConfirmPayment) {
                btnConfirmPayment.addEventListener('click', async function() {
                    if (!selectedMethod) {
                        alert('Please select a payment method');
                        return;
                    }

                    // Check for manual payment method
                    const isManualPayment = selectedMethod.includes('wire') ||
                        selectedMethod.includes('ach') ||
                        selectedMethod.includes('bank') ||
                        selectedMethod.includes('transfer');

                    if (isManualPayment) {
                        const btn = this;
                        const originalText = btn.innerHTML;
                        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Initializing...';
                        btn.disabled = true;

                        try {
                            // Create Booking to get ID
                            const bookingResponse = await fetch("{{ route('event.book') }}", {
                                method: "POST",
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                    'X-Requested-With': 'XMLHttpRequest'
                                },
                                body: new URLSearchParams({
                                    event_id: "{{ $event->id }}"
                                })
                            });

                            const bookingData = await bookingResponse.json();

                            if (bookingData.success) {
                                currentBookingId = bookingData.data.booking_id; // DB ID

                                // Switch to Bank Modal
                                const bankModalElement = document.getElementById('bankAccountModal');
                                const bookingModalEl = document.getElementById('bookingModal');
                                const bookingModalInstance = bootstrap.Modal.getInstance(
                                    bookingModalEl);
                                if (bookingModalInstance) {
                                    bookingModalInstance.hide();
                                }

                                if (bankModalElement) {
                                    const bankModal = new bootstrap.Modal(bankModalElement);
                                    bankModal.show();

                                    // Reset steps
                                    step1.classList.remove('d-none');
                                    step2.classList.add('d-none');
                                }
                            } else {
                                alert(bookingData.message || 'Booking initiation failed');
                            }
                        } catch (err) {
                            console.error(err);
                            alert('Error initializing booking');
                        } finally {
                            btn.innerHTML = originalText;
                            btn.disabled = false;
                        }
                        return;
                    }

                    // ... (Existing logic for other gateways) ...
                    const btn = this;
                    const originalText = btn.innerHTML;
                    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Initializing...';
                    btn.disabled = true;
                    paymentError.classList.add('d-none');

                    try {
                        // 1. Create Booking
                        const bookingResponse = await fetch("{{ route('event.book') }}", {
                            method: "POST",
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: new URLSearchParams({
                                event_id: "{{ $event->id }}"
                            })
                        });

                        const bookingData = await bookingResponse.json();

                        if (bookingData.success) {
                            initiatePayment(bookingData.data.booking_id, selectedMethod, btn,
                                originalText);
                        } else {
                            showError(bookingData.message || 'Booking initiation failed', btn,
                                originalText);
                        }
                    } catch (err) {
                        showError('Error occurred during booking', btn, originalText);
                    }

                });
            }

            // Bank Modal Navigation
            if (btnNextStep) {
                btnNextStep.addEventListener('click', function() {
                    const selectedBank = document.querySelector(
                        'input[name="selected_bank_account"]:checked');
                    if (!selectedBank) {
                        step1Error.textContent = 'Please select a bank account.';
                        step1Error.classList.remove('d-none');
                        return;
                    }
                    step1Error.classList.add('d-none');

                    // Proceed to Step 2
                    step1.classList.add('d-none');
                    step2.classList.remove('d-none');
                });
            }

            if (btnPrevStep) {
                btnPrevStep.addEventListener('click', function() {
                    step2.classList.add('d-none');
                    step1.classList.remove('d-none');
                });
            }

            // Final Submission
            if (btnSubmitManual) {
                btnSubmitManual.addEventListener('click', async function() {
                    const fileInput = document.getElementById('manual_payment_invoice');
                    const transactionIdInput = document.getElementById('transaction_id');
                    const selectedBank = document.querySelector(
                        'input[name="selected_bank_account"]:checked');

                    if (!fileInput.files[0] && !transactionIdInput.value.trim()) {
                        manualPaymentError.textContent =
                            'Please either upload a proof file OR enter a transaction ID.';
                        manualPaymentError.classList.remove('d-none');
                        return;
                    }

                    manualPaymentError.classList.add('d-none');
                    const btn = this;
                    const originalText = btn.innerHTML;
                    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Submitting...';
                    btn.disabled = true;

                    const formData = new FormData();
                    formData.append('booking_id', currentBookingId);
                    formData.append('event_id', "{{ $event->id }}");
                    formData.append('bank_account_id', selectedBank ? selectedBank.value : '');
                    formData.append('payment_gateway', 'wiretransfer/ach');
                    formData.append('transaction_id', transactionIdInput.value.trim());

                    if (fileInput.files[0]) {
                        formData.append('manual_payment_invoice', fileInput.files[0]);
                    }

                    formData.append('_token', "{{ csrf_token() }}");

                    try {
                        const response = await fetch("{{ route('event.manual-payment-store') }}", {
                            method: "POST",
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });

                        const data = await response.json();

                        if (data.success) {
                            // Hide Modal & Show Success
                            const bankModalElement = document.getElementById('bankAccountModal');
                            const bankModal = bootstrap.Modal.getInstance(bankModalElement);
                            bankModal.hide();

                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    icon: 'success',
                                    title: '<span style="color: #FFD700">Payment Submitted!</span>',
                                    html: '<span style="color: #fff">The council will verify your payment and update you shortly.</span>',
                                    background: '#1a1a1a',
                                    confirmButtonColor: '#FFD700',
                                    confirmButtonText: '<span style="color: #000; font-weight: bold;">Okay</span>',
                                    iconColor: '#FFD700',
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    },
                                    customClass: {
                                        popup: 'border-gold',
                                        confirmButton: 'px-5 py-2'
                                    }
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                alert('Payment Submitted! The council will verify your payment.');
                                window.location.reload();
                            }
                        } else {
                            manualPaymentError.textContent = data.message || 'Submission failed.';
                            manualPaymentError.classList.remove('d-none');
                            btn.innerHTML = originalText;
                            btn.disabled = false;
                        }

                    } catch (err) {
                        console.error(err);
                        manualPaymentError.textContent = 'An error occurred. Please try again.';
                        manualPaymentError.classList.remove('d-none');
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                    }
                });
            }
        });
    </script>
@endpush
