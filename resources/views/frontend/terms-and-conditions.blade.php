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
                        <h1 class="policy-title">Terms & Conditions</h1>
                        <div class="policy-divider"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 mb-4">
                    <x-policy-sidebar active="terms-and-conditions" />
                </div>

                <!-- Content -->
                <div class="col-lg-9">
                    <div class="policy-card wow fadeInUp" data-wow-delay=".3s">
                        <div class="policy-content">
                            <h3>Terms and Conditions</h3>
                            <div class="policy-highlight">
                                <p>These Terms and Conditions govern access to and participation in ORIONSM International
                                    Tech Awards.</p>
                            </div>

                            <div class="policy-section-divider"></div>

                            <h3>1. Organizational Background</h3>
                            <p>ORIONSM was founded in 2012 and operational since 2016, recognizing excellence and
                                leadership in technology worldwide.</p>

                            <div class="policy-section-divider"></div>

                            <h3>2. Eligibility</h3>
                            <p>Applicants must meet eligibility criteria and provide truthful, verifiable information.</p>

                            <div class="policy-section-divider"></div>

                            <h3>3. Application Process</h3>
                            <p>Submission does not guarantee selection. ORIONSM may request additional documentation.</p>

                            <div class="policy-section-divider"></div>

                            <h3>4. Evaluation and Judging</h3>
                            <p>Judging decisions are final, impartial, and binding.</p>

                            <div class="policy-section-divider"></div>

                            <h3>5. Modification and Disqualification</h3>
                            <p>ORIONSM may reclassify, reject, or disqualify entries at its discretion.</p>

                            <div class="policy-section-divider"></div>

                            <h3>6. Intellectual Property</h3>
                            <p>Applicants retain ownership of submissions but grant ORIONSM non-exclusive, worldwide
                                usage rights for award-related purposes.</p>

                            <div class="policy-section-divider"></div>

                            <h3>7. Publicity</h3>
                            <p>Selected participants may be announced publicly unless otherwise requested in writing.</p>

                            <div class="policy-section-divider"></div>

                            <h3>8. Conduct</h3>
                            <p>Any misrepresentation, plagiarism, or unethical conduct will result in disqualification.</p>

                            <div class="policy-section-divider"></div>

                            <h3>9. Limitation of Liability</h3>
                            <p>ORIONSM is not liable for indirect damages, data loss, or technical disruptions beyond
                                reasonable control.</p>

                            <div class="policy-section-divider"></div>

                            <h3>10. Suspension and Termination</h3>
                            <p>Access may be suspended or terminated for policy violations.</p>

                            <div class="policy-section-divider"></div>

                            <h3>11. Governing Law</h3>
                            <p>These terms are governed by applicable laws relevant to ORIONSM operations.</p>

                            <div class="policy-section-divider"></div>

                            <h3>Contact Us</h3>
                            <p>For inquiries about evaluated policies or the evaluation process, contact us at
                                <a href="mailto:excellence@orionsm.com">excellence@orionsm.com</a>.
                            </p>
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
