@extends('layouts.frontend.index')

@section('contents')
    <section class="section-dark">
        <div class="container text-center py-5">
            <div class="payment-failure-card p-5 bg-dark-glass rounded-4 border-danger">
                <i class="icofont-close-circled fs-1 text-danger mb-4"></i>
                <h2 class="text-white mb-3">Payment Failed</h2>
                <p class="text-muted mb-4">We were unable to process your payment. Please try again or contact support.</p>
                <a href="{{ route('nomination') }}" class="btn-main btn-glow">Try Again</a>
            </div>
        </div>
    </section>
@endsection
