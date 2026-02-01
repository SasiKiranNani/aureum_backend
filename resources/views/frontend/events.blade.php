@extends('layouts.frontend.index')

@section('contents')
    <section id="section-hero" class="section-dark no-top no-bottom text-light jarallax relative mh-500 jarallax">
        <img src="{{ asset('frontend/images/background/3.webp') }}" class="jarallax-img" alt="">
        <div class="gradient-edge-bottom h-50"></div>
        <div class="sw-overlay op-5"></div>
        <div class="abs w-80 bottom-10 z-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-between gx-5">
                    <div class="col-lg-6">
                        <div class="relative wow mask-right">
                            <div class="text-start">
                                <h1 class="fs-96 text-uppercase fs-sm-10vw mb-0 lh-1">Events</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 wow fadeInRight" data-wow-delay=".3s">
                        <p class="mb-0">Discover and join our upcoming events. Stay tuned for the latest updates on bookings and event dates.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row g-4">

                @foreach ($events as $event)
                    <div class="col-lg-4">
                        <a href="{{ route('event-details', $event->id) }}"
                            class="d-block hover relative rounded-20 overflow-hidden text-light">
                            <div class="abs z-2 bg-color rounded-2 text-white p-3 pb-2 m-4 text-center fw-600">
                                <h4 class="fs-36 mb-0 lh-1">{{ $event->event_date->format('d') }}</h4>
                                <span>{{ $event->event_date->format('M') }}</span>
                            </div>

                            <img src="{{ asset('storage/' . $event->thumbnail_img) }}" class="w-100 hover-scale-1-1"
                                alt="{{ $event->title }}" style="height: 300px; object-fit: cover;">

                            <div class="absolute start-0 bottom-0 p-4 z-2">
                                <h4 class="mb-1">{{ $event->title }}</h4>
                                <span class="badge bg-warning text-dark">${{ number_format($event->ticket_price, 2) }}</span>
                            </div>

                            <div class="gradient-edge-bottom h-70"></div>
                        </a>
                    </div>
                @endforeach

                <!-- pagination begin -->
                <div class="col-lg-12 pt-4 text-center">
                    <div class="d-inline-block">
                        {{ $events->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!-- pagination end -->

            </div>
        </div>
    </section>
@endsection
