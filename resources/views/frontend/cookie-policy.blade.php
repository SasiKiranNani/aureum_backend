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
                            <h3>1. What Are Cookies?</h3>
                            <div class="policy-highlight">
                                <p>Cookies are small text files placed on your device (computer, smartphone, or tablet) when
                                    you visit a website. They help websites function efficiently, enhance user experience,
                                    and provide information to website operators.</p>
                            </div>
                            <p>Cookies may store information such as your preferences, browsing activity, or unique
                                identifiers. Other technologies, such as pixels, web beacons, or local storage, may perform
                                similar functions and are included in this policy under the term "cookies."</p>

                            <div class="policy-section-divider"></div>

                            <h3>2. Why Do We Use Cookies?</h3>
                            <p>We use cookies to:</p>
                            <ul>
                                <li><strong>Ensure Website Functionality:</strong> Enable core features, such as navigation,
                                    access to secure areas, and form submissions.</li>
                                <li><strong>Enhance User Experience:</strong> Personalize your visit by remembering
                                    preferences, such as language or region settings.</li>
                                <li><strong>Analyze Performance:</strong> Understand how visitors interact with our website
                                    to improve its design, content, and functionality.</li>
                                <li><strong>Support Marketing Efforts:</strong> Deliver relevant advertisements and measure
                                    the effectiveness of our campaigns.</li>
                                <li><strong>Maintain Security:</strong> Protect your data and prevent fraudulent activity.
                                </li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>3. Types of Cookies We Use</h3>
                            <p>We categorize cookies based on their purpose and duration. Below is an overview of the types
                                of
                                cookies used on our website:</p>

                            <h4>3.1 Essential Cookies</h4>
                            <p>These cookies are necessary for the Website to function properly and cannot be disabled. They
                                enable core features such as:</p>
                            <ul>
                                <li>Maintaining user sessions</li>
                                <li>Ensuring secure transactions</li>
                                <li>Supporting navigation and accessibility</li>
                            </ul>
                            <p>Examples: Authentication cookies, session cookies<br>Duration: Typically session-based or
                                short-term</p>

                            <h4>3.2 Performance and Analytics Cookies</h4>
                            <p>These cookies collect anonymized data about how you use the Website, helping us improve its
                                performance.</p>
                            <ul>
                                <li>Page views and load times</li>
                                <li>Most visited pages</li>
                                <li>Error occurrences</li>
                            </ul>
                            <p>Examples: Google Analytics, custom analytics tools<br>Duration: Varies from session-based to
                                persistent (up to 2 years)</p>

                            <h4>3.3 Functionality Cookies</h4>
                            <p>These cookies allow the Website to remember your preferences, providing a tailored
                                experience.
                            </p>
                            <ul>
                                <li>Language or region settings</li>
                                <li>Display preferences</li>
                                <li>Form autofill data</li>
                            </ul>
                            <p>Examples: Preference cookies, user interface customization cookies<br>Duration: Persistent,
                                typically lasting up to 1 year</p>

                            <h4>3.4 Marketing and Advertising Cookies</h4>
                            <p>These cookies track your browsing habits to deliver personalized advertisements and measure
                                campaign performance.</p>
                            <ul>
                                <li>Display ads relevant to your interests</li>
                                <li>Limit ad frequency</li>
                                <li>Track clicks and conversions</li>
                            </ul>
                            <p>Examples: Third-party cookies from advertising partners<br>Duration: Persistent, ranging from
                                days to 2 years</p>

                            <h4>3.5 Third-Party Cookies</h4>
                            <p>Some cookies are set by third-party services we use, such as analytics providers or
                                advertising
                                networks. Common third-party providers:</p>
                            <ul>
                                <li>Google Analytics</li>
                                <li>Meta (for advertising)</li>
                                <li>Hotjar (for user behavior analysis)</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>4. How We Use Cookie Data</h3>
                            <p>Data collected via cookies may be used to:</p>
                            <ul>
                                <li>Deliver and improve Website functionality</li>
                                <li>Analyze usage patterns to enhance user experience</li>
                                <li>Personalize content and advertisements</li>
                                <li>Monitor and prevent security threats</li>
                            </ul>
                            <p>We do not use cookie data to identify you personally unless explicitly stated (e.g., for
                                account
                                authentication). Data from analytics and marketing cookies is typically aggregated and
                                anonymized.</p>

                            <div class="policy-section-divider"></div>

                            <h3>5. Your Choices Regarding Cookies</h3>
                            <p>You have control over how cookies are used on our website. Here are your options:</p>

                            <h4>5.1 Cookie Consent</h4>
                            <p>Upon visiting our Website, you will be presented with a cookie consent banner allowing you
                                to:
                            </p>
                            <ul>
                                <li>Accept all cookies</li>
                                <li>Reject non-essential cookies</li>
                                <li>Customize your preferences by selecting specific cookie categories</li>
                            </ul>
                            <p>You can modify your preferences at any time via the Cookie Settings link in the Website
                                footer.
                            </p>

                            <h4>5.2 Browser Settings</h4>
                            <p>Most web browsers allow you to manage cookies through their settings. You can:</p>
                            <ul>
                                <li>Block all cookies</li>
                                <li>Block specific types of cookies (e.g., third-party cookies)</li>
                                <li>Delete cookies after your browsing session</li>
                            </ul>
                            <p>Please note that disabling essential cookies may affect the Website's functionality.</p>

                            <h4>5.3 Opting Out of Targeted Advertising</h4>
                            <p>To opt out of personalized ads from third-party providers:</p>
                            <ul>
                                <li>Visit the <a href="https://optout.networkadvertising.org/" target="_blank">Network
                                        Advertising Initiative</a> or <a href="https://optout.aboutads.info/"
                                        target="_blank">Digital Advertising Alliance</a></li>
                                <li>Adjust settings in your Google or Meta account for personalized ads</li>
                            </ul>

                            <div class="policy-section-divider"></div>

                            <h3>6. Data Retention and Security</h3>
                            <p>Cookies are stored on your device for varying durations:</p>
                            <ul>
                                <li><strong>Session Cookies:</strong> Deleted when you close your browser</li>
                                <li><strong>Persistent Cookies:</strong> Remain until their expiration date (e.g., days,
                                    months,
                                    or up to 2 years) or until you delete them</li>
                            </ul>
                            <p>We implement robust security measures to protect cookie data from unauthorized access,
                                including
                                encryption and secure server protocols. However, no online transmission is entirely secure,
                                and
                                we encourage you to use updated antivirus software and secure networks.</p>

                            <div class="policy-section-divider"></div>

                            <h3>7. International Data Transfers</h3>
                            <p>As a global website, data collected via cookies may be processed in countries outside your
                                region, including the United Kingdom. We comply with applicable data protection laws, such
                                as
                                the General Data Protection Regulation (GDPR), to ensure adequate safeguards for
                                international
                                transfers.</p>

                            <div class="policy-section-divider"></div>

                            <h3>8. Updates to This Cookie Policy</h3>
                            <p>We may update this Cookie Policy to reflect changes in our practices, legal requirements, or
                                technology. Significant changes will be communicated via a prominent notice on the Website
                                or by
                                email (if applicable). The "Last Updated" date at the top of this policy indicates the
                                latest
                                revision.</p>

                            <div class="policy-section-divider"></div>

                            <h3>9. Contact Us</h3>
                            <p>If you have questions about this Cookie Policy or our use of cookies, please contact us at:
                            </p>
                            <p><a href="{{ route('contact-us') }}">Contact Form</a></p>
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
