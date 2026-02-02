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
                            <h3>Refund Policy</h3>
                            <div class="policy-highlight">
                                <p>This Refund Policy governs all financial transactions made with ORIONSM International
                                    Tech Awards.</p>
                            </div>

                            <div class="policy-section-divider"></div>

                            <h3>1. General Policy</h3>
                            <p>All nomination, application, registration, and participation fees are non-refundable once
                                payment has been successfully completed.</p>

                            <div class="policy-section-divider"></div>

                            <h3>2. Purpose of Fees</h3>
                            <p>Fees contribute to administrative processing, evaluation, technology infrastructure,
                                verification, and operational costs.</p>

                            <div class="policy-section-divider"></div>

                            <h3>3. Non-Refundable Situations</h3>
                            <p>Refunds will not be issued in cases of:</p>
                            <ul>
                                <li>Non-selection or rejection</li>
                                <li>Withdrawal after submission</li>
                                <li>Incomplete or inaccurate submissions</li>
                                <li>Disqualification due to policy violations</li>
                                <li>Missed deadlines</li>
                                <li>Incorrect category selection</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>4. Exceptional Circumstances</h3>
                            <p>Refunds may be considered solely in cases of duplicate payments or verified technical errors.
                            </p>

                            <div class="policy-section-divider"></div>

                            <h3>5. Request Procedure</h3>
                            <p>Requests must be submitted in writing within seven (7) calendar days with supporting
                                evidence.</p>

                            <div class="policy-section-divider"></div>

                            <h3>6. Processing Time</h3>
                            <p>Approved refunds will be processed within 10–15 business days, subject to banking timelines.
                            </p>

                            <div class="policy-section-divider"></div>

                            <h3>7. Discretion</h3>
                            <p>ORIONSM reserves full discretion in determining refund eligibility.</p>
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
