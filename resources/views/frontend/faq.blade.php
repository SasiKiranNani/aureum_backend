@extends('layouts.frontend.index')

@section('contents')
    <section id="section-faq" class="bg-dark section-dark text-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="subtitle wow fadeInUp" data-wow-delay=".0s">Everything You Need to Know</div>
                    <h2 class="wow fadeInUp" data-wow-delay=".2s">Frequently Asked Questions</h2>
                </div>

                <div class="col-lg-7">
                    <div class="accordion s2 wow fadeInUp">
                        <div class="accordion-section">
                            @foreach ($faq as $faq)
                                <div class="accordion-section-title" data-tab="#accordion-a1">
                                    {{ $faq->question }}
                                </div>
                                <div class="accordion-section-content" id="accordion-a1">
                                    {!! $faq->answer !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection