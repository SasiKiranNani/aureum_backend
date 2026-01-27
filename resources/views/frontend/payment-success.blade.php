@extends('layouts.frontend.index')

@section('contents')
    <section class="section-dark">
        <div class="container text-center py-5">
            <div class="payment-success-card p-5 bg-dark-glass rounded-4 border-gold">
                <i class="icofont-check-circled fs-1 text-gold mb-4"></i>
                <h2 class="text-white mb-3">Payment Successful!</h2>
                <p class="text-muted mb-4">Your nomination has been successfully submitted and payment has been processed.
                </p>
                <a href="{{ route('home') }}" class="btn-main btn-glow">Return Home</a>
            </div>
        </div>
    </section>
@endsection
