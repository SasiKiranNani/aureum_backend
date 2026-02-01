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
                            <h3>1. Introduction</h3>
                            <div class="policy-highlight">
                                <p>At Aureum International Awards, Operating by ParalogiQ Services Ltd. we are committed to
                                    protecting your privacy and ensuring the security of your personal information. By
                                    accessing our website or
                                    submitting information to us, you consent to the practices described in this policy.</p>
                            </div>
                            <p>This policy applies to all users, including but not limited to award nominees, applicants,
                                judges, sponsors, and visitors to our website. We strive to maintain the highest standards
                                of integrity in compliance with applicable data protection laws, including the General Data
                                Protection Regulation (GDPR).</p>

                            <div class="policy-section-divider"></div>

                            <h3>2. Information We Collect</h3>
                            <p>We collect information to provide and improve our services, process award nominations, and
                                enhance your experience on our website. The types of information we collect include:</p>

                            <h4>2.1 Personal Information</h4>
                            <p>Personal information is data that can identify you, which you may voluntarily provide when
                                interacting with our website or services. This includes:</p>
                            <ul>
                                <li><strong>Contact Information:</strong> Name, email address, phone number, mailing
                                    address.
                                </li>
                                <li><strong>Professional Information:</strong> Company name, job title, industry, and
                                    professional achievements submitted for award nominations.</li>
                                <li><strong>Account Information:</strong> Username, password, and other details provided
                                    when
                                    creating an account or submitting an application.</li>
                                <li><strong>Payment Information:</strong> Billing details, such as credit card information,
                                    processed securely through third-party payment processors for award entry fees or
                                    sponsorships.</li>
                            </ul>

                            <h4>2.2 Non-Personal Information</h4>
                            <p>We also collect non-personal information that does not directly identify you, including:</p>
                            <ul>
                                <li><strong>Usage Data:</strong> IP address, browser type, operating system, device
                                    information,
                                    pages visited, and time spent on our website.</li>
                                <li><strong>Cookies and Tracking Technologies:</strong> Information collected through
                                    cookies,
                                    web beacons, and similar technologies to analyze website usage and personalize content.
                                </li>
                                <li><strong>Aggregated Data:</strong> Statistical or demographic data used for analytics and
                                    reporting, which does not identify any individual.</li>
                            </ul>

                            <h3>3. How We Collect Information</h3>
                            <p>We collect information in the following ways:</p>
                            <ul>
                                <li><strong>Directly from You:</strong> When you submit forms (e.g., award applications,
                                    contact
                                    forms, or registration forms), create an account, or communicate with us via email or
                                    phone.
                                </li>
                                <li><strong>Automatically:</strong> Through cookies, analytics tools, and server logs when
                                    you
                                    visit www.aureumawards.com.</li>
                                <li><strong>From Third Parties:</strong> From partners, sponsors, or service providers
                                    (e.g.,
                                    payment processors) when you engage with our services or events.</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>4. How We Use Your Information</h3>
                            <p>We use your information to operate our website, administer our awards program, and provide a
                                seamless user experience. Specific purposes include:</p>
                            <ul>
                                <li>Processing and evaluating award nominations and applications.</li>
                                <li>Communicating with you about your account, submissions, or inquiries.</li>
                                <li>Managing payments and issuing invoices for award entries or sponsorships.</li>
                                <li>Improving our website and services through analytics and user feedback.</li>
                                <li>Sending promotional materials, newsletters, or updates about Aureum International Awards
                                    (with your consent, where required).</li>
                                <li>Complying with legal obligations and protecting our legal rights.</li>
                                <li>Preventing fraud and ensuring the security of our website and services.</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>5. How We Share Your Information</h3>
                            <p>We do not sell, rent, or trade your personal information for promotional purposes. We may
                                share
                                your information in the following circumstances:</p>
                            <ul>
                                <li><strong>Service Providers:</strong> With trusted third-party vendors (e.g., payment
                                    processors, hosting providers, or analytics services) who assist us in operating our
                                    website
                                    and services, subject to confidentiality agreements.</li>
                                <li><strong>Award Program Partners:</strong> With judges, sponsors, or affiliates involved
                                    in
                                    the awards process, limited to the information necessary to evaluate nominations or
                                    fulfil
                                    sponsorship agreements.</li>
                                <li><strong>Legal Compliance:</strong> When required by law, court order, or government
                                    authority, or to protect our rights, property, or safety of our users.</li>
                                <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, or sale of
                                    assets, your information may be transferred to a successor entity, with notice provided
                                    where required.</li>
                                <li><strong>Aggregated or Anonymized Data:</strong> We may share non-identifiable,
                                    aggregated
                                    data for research, marketing, or statistical purposes.</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>6. Cookies and Tracking Technologies</h3>
                            <p>Our website uses cookies and similar technologies to enhance functionality, analyze
                                performance,
                                and personalize your experience. Cookies are small data files stored on your device. We use:
                            </p>
                            <ul>
                                <li><strong>Essential Cookies:</strong> Necessary for the website to function, such as
                                    maintaining user sessions or securing forms.</li>
                                <li><strong>Analytics Cookies:</strong> To track website usage and performance (e.g., via
                                    Google
                                    Analytics).</li>
                                <li><strong>Marketing Cookies:</strong> To deliver personalized content or advertisements
                                    (with
                                    consent where required).</li>
                            </ul>
                            <p>You can manage cookie preferences through your browser settings or our website's "Consent
                                Preferences" tool. Note that disabling cookies may affect website functionality.</p>

                            <div class="policy-section-divider"></div>

                            <h3>7. Data Security</h3>
                            <p>We implement reasonable technical, administrative, and physical safeguards to protect your
                                personal information from unauthorized access, loss, or misuse. These include encryption,
                                secure
                                socket layer (SSL) technology, and restricted access to sensitive data. However, no system
                                is
                                completely secure, and we cannot guarantee absolute security of your information.</p>

                            <div class="policy-section-divider"></div>

                            <h3>8. Your Privacy Rights</h3>
                            <p>Depending on your jurisdiction, you may have the following rights regarding your personal
                                information:</p>
                            <ul>
                                <li><strong>Access:</strong> Request a copy of the personal data we hold about you.</li>
                                <li><strong>Correction:</strong> Request correction of inaccurate or incomplete data.</li>
                                <li><strong>Deletion:</strong> Request deletion of your data, subject to legal or
                                    contractual
                                    obligations.</li>
                                <li><strong>Restriction:</strong> Request restriction of processing in certain
                                    circumstances.
                                </li>
                                <li><strong>Data Portability:</strong> Request your data in a structured, commonly used
                                    format.
                                </li>
                                <li><strong>Objection:</strong> Object to processing for direct marketing or legitimate
                                    interest
                                    purposes.</li>
                                <li><strong>Withdraw Consent:</strong> Withdraw consent for processing where consent was the
                                    basis.</li>
                            </ul>
                            <p>To exercise these rights, contact us at info@aureumawards.com. We will respond within the
                                timeframes required by applicable law (e.g., 30 days for GDPR requests, 45 days for CCPA
                                requests, 45 days for DPDPA requests).</p>

                            <div class="policy-section-divider"></div>

                            <h3>9. Third-Party Links</h3>
                            <p>Our website may contain links to third-party websites, such as payment processors or partner
                                organizations. We are not responsible for the privacy practices or content of these
                                websites. We
                                encourage you to review their privacy policies before providing personal information.</p>

                            <div class="policy-section-divider"></div>

                            <h3>10. Children's Privacy</h3>
                            <p>Our website and services are not intended for individuals under the age of 16. We do not
                                knowingly collect personal information from children under 16. If we learn that we have
                                collected such information, we will promptly delete it. Contact us if you believe we have
                                inadvertently collected information from a child.</p>

                            <div class="policy-section-divider"></div>

                            <h3>11. Changes to This Privacy Policy</h3>
                            <p>We may update this Privacy Policy periodically to reflect changes in our practices, legal
                                requirements, or industry standards. We will notify you of material changes by posting the
                                updated policy on our website with a revised "Last Updated" date or by other means, such as
                                email, where required. Your continued use of our website or services after such changes
                                constitutes acceptance of the updated policy.</p>

                            <div class="policy-section-divider"></div>

                            <h3>12. Contact Us</h3>
                            <p>If you have questions, concerns, or requests regarding this Privacy Policy or our data
                                practices,
                                please contact us at:</p>
                            <p><strong>Aureum International Awards</strong></p>
                            <p>Email: <a href="mailto:Connect@aureumawards.com">Connect@aureumawards.com</a></p>
                            <p>Whatsapp: +1 (445) 249-7785<br>Monday to Friday, 10:00 AM to 5:00 PM EST</p>

                            <div class="policy-section-divider"></div>

                            <h3>13. Jurisdiction and Governing Law</h3>
                            <p>This Privacy Policy is governed by the laws. Any disputes arising under this policy shall be
                                subject to the exclusive jurisdiction.</p>
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
