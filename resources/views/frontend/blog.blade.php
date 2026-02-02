@extends('layouts.frontend.index')

@section('contents')
    <section id="section-hero" class="premium-hero section-dark no-top no-bottom text-light relative overflow-hidden">
        <div class="banner-bg">
            <div class="banner-blur"></div>
            <img src="{{ asset('frontend/images/background/3.webp') }}" class="banner-img" alt="">
            <div class="banner-overlay"></div>
            <div class="banner-noise"></div>
        </div>

        <div class="container relative z-10 pt-100 pb-100">
            <div class="row align-items-center justify-content-between gx-5">
                <div class="col-lg-6">
                    <div class="subtitle wow fadeInUp" data-wow-delay="0s">Insights & Stories</div>
                    <div class="spacer-10"></div>
                    <h1 class="display-3 text-uppercase mb-0 reveal-text wow text-gradient-gold" data-wow-duration="1.5s">
                        Blog
                    </h1>
                </div>

                <div class="col-lg-4 wow fadeInRight" data-wow-delay=".3s">
                    <p class="mb-0 text-white-50">Join thought leaders, developers, researchers, and founders as we explore
                        how artificial intelligence is reshaping industries and creativity.</p>
                </div>
            </div>
        </div>

        <div class="banner-scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row g-4">

                @foreach ($blogs as $blog)
                    <div class="col-lg-4">
                        <a href="{{ route('blog-details', $blog->id) }}"
                            class="d-block hover relative rounded-20 overflow-hidden text-light">
                            <div class="abs z-2 bg-color rounded-2 text-white p-3 pb-2 m-4 text-center fw-600">
                                <h4 class="fs-36 mb-0 lh-1">{{ $blog->date->format('d') }}</h4>
                                <span>{{ $blog->date->format('M') }}</span>
                            </div>

                            <img src="{{ asset('storage/' . $blog->image) }}" class="w-100 hover-scale-1-1"
                                alt="{{ $blog->title }}">

                            <div class="absolute start-0 bottom-0 p-4 z-2">
                                <h4>{{ $blog->title }}</h4>
                            </div>

                            <div class="gradient-edge-bottom h-70"></div>
                        </a>
                    </div>
                @endforeach

                <!-- pagination begin -->
                <div class="col-lg-12 pt-4 text-center">
                    <div class="d-inline-block">
                        {{ $blogs->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!-- pagination end -->

            </div>
        </div>
    </section>
@endsection
