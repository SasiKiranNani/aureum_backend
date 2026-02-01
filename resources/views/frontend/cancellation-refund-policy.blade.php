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
                        <h1 class="policy-title">Cancellation & Refund Policy</h1>
                        <div class="policy-divider"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 mb-4">
                    <x-policy-sidebar active="cancellation-refund-policy" />
                </div>

                <!-- Content -->
                <div class="col-lg-9">
                    <div class="policy-card wow fadeInUp" data-wow-delay=".3s">
                        <div class="policy-content">
                            <h3>Payments</h3>
                            <div class="policy-highlight">
                                <p>All payments made on <a href="https://aureumawards.com/"
                                        target="_blank">aureumawards.com</a>
                                    (the "Website") Operating by ParalogiQ Services Ltd, including but not limited to entry
                                    fees,
                                    event ticket purchases, and merchandise orders, are considered final and non-refundable
                                    except
                                    as stated in this policy.</p>
                            </div>

                            <div class="policy-section-divider"></div>

                            <h3>Refund Policy</h3>

                            <h4>Award Entry Fees</h4>
                            <ul>
                                <li>All entry fees are non-refundable</li>
                                <li>No refunds for disqualified or non-winning submissions</li>
                                <li>Accidental payments not eligible for refunds</li>
                                <li>No refunds post-result announcements</li>
                            </ul>

                            <h4>Event Tickets</h4>
                            <ul>
                                <li>Non-refundable once confirmed</li>
                                <li>All sales final upon confirmation</li>
                                <li>No refunds for non-attendance</li>
                                <li>No refunds for travel disruptions</li>
                            </ul>

                            <h4>Merchandise</h4>
                            <ul>
                                <li>Custom items non-refundable unless defective</li>
                                <li>Must match order specifications</li>
                                <li>Returns within 15 days of delivery</li>
                                <li>Email <a href="mailto:connect@aureumawards.com">connect@aureumawards.com</a></li>
                                <li>Refunds processed in 45 business days</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>Chargebacks and Fraud</h3>
                            <ul>
                                <li>Chargebacks without contact violate our policy</li>
                                <li>Fraudulent chargebacks lead to account suspension</li>
                                <li>$75 minimum fee per chargeback case</li>
                                <li>Permanent ban for abusive behavior</li>
                            </ul>

                            <h3>Pricing Errors</h3>
                            <p>Aureum International Awards reserves the right to cancel or revise any order made under
                                erroneous
                                pricing. A full refund will be issued to the original payment method if cancellation occurs.
                            </p>

                            <div class="policy-section-divider"></div>

                            <h3>Delivery Policy</h3>

                            <h4>Event Tickets</h4>
                            <ul>
                                <li>Confirmed via email upon payment</li>
                                <li>Digital delivery unless stated otherwise</li>
                            </ul>

                            <h4>Merchandise</h4>
                            <ul>
                                <li>8-9 weeks delivery for custom items</li>
                                <li>Shipping charges vary by region</li>
                                <li>Not liable after "delivered" status</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>Return & Replacement Policy</h3>
                            <ul>
                                <li>Notify within 15 days of delivery at <a
                                        href="mailto:Connect@aureumawards.com">Connect@aureumawards.com</a></li>
                                <li>Valid claims processed within 45 business days</li>
                                <li>Items must be unused in original packaging</li>
                                <li>Only for defective, damaged, or incorrect items</li>
                            </ul>
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
