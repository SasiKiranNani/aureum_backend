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
                        <h1 class="policy-title">Privacy Policy</h1>
                        <div class="policy-divider"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 mb-4">
                    <x-policy-sidebar active="privacy-policy" />
                </div>

                <!-- Content -->
                <div class="col-lg-9">
                    <div class="policy-card wow" data-wow-delay=".3s">
                        <div class="policy-content">
                            <h3>Introduction</h3>
                            <div class="policy-highlight">
                                <p>ORIONSM International Tech Awards (“ORIONSM”) is an international technology awards
                                    organization founded in 2012 and operational since 2016. ORIONSM is committed to
                                    protecting the privacy, confidentiality, and integrity of personal information entrusted
                                    to it by applicants, nominees, judges, partners, and website visitors.</p>
                            </div>

                            <div class="policy-section-divider"></div>

                            <h3>1. Scope</h3>
                            <p>This Privacy Policy applies to all personal information collected through the ORIONSM
                                website, application portals, communications, and related services.</p>

                            <div class="policy-section-divider"></div>

                            <h3>2. Information Collected</h3>
                            <p>ORIONSM may collect:</p>
                            <ul>
                                <li><strong>Personal identification details:</strong> Name, email address, phone number,
                                    designation, organization, country.</li>
                                <li><strong>Professional and academic information.</strong></li>
                                <li><strong>Nomination and application materials:</strong> Including projects, achievements,
                                    resumes, and evidence documents.</li>
                                <li><strong>Communication records.</strong></li>
                                <li><strong>Payment-related transaction references.</strong></li>
                                <li><strong>Technical and usage data:</strong> Such as IP address, browser type, device
                                    identifiers, cookies, and access logs.</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>3. Purpose of Collection</h3>
                            <p>Information is collected for:</p>
                            <ul>
                                <li>Administration of award programs and nominations.</li>
                                <li>Evaluation, judging, and verification processes.</li>
                                <li>Communication of official notices, confirmations, results, and updates.</li>
                                <li>Fraud prevention and security monitoring.</li>
                                <li>Record-keeping and audit requirements.</li>
                                <li>Compliance with applicable laws and regulations.</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>4. Legal Basis</h3>
                            <p>Information is processed based on consent, contractual necessity, legitimate organizational
                                interest, and legal obligation, as applicable.</p>

                            <div class="policy-section-divider"></div>

                            <h3>5. Information Sharing</h3>
                            <p>Personal data is not sold or marketed. Limited disclosure may occur to:</p>
                            <ul>
                                <li>Judges and evaluators under confidentiality obligations.</li>
                                <li>Technology, hosting, payment, and communication service providers.</li>
                                <li>Legal or regulatory authorities when required.</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>6. International Data Transfers</h3>
                            <p>Information may be processed or stored across jurisdictions in accordance with applicable
                                data protection laws.</p>

                            <div class="policy-section-divider"></div>

                            <h3>7. Data Security</h3>
                            <p>ORIONSM employs administrative, technical, and physical safeguards to protect information.
                                While best efforts are made, no electronic system is fully secure.</p>

                            <div class="policy-section-divider"></div>

                            <h3>8. Data Retention</h3>
                            <p>Information is retained only for as long as necessary for operational, legal, and archival
                                purposes.</p>

                            <div class="policy-section-divider"></div>

                            <h3>9. User Rights</h3>
                            <p>Users may request access, correction, or deletion of their data, subject to legal
                                limitations.</p>

                            <div class="policy-section-divider"></div>

                            <h3>10. Policy Changes</h3>
                            <p>ORIONSM may revise this policy periodically. Continued use constitutes acceptance of updates.
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
