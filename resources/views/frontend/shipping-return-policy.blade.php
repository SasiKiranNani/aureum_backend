@extends('layouts.frontend.index')

@section('contents')
    <section class="policy-section">
        <!-- Background Elements -->
        <div class="policy-bg-pattern">
            <div class="policy-blob-1"></div>
            <div class="policy-blob-2"></div>
        </div>

        <div class="container position-relative z-1">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="policy-header wow fadeInUp">
                        <span class="policy-subtitle">Legal Documentation</span>
                        <h1 class="policy-title">Shipping & Return Policy</h1>
                        <div class="policy-divider"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 mb-4">
                    <x-policy-sidebar active="shipping-return-policy" />
                </div>

                <!-- Content -->
                <div class="col-lg-9">
                    <div class="policy-card wow fadeInUp" data-wow-delay=".3s">
                        <div class="policy-content">
                            <h3>Shipping Policy</h3>
                            <div class="policy-highlight">
                                <p>At ORIONSM International Tech Awards, Operating by ParalogiQ Services Ltd, we strive to
                                    ensure
                                    timely
                                    and secure delivery of all merchandise, including customized awards and trophies.</p>
                            </div>

                            <div class="policy-section-divider"></div>

                            <h4>Delivery Timeline</h4>
                            <p>Customized awards/trophies delivered within 8-9 weeks from order confirmation.</p>

                            <h4>Shipping Charges</h4>
                            <p>Costs vary by destination. Surcharges communicated at dispatch.</p>

                            <h4>Tracking & Responsibility</h4>
                            <p>Not responsible for packages marked "delivered" via tracking.</p>

                            <div class="policy-section-divider"></div>

                            <h3>Return Policy</h3>
                            <p>We stand by the quality of our products. However, due to the personalized nature of our
                                merchandise, returns are not accepted unless the product is defective or non-compliant with
                                the
                                order.</p>

                            <h4>Return Eligibility</h4>
                            <p>Only defective/incorrect items qualify for returns.</p>

                            <h4>Return Window</h4>
                            <p>Request must be initiated within 15 days of delivery.</p>

                            <h4>Return Process</h4>
                            <p>Email <a href="mailto:excellence@orionsm.com">excellence@orionsm.com</a> with order
                                details.
                            </p>

                            <h4>Resolution Timeline</h4>
                            <p>Refund/replacement processed within 45 business days.</p>
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
    </style>
@endsection
