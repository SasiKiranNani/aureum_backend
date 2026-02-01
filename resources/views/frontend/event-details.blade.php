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
    </style>

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

                if (btnConfirmPayment) {
                    btnConfirmPayment.addEventListener('click', async function() {
                        if (!selectedMethod) {
                            alert('Please select a payment method');
                            return;
                        }

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

                async function initiatePayment(bookingId, method, btn, originalText) {
                    try {
                        const paymentResponse = await fetch("{{ route('payment.initiate') }}", {
                            method: "POST",
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: new URLSearchParams({
                                event_booking_id: bookingId,
                                payment_method: method
                            })
                        });

                        const paymentData = await paymentResponse.json();

                        if (paymentData.success) {
                            handleGatewayRedirection(paymentData.payment_data, method, btn, originalText);
                        } else {
                            showError(paymentData.message || 'Payment initiation failed', btn,
                                originalText);
                        }
                    } catch (err) {
                        showError('Error during payment initialization', btn, originalText);
                    }
                }

                function handleGatewayRedirection(data, method, btn, originalText) {
                    if (data.url) {
                        if (data.payload) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = data.url;
                            for (const key in data.payload) {
                                const input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = key;
                                input.value = data.payload[key];
                                form.appendChild(input);
                            }
                            document.body.appendChild(form);
                            form.submit();
                        } else {
                            window.location.href = data.url;
                        }
                    } else if (method === 'razorpay') {
                        const options = {
                            ...data,
                            "handler": function(response) {
                                window.location.href =
                                    `/payment/success?razorpay_payment_id=${response.razorpay_payment_id}&razorpay_order_id=${response.razorpay_order_id}&razorpay_signature=${response.razorpay_signature}&event_booking_id=${data.notes.event_booking_id}`;
                            },
                            "modal": {
                                "ondismiss": function() {
                                    btn.innerHTML = originalText;
                                    btn.disabled = false;
                                }
                            }
                        };
                        const rzp = new Razorpay(options);
                        rzp.open();
                    }
                }

                function showError(msg, btn, originalText) {
                    paymentError.textContent = msg;
                    paymentError.classList.remove('d-none');
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }
            });
        </script>
    @endpush
@endsection
