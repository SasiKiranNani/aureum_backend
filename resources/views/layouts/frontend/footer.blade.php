<footer class="text-light section-dark">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-12">
                <div class="d-lg-flex align-items-center justify-content-between text-center">
                    <div>
                        <h3 class="fs-20">Address</h3>
                        121 AI Blvd, San Francisco<br>
                        BCA 94107
                    </div>
                    <div>
                        <img src="{{ asset('frontend/images/logo.webp') }}" class="w-150px" alt=""><br>
                        <div class="social-icons mb-sm-30 mt-4">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>

                    </div>
                    <div>
                        <h3 class="fs-20">Contact Us</h3>
                        T. +1 123 456 789<br>
                        M. excellence@orionsm.com
                    </div>
                </div>
                <div class="QuickLinks mb-sm-30 mt-5 d-lg-flex align-items-center justify-content-center text-center">
                    <ul class="d-flex justify-content-center flex-wrap gap-4 list-unstyled m-0 p-0">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        {{-- <li><a href="{{ route('about-us') }}">About</a></li>
                        <li><a href="{{ route('categories') }}">Categories</a></li> --}}
                        <li><a href="{{ route('nomination') }}" class="auth-check-nomination">Nomination</a></li>
                        {{-- <li><a href="{{ route('award-trophy') }}">Award Trophy</a></li> --}}
                        <li><a href="{{ route('how-to-nominate') }}">How to Nominate</a></li>
                        {{-- <li><a href="{{ route('judges') }}">Judges</a></li> --}}
                        {{-- <li><a href="{{ route('judge-details') }}">Judge Details</a></li> --}}
                        <li><a href="{{ route('judging-criteria') }}">Judging Criteria</a></li>
                        {{-- <li><a href="{{ route('past-winners') }}">Past Winners</a></li> --}}
                        {{-- <li><a href="{{ route('past-winner-details') }}">Past Winner Details</a></li> --}}
                        <li><a href="{{ route('why-enter') }}">Why Enter</a></li>
                        <li><a href="{{ route('blog') }}">Blogs</a></li>
                        <li><a href="{{ route('news-room') }}">NewsRoom</a></li>
                        <li><a href="{{ route('events') }}">Events</a></li>
                        {{-- <li><a href="{{ route('contact-us') }}">Contact</a></li> --}}
                        <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('cookie-policy') }}">Cookie Policy</a></li>
                        <li><a href="{{ route('cancellation-refund-policy') }}">Refund Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    Copyright 2025 - ORIONSM International Tech Awards
                </div>
            </div>
        </div>
    </div>
</footer>
