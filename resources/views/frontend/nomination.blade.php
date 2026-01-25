@extends('layouts.frontend.index')

@section('contents')
    <section id="section-hero" class="section-dark no-top no-bottom text-light jarallax relative mh-500 jarallax">
        <img src="{{ asset('frontend/images/background/4.webp') }}" class="jarallax-img" alt="">
        <div class="gradient-edge-bottom h-50"></div>
        <div class="sw-overlay op-5"></div>
        <div class="abs w-80 bottom-10 z-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-between gx-5">
                    <div class="col-lg-6">
                        <div class="relative wow mask-right">
                            <div class="text-start">
                                <h1 class="fs-96 text-uppercase fs-sm-10vw mb-0 lh-1">Nomination</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInRight" data-wow-delay=".3s">
                        <p class="mb-0">Submit your nomination for the Aureum Awards. Recognize excellence and innovation
                            in your field.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-dark relative">
        <!-- Background Decor -->
        <div class="abs top-0 start-0 w-100 h-100 pe-none">
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
        </div>

        <div class="container relative z-2">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Tab Navigation -->
                    <div class="nomination-tabs-wrapper mb-6 wow fadeInUp">
                        <div class="nomination-tabs-container">
                            <ul class="nomination-tabs">
                                <li class="tab-item active" data-tab="nomination">
                                    <div class="tab-icon"><i class="icofont-ui-user"></i></div>
                                    <div class="tab-info">
                                        <span class="step-num">Step 01</span>
                                        <span class="step-text">Nomination Details</span>
                                    </div>
                                </li>

                                <div class="tab-connector"></div>
                                <li class="tab-item" data-tab="payment">
                                    <div class="tab-icon"><i class="icofont-credit-card"></i></div>
                                    <div class="tab-info">
                                        <span class="step-num">Step 02</span>
                                        <span class="step-text">Payment</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Tab Content -->
                    <div class="tab-content-container wow fadeInUp" data-wow-delay=".2s">

                        <!-- Nomination Form Tab -->
                        <div id="tab-nomination" class="tab-pane active">
                            <form action="#" method="POST" enctype="multipart/form-data" class="premium-form">
                                @csrf
                                <!-- Section 1: Nominee Details -->
                                <div class="premium-form-section">
                                    <div class="section-header">
                                        <div class="section-icon"><i class="icofont-id-card"></i></div>
                                        <h3 class="section-title">Nominee Details</h3>
                                    </div>
                                    <div class="row g-4">
                                        <!-- Nominee Type -->
                                        <div class="col-12">
                                            <label class="static-label mb-3 d-block">Nominee Type</label>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <label class="custom-radio-pill">
                                                    <input type="radio" name="nominee_type" value="individual" checked>
                                                    <span>Individual</span>
                                                </label>
                                                <label class="custom-radio-pill">
                                                    <input type="radio" name="nominee_type" value="organization">
                                                    <span>Organization</span>
                                                </label>
                                                <label class="custom-radio-pill">
                                                    <input type="radio" name="nominee_type" value="startup">
                                                    <span>Startup</span>
                                                </label>
                                                <label class="custom-radio-pill">
                                                    <input type="radio" name="nominee_type" value="research_group">
                                                    <span>Research Group</span>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Full Name & Org -->
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="text" name="full_name" id="full_name"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="full_name">Full Legal Name (as per official records)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="text" name="organization" id="organization"
                                                    class="form-control premium-input" placeholder=" ">
                                                <label for="organization">Organization Name</label>
                                            </div>
                                        </div>

                                        <!-- Headshot -->
                                        <div class="col-md-6">
                                            <div class="field-set">
                                                <label class="static-label">Professional Headshot (JPG/PNG)</label>
                                                <div class="file-input-container">
                                                    <input type="file" name="headshot" id="headshot" class="file-input"
                                                        accept=".jpg,.png,.jpeg" required>
                                                    <label for="headshot" class="file-label">
                                                        <i class="icofont-upload-alt"></i>
                                                        <span>Choose File...</span>
                                                    </label>
                                                    <span class="file-name">No file chosen</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Contact Info (moved down to fit layout) -->
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="email" name="email" id="email"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="email">Official Email</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="tel" name="phone" id="phone"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="phone">Contact Info (Phone)</label>
                                            </div>
                                        </div>

                                        <!-- Address -->
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="text" name="country" id="country"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="country">Country</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="text" name="industry" id="industry"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="industry">Primary Industry Sector</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="field-set floating-label">
                                                <textarea name="address" id="address" class="form-control premium-input premium-textarea" rows="2"
                                                    placeholder=" " required></textarea>
                                                <label for="address">Full Address</label>
                                            </div>
                                        </div>

                                        <!-- LinkedIn -->
                                        <div class="col-md-12">
                                            <div class="field-set floating-label">
                                                <input type="url" name="linkedin_url" id="linkedin_url"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="linkedin_url">LinkedIn Profile URL</label>
                                                <i class="icofont-linkedin input-icon"></i>
                                            </div>
                                        </div>

                                        <!-- Workforce Size -->
                                        <div class="col-12">
                                            <label class="static-label mb-3 d-block">Total Workforce Size</label>
                                            <div class="row g-3">
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <label class="custom-radio-card h-100 p-3">
                                                        <input type="radio" name="workforce_size" value="1-10">
                                                        <span class="radio-text fs-14">1–10</span>
                                                    </label>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <label class="custom-radio-card h-100 p-3">
                                                        <input type="radio" name="workforce_size" value="11-50">
                                                        <span class="radio-text fs-14">11–50</span>
                                                    </label>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <label class="custom-radio-card h-100 p-3">
                                                        <input type="radio" name="workforce_size" value="51-200">
                                                        <span class="radio-text fs-14">51–200</span>
                                                    </label>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <label class="custom-radio-card h-100 p-3">
                                                        <input type="radio" name="workforce_size" value="201-1000">
                                                        <span class="radio-text fs-14">201–1,000</span>
                                                    </label>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <label class="custom-radio-card h-100 p-3">
                                                        <input type="radio" name="workforce_size" value="1001-10000">
                                                        <span class="radio-text fs-14">1,001–10,000</span>
                                                    </label>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <label class="custom-radio-card h-100 p-3">
                                                        <input type="radio" name="workforce_size" value="10000+">
                                                        <span class="radio-text fs-14">10,000+</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Section 2: Award Application Details -->
                                <div class="premium-form-section">
                                    <div class="section-header">
                                        <div class="section-icon"><i class="icofont-trophy"></i></div>
                                        <h3 class="section-title">Award Category</h3>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="field-set">
                                                <label class="static-label">Select Award Category</label>
                                                <select name="category" id="category_select"
                                                    class="form-control premium-input premium-select" required>
                                                    <option value="" disabled selected>Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Dynamic Awards Container -->
                                        <div class="col-12" id="awards-container" style="display: none;">
                                            <label class="static-label mb-3 d-block">Select Award</label>
                                            <div class="row g-3" id="awards-list">
                                                <!-- Dynamic Award Radios will be injected here -->
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="field-set floating-label">
                                                <textarea name="eligibility_justification" id="eligibility_justification"
                                                    class="form-control premium-input premium-textarea" maxlength="120" rows="3" placeholder=" " required></textarea>
                                                <label for="eligibility_justification">Eligibility Justification (Why this
                                                    contribution fits?)</label>
                                                <small class="char-count">0/120 words</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 3: Contribution Overview -->
                                <div class="premium-form-section">
                                    <div class="section-header">
                                        <div class="section-icon"><i class="icofont-pen-alt-1"></i></div>
                                        <h3 class="section-title">Contribution Overview</h3>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="field-set floating-label">
                                                <input type="text" name="contribution_title" id="contribution_title"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="contribution_title">Contribution Title</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="field-set floating-label">
                                                <textarea name="timeframe" id="timeframe" class="form-control premium-input premium-textarea" rows="2"
                                                    placeholder=" " required></textarea>
                                                <label for="timeframe">Contribution Timeframe</label>
                                            </div>
                                        </div>

                                        <!-- Evidence Upload -->
                                        <div class="col-12">
                                            <div class="field-set">
                                                <label class="static-label">Evidence of Contribution
                                                    (PDF/Images/Docs)</label>
                                                <div class="file-upload-wrapper">
                                                    <input type="file" name="evidence[]" id="evidence"
                                                        class="file-input" multiple>
                                                    <div class="text-center">
                                                        <i class="icofont-cloud-upload fs-3 text-gold mb-2"></i>
                                                        <p class="mb-0 main-text">Drag & drop files or start upload</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Dynamic Questions Container -->
                                        <div id="dynamic-questions-container" class="col-12 w-100">
                                            <!-- Questions injected here -->
                                        </div>

                                        <!-- Compliance & Sensitivity -->
                                        <div class="col-md-4">
                                            <div class="field-set">
                                                <label class="static-label mb-2">Use of Sensitive Data?</label>
                                                <select name="sensitive_data"
                                                    class="form-control premium-input premium-select" required>
                                                    <option value="no">No</option>
                                                    <option value="yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="field-set">
                                                <label class="static-label mb-2">Past Public Controversies?</label>
                                                <select name="controversies"
                                                    class="form-control premium-input premium-select" required>
                                                    <option value="no">No</option>
                                                    <option value="yes">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="field-set">
                                                <label class="static-label mb-2">Influence on Industry?</label>
                                                <select name="industry_influence"
                                                    class="form-control premium-input premium-select" required>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 4: Global Reach -->
                                {{-- <div class="form-section">
                                    <div class="section-header">
                                        <div class="section-icon"><i class="icofont-world"></i></div>
                                        <h3 class="section-title">Global Reach</h3>
                                    </div>
                                    <div class="field-set">
                                        <label class="static-label mb-3 d-block">Geographic Scope of Impact</label>
                                        <div class="d-flex gap-3 flex-wrap">
                                            <label class="custom-radio-pill">
                                                <input type="radio" name="geo_scope" value="regional">
                                                <span>Regional</span>
                                            </label>
                                            <label class="custom-radio-pill">
                                                <input type="radio" name="geo_scope" value="multinational">
                                                <span>Multi-National</span>
                                            </label>
                                            <label class="custom-radio-pill">
                                                <input type="radio" name="geo_scope" value="international">
                                                <span>International</span>
                                            </label>
                                            <label class="custom-radio-pill">
                                                <input type="radio" name="geo_scope" value="global" checked>
                                                <span>Global</span>
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Section 5: Evidence -->
                                <div class="form-section">
                                    <div class="section-header">
                                        <div class="section-icon"><i class="icofont-file-check"></i></div>
                                        <h3 class="section-title">Evidence</h3>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-md-12">
                                            <div class="field-set">
                                                <label class="static-label">Upload Resume / Curriculum Vitae (PDF –
                                                    Optional)</label>
                                                <div class="file-upload-wrapper">
                                                    <input type="file" name="resume"
                                                        class="form-control premium-input" accept=".pdf">
                                                    <div class="file-upload-placeholder">
                                                        <i class="icofont-upload-alt"></i>
                                                        <span class="main-text">Click or Drag to Upload PDF</span>
                                                        <span class="sub-text">Max size 5MB</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="field-set">
                                                <label class="static-label">Publicly Verifiable References or Links (Up to
                                                    5)</label>
                                                <div id="links-container">
                                                    <div class="input-group link-group mb-3">
                                                        <span class="input-group-text"><i class="icofont-link"></i></span>
                                                        <input type="url" name="references[]"
                                                            class="form-control premium-input"
                                                            placeholder="https://example.com/project">
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-add-link" id="add-link-btn">
                                                    <i class="icofont-plus-circle"></i> Add Reference Link
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 4: Declaration & Consent -->
                                <div class="premium-form-section">
                                    <div class="section-header">
                                        <div class="section-icon"><i class="icofont-verification-check"></i></div>
                                        <h3 class="section-title">Declaration of Accuracy, Authenticity, and Consent</h3>
                                    </div>
                                    <div class="declaration-box">
                                        <label class="custom-checkbox-row">
                                            <input type="checkbox" name="declaration_accurate" required>
                                            <span class="checkbox-box"><i class="icofont-check"></i></span>
                                            <span class="checkbox-text">I hereby declare that all information, statements,
                                                and materials submitted as part of this nomination are true, accurate, and
                                                complete to the best of my knowledge.</span>
                                        </label>
                                        <label class="custom-checkbox-row">
                                            <input type="checkbox" name="declaration_privacy" required>
                                            <span class="checkbox-box"><i class="icofont-check"></i></span>
                                            <span class="checkbox-text">I wish to keep this submitted data strictly for
                                                internal evaluation purposes only.</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-actions d-flex justify-content-between align-items-center mt-5">
                                    <button type="button" class="btn btn-outline-light" id="btn-review-application">
                                        <i class="icofont-eye"></i> Review Application
                                    </button>
                                    <button type="button" class="btn-main btn-glow btn-next-tab next-btns"
                                        data-next="payment">Proceed to Payment <i
                                            class="icofont-arrow-right"></i></button>
                                </div>
                            </form>
                        </div>

                        <!-- Checkout & Payment Tabs (Same Placeholders, refined style) -->



                        <div id="tab-payment" class="tab-pane">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <h4 class="text-center mb-5 text-white">Payment</h4>

                                    <!-- Payment Summary Table -->
                                    <div class="form-section p-0 overflow-hidden mb-5">
                                        <div class="table-responsive">
                                            <table class="table checkout-table mb-0"
                                                style="width: 100%; table-layout: fixed;">
                                                <thead>
                                                    <tr class="payment-header">
                                                        <th class="ps-4" width="35%">ENTRY INFORMATION</th>
                                                        <th width="45%">AWARDS</th>
                                                        <th class="text-end pe-4" width="20%">AMOUNT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="ps-4 py-4">
                                                            <div class="entry-info-cell">
                                                                <div class="info-row mb-2">
                                                                    <span class="label text-muted">Application ID
                                                                        :</span>
                                                                    <span
                                                                        class="value text-white fw-bold">TEC-26-38024</span>
                                                                </div>
                                                                <div class="info-row mb-2">
                                                                    <span class="label text-muted">Entry Title :</span>
                                                                    <span class="value text-white"
                                                                        id="pay-entry-title">-</span>
                                                                </div>
                                                                <div class="info-row">
                                                                    <span class="label text-muted">Company/Individual
                                                                        Name :</span>
                                                                    <span class="value text-white"
                                                                        id="pay-nominee-name">-</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="py-4 align-top">
                                                            <div class="awards-breakdown">
                                                                <div class="mb-2 text-white" id="pay-category">-</div>
                                                                <div
                                                                    class="d-flex justify-content-between mb-1 text-muted fs-14">
                                                                    <span>Administration Fee</span>
                                                                    <span>$35.00</span>
                                                                </div>

                                                                <div
                                                                    class="d-flex justify-content-between mb-1 text-muted fs-14">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <span>Applied Discount</span>
                                                                    </div>
                                                                    <span id="discount-row" class="d-none">
                                                                        <span id="discount-amount"
                                                                            class="text-gold">-$100.00</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end pe-4 py-4 align-top">
                                                            <div class="amount-column">
                                                                <div class="mb-2 text-white" id="pay-base-amount">$0.00
                                                                </div>
                                                                <div class="mb-1 text-white">$35.00</div>

                                                                <div class="mb-1 text-white">$100.00</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="payment-total-bar text-end pe-4 py-3 bg-dark-glass">
                                            <span class="text-gold fs-5 fw-bold">TOTAL AMOUNT: <span
                                                    id="pay-total-amount">$234.99</span></span>
                                        </div>

                                        <!-- Discount Actions (Moved Below Table) -->
                                        <div
                                            class="discount-actions-bar p-3 border-top border-light d-flex justify-content-end align-items-center bg-dark-glass-2">
                                            <div class="d-flex align-items-center gap-3">
                                                <span class="text-muted fs-14">Have a discount eligibility?</span>
                                                <button type="button" id="btn-apply-discount"
                                                    class="btn btn-outline-gold btn-sm px-4">
                                                    <i class="icofont-ticket"></i> Apply Discount
                                                </button>
                                                <button type="button" id="btn-remove-discount"
                                                    class="btn btn-danger btn-sm px-4 d-none">
                                                    <i class="icofont-close-line"></i> Remove Discount
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Disclaimer -->
                                    {{-- <div class="disclaimer-box mb-5">
                                        <div class="d-flex gap-3">
                                            <i class="icofont-warning text-dark fs-4 mt-1"></i>
                                            <div>
                                                <p class="mb-3 text-dark fw-bold">Disclaimer: Aureum International
                                                    Awards restricts payments from certain countries and regions due to
                                                    international compliance laws.</p>
                                                <p class="mb-0 text-dark fs-14">Payments cannot be received from:
                                                    Afghanistan, Belarus, Burundi, Central African Republic, Chad,
                                                    Republic of the Congo, Democratic Republic of the Congo, Crimea,
                                                    Cuba, Eritrea, Iran, Iraq, Kherson, Libya, Luhansk, Myanmar (Burma),
                                                    North Korea, Russia, Somalia, South Sudan, Sudan, Syria, Venezuela,
                                                    Yemen, and Zaporizhzhia.</p>
                                                <p class="mt-3 mb-0 text-dark fs-14">Additionally, we cannot receive
                                                    USD transfers from Guinea-Bissau, Serbia, Kazakhstan, Kyrgyzstan, or
                                                    Uzbekistan. Payments from restricted areas may be rejected or
                                                    returned. Please check with our support team for supported countries
                                                    before initiating any transfer.</p>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <!-- Payment Methods -->
                                    <h4 class="mb-4 text-white">Select Payment Method</h4>
                                    <div class="payment-methods-grid mb-5">
                                        <div class="row g-4">
                                            <div class="col-md-6 col-lg-3">
                                                <label class="custom-radio-card h-100">
                                                    <input type="radio" name="payment_method" value="wire" checked>
                                                    <div
                                                        class="radio-card-content justify-content-center flex-column text-center p-4">
                                                        <div class="payment-icon mb-3"><i
                                                                class="icofont-bank-transfer"></i></div>
                                                        <span class="radio-text">WireTransfer / ACH</span>
                                                        <span class="discount-badge mt-2">5.00% off</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-6 col-lg-3">
                                                <label class="custom-radio-card h-100">
                                                    <input type="radio" name="payment_method" value="paypal">
                                                    <div
                                                        class="radio-card-content justify-content-center flex-column text-center p-4">
                                                        <div class="payment-icon mb-3"><i
                                                                class="icofont-brand-paypal"></i></div>
                                                        <span class="radio-text">PayPal</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-6 col-lg-3">
                                                <label class="custom-radio-card h-100">
                                                    <input type="radio" name="payment_method" value="stripe">
                                                    <div
                                                        class="radio-card-content justify-content-center flex-column text-center p-4">
                                                        <div class="payment-icon mb-3"><i class="icofont-credit-card"></i>
                                                        </div>
                                                        <span class="radio-text">Stripe</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-6 col-lg-3">
                                                <label class="custom-radio-card h-100">
                                                    <input type="radio" name="payment_method" value="razorpay">
                                                    <div
                                                        class="radio-card-content justify-content-center flex-column text-center p-4">
                                                        <div class="payment-icon mb-3"><i class="icofont-credit-card"></i>
                                                        </div>
                                                        <span class="radio-text">RazorPay</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-6 col-lg-3">
                                                <label class="custom-radio-card h-100">
                                                    <input type="radio" name="payment_method" value="payu">
                                                    <div
                                                        class="radio-card-content justify-content-center flex-column text-center p-4">
                                                        <div class="payment-icon mb-3"><i class="icofont-credit-card"></i>
                                                        </div>
                                                        <span class="radio-text">PayU</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="d-flex justify-content-center gap-3">
                                        <button type="button" class="btn-premium-back btn-prev-tab"
                                            data-prev="nomination">
                                            <i class="icofont-arrow-left"></i> Previous Step
                                        </button>
                                        <button type="submit" class="btn-main btn-glow px-5 next-btns">Pay &
                                            Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script src="{{ asset('frontend/js/nomination.js') }}"></script>
@endsection
