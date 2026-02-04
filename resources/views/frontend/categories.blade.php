@extends('layouts.frontend.index')

@section('contents')
    <section id="section-why-attend" class="bg-dark section-dark text-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <div class="subtitle wow fadeInUp mb-3">Why Attend</div>
                    <h2 class="wow fadeInUp" data-wow-delay=".2s">What You’ll Gain</h2>
                    <p class="lead mb-0 wow fadeInUp">Hear from global AI pioneers, industry disruptors, and bold thinkers
                        shaping the future across every domain.</p>
                </div>
            </div>

            <div class="spacer-single"></div>

            <div class="row g-4">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6">
                        <div class="hover">
                            <div
                                class="bg-dark-2 relative rounded-1 overflow-hidden hover-bg-color hover-text-light wow scale-in-mask">
                                <div class="abs p-40 bottom-0 z-2">
                                    <div class="relative wow fadeInUp">
                                        <h4>{{ $category->name }}</h4>
                                        <p class="mb-0">{{ $category->short_description }}</p>
                                    </div>
                                </div>
                                <div class="gradient-edge-bottom h-100"></div>
                                <img src="{{ asset('storage/' . $category->image) }}" class="w-100 hover-scale-1-1"
                                    alt="{{ $category->name }}">
                                <div class="abs w-100 h-100 start-0 top-0 hover-op-1 radial-gradient-color"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
