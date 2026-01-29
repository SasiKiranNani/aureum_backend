@extends('layouts.frontend.index')

@section('contents')
    <section id="section-hero" class="section-dark no-top no-bottom text-light jarallax relative mh-800"
        data-jarallax-video="mp4:{{ asset('frontend/video/2.mp4') }}">
        <div class="gradient-edge-top op-6 h-50 color"></div>
        <div class="gradient-edge-bottom"></div>
        <div class="sw-overlay op-8"></div>
        <div class="abs abs-centered z-2 w-80">
            <div class="container wow scaleIn" data-wow-duration="3s">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="subtitle">Aureum Awards</div>
                        <h1 class="fs-60 text-uppercase fs-sm-12vw mb-4 lh-1">Global Standard for Celebrating Technological
                            Excellence</h1>

                        <div class="d-block d-md-flex justify-content-center">
                            <div class="mx-4 text-center">
                                <!-- <i class="fa
                                        fa-calendar id-color me-3"></i> -->
                                <h4 class="mb-0">Recognizing outstanding achievers in technology through a fair,
                                    transparent, and merit-driven process that earns international acclaim and sets a
                                    benchmark for innovation and excellence.</h4>
                            </div>

                            <!-- <div class="d-flex justify-content-center align-items-center mx-4">
                                                                                            <i class="fa fa-calendar id-color me-3"></i>
                                                                                            <h4 class="mb-0">October 1–5, 2025</h4>
                                                                                        </div> -->

                            <!-- <div class="d-flex justify-content-center align-items-center mx-4">
                                                                                            <i class="fa fa-location-pin id-color me-3"></i>
                                                                                            <h4 class="mb-0">San Francisco, CA</h4>
                                                                                        </div> -->
                        </div>

                        <div class="spacer-single"></div>

                        {{-- <a class="btn-main mx-2 fx-slide" href="#section-tickets"><span>Nominate Now</span></a> --}}
                        <a class="btn-main btn-line mx-2 fx-slide @if (!$activeSeason) open-season-closed-modal @endif"
                            href="{{ $activeSeason ? route('nomination') : 'javascript:void(0)' }}">
                            <span>submit your achievement</span>
                        </a>
                        {{-- <a class="btn-main mx-2 fx-slide" href="#section-tickets"><span>Verify Nominations</span></a> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="abs w-100 start-0 bottom-0 z-3" section="abs">
            <div class="container">
                <div class="sm-mt-30 border-white-op-3 p-40 py-4 rounded-1 bg-blur relative overflow-hidden wow fadeInUp">
                    <div class="gradient-edge-bottom color start-0 h-50 op-5"></div>
                    <div class="row g-4 justify-content-between align-items-center relative z-2">
                        <div class="col-lg-3 col-md-12 text-center text-lg-start">
                            @if ($activeSeason)
                                <h2 class="mb-0">Hurry Up!</h2>
                                <h4 class="mb-0">Apply for Nominations Now</h4>
                            @elseif($nextSeason)
                                <h2 class="mb-0">Coming Soon!</h2>
                                <h4 class="mb-0">Next Season Starts From</h4>
                            @else
                                <h2 class="mb-0">Closed</h2>
                                <h4 class="mb-0">Submissions are currently closed</h4>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-12 text-center">
                            <div id="defaultCountdown" class="pt-2"></div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="d-flex justify-content-center justify-content-lg-start">
                                <i class="fs-60 icofont-google-map id-color"></i>
                                <div class="ms-3">
                                    <h4 class="mb-0">121 AI Blvd,<br>San Francisco BCA 94107</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-about" class="bg-dark section-dark text-light">
        <div class="container">
            <div class="row  gx-5 align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="me-lg-5 pe-lg-5 py-5 my-5">
                        <div class="subtitle wow fadeInUp" data-wow-delay=".2s">About the Event</div>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">A Global Gathering of AI Innovators</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Join thought leaders, developers, researchers, and
                            founders as we explore how artificial intelligence is reshaping industries, creativity, and the
                            future
                            of work.</p>

                        <ul class="ul-check">
                            <li class="wow fadeInUp" data-wow-delay=".8s">5 days of keynotes, workshops, and networking</li>
                            <li class="wow fadeInUp" data-wow-delay=".9s">50 world-class speakers</li>
                            <li class="wow fadeInUp" data-wow-delay="1s">Startup showcase and live demos</li>
                        </ul>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="wow scaleIn">
                        <img src="{{ asset('frontend/images/misc/c1.webp') }}" class="w-100 rotate-animation"
                            alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section-dark p-0 scrolls" aria-label="section">
        <div class="bg-color text-light d-flex py-4 lh-1 rot-2">
            <div class="de-marquee-list-1 wow fadeInLeft" data-wow-duration="3s">
                @php
                    $scrolls = \App\Models\Scroll::where('is_active', true)->get();
                @endphp
                @foreach ($scrolls as $scroll)
                    <span class="fs-60 mx-3">{{ $scroll->content }}</span>
                    <span class="fs-60 mx-3 op-2">/</span>
                @endforeach
            </div>
        </div>

        <div class="bg-color-2 text-light d-flex py-4 lh-1 rot-min-1 mt-min-20">
            <div class="de-marquee-list-2 wow fadeInRight" data-wow-duration="3s">
                @foreach ($scrolls as $scroll)
                    <span class="fs-60 mx-3">{{ $scroll->content }}</span>
                    <span class="fs-60 mx-3 op-2">/</span>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-dark section-dark pt-80 relative jarallax" aria-label="section">
        <img src="{{ asset('frontend/images/background/1.webp') }}" class="jarallax-img" alt="">
        <div class="gradient-edge-top"></div>
        <div class="gradient-edge-bottom"></div>
        <div class="sw-overlay op-8"></div>
        <div class="container">
            <div class="row g-4">

                <div class="col-md-12 wow fadeInUp">
                    <div class="owl-6 no-alpha owl-carousel owl-theme wow mask-right">
                        <img src="{{ asset('frontend/images/logo-light/1.webp') }}" class="w-100 px-4" alt="">
                        <img src="{{ asset('frontend/images/logo-light/2.webp') }}" class="w-100 px-4" alt="">
                        <img src="{{ asset('frontend/images/logo-light/3.webp') }}" class="w-100 px-4" alt="">
                        <img src="{{ asset('frontend/images/logo-light/4.webp') }}" class="w-100 px-4" alt="">
                        <img src="{{ asset('frontend/images/logo-light/5.webp') }}" class="w-100 px-4" alt="">
                        <img src="{{ asset('frontend/images/logo-light/6.webp') }}" class="w-100 px-4" alt="">
                        <img src="{{ asset('frontend/images/logo-light/7.webp') }}" class="w-100 px-4" alt="">
                        <img src="{{ asset('frontend/images/logo-light/8.webp') }}" class="w-100 px-4" alt="">
                        <img src="{{ asset('frontend/images/logo-light/9.webp') }}" class="w-100 px-4" alt="">
                        <img src="{{ asset('frontend/images/logo-light/10.webp') }}" class="w-100 px-4" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-venue" class="bg-dark section-dark text-light pt-80 relative jarallax" aria-label="section">
        <div class="container relative z-2">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Event Location</div>
                    <h2 class="wow fadeInUp" data-wow-delay=".2s">Location & Venue</h2>
                    <p class="lead wow fadeInUp" data-wow-delay=".6s">Join us in the heart of innovation at San Francisco
                        Tech Pavilion—surrounded by top hotels, transit, and culture.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-sm-6">
                    <img src="{{ asset('frontend/images/misc/l1.webp') }}" class="w-100 rounded-1 wow scale-in-mask"
                        alt="">
                </div>

                <div class="col-sm-6">
                    <img src="{{ asset('frontend/images/misc/l2.webp') }}" class="w-100 rounded-1 wow scale-in-mask"
                        alt="">
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-4 col-md-6 mb-sm-30">
                    <div class="d-flex justify-content-center wow fadeInUp" data-wow-delay=".2s">
                        <i class="fs-60 id-color icofont-google-map"></i>
                        <div class="ms-3">
                            <h4 class="mb-0">Address</h4>
                            <p>121 AI Blvd, San Francisco, CA 94107</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-sm-30">
                    <div class="d-flex justify-content-center wow fadeInUp" data-wow-delay=".4s">
                        <i class="fs-60 id-color icofont-phone"></i>
                        <div class="ms-3">
                            <h4 class="mb-0">Phone</h4>
                            <p>Call: +1 123 456 789</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-sm-30">
                    <div class="d-flex justify-content-center wow fadeInUp" data-wow-delay=".6s">
                        <i class="fs-60 id-color icofont-envelope"></i>
                        <div class="ms-3">
                            <h4 class="mb-0">Email</h4>
                            <p>contact@aivent.com</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-dark section-dark text-light pt-80 relative jarallax" aria-label="section">
        <img src="{{ asset('frontend/images/background/3.webp') }}" class="jarallax-img" alt="">
        <div class="gradient-edge-top"></div>
        <div class="gradient-edge-bottom"></div>
        <div class="sw-overlay op-8"></div>
        <div class="container relative z-2">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Stay in the Loop</div>
                    <h2 class="wow fadeInUp" data-wow-delay=".2s">Join the Future of Innovation</h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">
                        Making better things takes time. Drop us your email to stay in the know as we work to reduce our
                        environmental impact. We'll share other exciting news and exclusive offers, too.
                    </p>
                </div>
            </div>

            <form class="row justify-content-center">
                <div class="col-md-6 col-lg-4 mb-3 wow fadeInUp" data-wow-delay=".6s">
                    <input type="email" class="form-control form-control-lg text-center"
                        placeholder="Enter Your Email Address" required>
                </div>
                <div class="col-auto mb-3 wow fadeInUp" data-wow-delay=".6s">
                    <button type="submit" class="btn bg-color text-light btn-lg px-4">SIGN UP</button>
                </div>

                <div class="col-12 text-center wow fadeInUp" data-wow-delay=".8s">
                    <div class="form-check d-flex justify-content-center mb-2">
                        <input class="form-check-input me-2" type="checkbox" value="" id="updatesCheck" checked>
                        <label class="form-check-label" for="updatesCheck">
                            Keep me updated on other news and exclusive offers
                        </label>
                    </div>
                    <p class="small text-muted wow fadeInUp" data-wow-delay="1s">
                        Note: You can opt-out at any time. See our <a href="#"
                            class="text-decoration-underline">Privacy
                            Policy</a> and <a href="#" class="text-decoration-underline">Terms</a>.
                    </p>
                </div>
            </form>
        </div>
    </section>

    <!-- AOS Library for Scroll Animations -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Initialize AOS
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-out',
                once: true,
                offset: 100
            });

            // Season closed modal trigger
            const seasonClosedModalBtn = document.querySelector('.open-season-closed-modal');
            if (seasonClosedModalBtn) {
                seasonClosedModalBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const modal = new bootstrap.Modal(document.getElementById('seasonClosedModal'));
                    modal.show();
                });
            }

            // Dynamic Countdown for Active or Next Season
            @if ($activeSeason)
                const targetDate = new Date(
                    "{{ $activeSeason->application_deadline_date->format('Y-m-d 23:59:59') }}");
                $('#defaultCountdown').countdown('destroy');
                $('#defaultCountdown').countdown({
                    until: targetDate,
                    format: 'DHMS',
                    layout: '<div class="d-flex justify-content-center gap-3">' +
                        '<div class="countdown-item"><span class="days fs-30 fw-bold">{dn}</span><small class="d-block">Days</small></div>' +
                        '<div class="countdown-item"><span class="hours fs-30 fw-bold">{hn}</span><small class="d-block">Hrs</small></div>' +
                        '<div class="countdown-item"><span class="minutes fs-30 fw-bold">{mn}</span><small class="d-block">Mins</small></div>' +
                        '<div class="countdown-item"><span class="seconds fs-30 fw-bold">{sn}</span><small class="d-block">Secs</small></div>' +
                        '</div>'
                });
            @elseif ($nextSeason)
                const targetDate = new Date("{{ $nextSeason->opening_date->format('Y-m-d 00:00:00') }}");
                $('#defaultCountdown').countdown('destroy');
                $('#defaultCountdown').countdown({
                    until: targetDate,
                    format: 'DHMS',
                    layout: '<div class="d-flex justify-content-center gap-3">' +
                        '<div class="countdown-item"><span class="days fs-30 fw-bold">{dn}</span><small class="d-block">Days</small></div>' +
                        '<div class="countdown-item"><span class="hours fs-30 fw-bold">{hn}</span><small class="d-block">Hrs</small></div>' +
                        '<div class="countdown-item"><span class="minutes fs-30 fw-bold">{mn}</span><small class="d-block">Mins</small></div>' +
                        '<div class="countdown-item"><span class="seconds fs-30 fw-bold">{sn}</span><small class="d-block">Secs</small></div>' +
                        '</div>'
                });
            @else
                $('#defaultCountdown').html('<h4 class="text-gold mb-0">Stay Tuned for Next Season</h4>');
            @endif
        });
    </script>

    <style>
        #defaultCountdown .countdown-item {
            background: rgba(255, 255, 255, 0.05);
            padding: 10px 15px;
            border-radius: 8px;
            min-width: 70px;
            border: 1px solid rgba(255, 215, 0, 0.2);
            transition: all 0.3s ease;
            display: inline-block;
            line-height: 1.2;
        }

        #defaultCountdown .countdown-item:hover {
            background: rgba(255, 215, 0, 0.1);
            border-color: rgba(255, 215, 0, 0.5);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        #defaultCountdown .fs-30 {
            font-size: 28px;
            color: #FFD700;
            display: block;
        }

        #defaultCountdown small {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.6);
        }

        @media (max-width: 768px) {
            #defaultCountdown .gap-3 {
                gap: 10px !important;
            }

            #defaultCountdown .countdown-item {
                min-width: 60px;
                padding: 8px 10px;
            }

            #defaultCountdown .fs-30 {
                font-size: 22px;
            }
        }
    </style>
@endsection
