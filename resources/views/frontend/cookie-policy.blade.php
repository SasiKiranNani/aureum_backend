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
                        <h1 class="policy-title">Cookie Policy</h1>
                        <div class="policy-divider"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 mb-4">
                    <x-policy-sidebar active="cookie-policy" />
                </div>

                <!-- Content -->
                <div class="col-lg-9">
                    <div class="policy-card wow fadeInUp" data-wow-delay=".3s">
                        <div class="policy-content">
                            <h3>Cookie Policy</h3>
                            <div class="policy-highlight">
                                <p>ORIONSM International Tech Awards uses cookies and similar technologies to ensure
                                    secure and efficient website operation.</p>
                            </div>

                            <div class="policy-section-divider"></div>

                            <h3>1. Purpose of Cookies</h3>
                            <p>Cookies help authenticate users, maintain sessions, analyze usage, and improve performance.
                            </p>

                            <div class="policy-section-divider"></div>

                            <h3>2. Types of Cookies</h3>
                            <ul>
                                <li><strong>Essential cookies</strong> for core functionality.</li>
                                <li><strong>Functional cookies</strong> for user preferences.</li>
                                <li><strong>Performance and analytics cookies</strong> for statistical analysis.</li>
                                <li><strong>Security cookies</strong> for fraud prevention.</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>3. Cookie Duration</h3>
                            <p>Cookies may be session-based or persistent, depending on purpose.</p>

                            <div class="policy-section-divider"></div>

                            <h3>4. User Control</h3>
                            <p>Users may modify cookie settings through browser controls. Disabling cookies may affect site
                                functionality.</p>

                            <div class="policy-section-divider"></div>

                            <h3>5. Third-Party Cookies</h3>
                            <p>Third-party services may place cookies subject to their own policies.</p>

                            <div class="policy-section-divider"></div>

                            <h3>6. Consent</h3>
                            <p>By using the ORIONSM website, users consent to cookie usage as described.</p>

                            <div class="policy-section-divider"></div>

                            <h3>Contact Us</h3>
                            <p>If you have questions about this Cookie Policy or our use of cookies, please contact us at:
                                <a href="mailto:excellence@orionsm.com">excellence@orionsm.com</a>
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
