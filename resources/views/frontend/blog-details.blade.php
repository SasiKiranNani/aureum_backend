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
                            {{ $blog->title }}
                        </h1>

                    </div>

                    <div class="col-lg-2">
                        <div class="relative text-lg-end">
                            <div class="d-inline-block z-2 bg-color rounded-1 text-white p-4 text-center fw-600 wow fadeIn"
                                data-wow-delay="1s">
                                <h4 class="fs-60 mb-0 lh-1">{{ $blog->date->format('d') }}</h4>
                                <span class="fs-20 fw-60">{{ $blog->date->format('M') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-10">
                    <div class="blog-read">

                        <div class="post-text">

                            <!-- <img src="{{ asset('storage/' . $blog->image) }}" class="w-100 rounded-1 mb-4" alt="{{ $blog->title }}"> -->
                            <img src="images/misc/sd1.webp" class="w-100 rounded-1 mb-4" alt="">
                            {!! $blog->description !!}

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection