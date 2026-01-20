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
                                <li class="tab-item" data-tab="checkout">
                                    <div class="tab-icon"><i class="icofont-cart"></i></div>
                                    <div class="tab-info">
                                        <span class="step-num">Step 02</span>
                                        <span class="step-text">Checkout</span>
                                    </div>
                                </li>
                                <div class="tab-connector"></div>
                                <li class="tab-item" data-tab="payment">
                                    <div class="tab-icon"><i class="icofont-credit-card"></i></div>
                                    <div class="tab-info">
                                        <span class="step-num">Step 03</span>
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
                                <div class="form-section">
                                    <div class="section-header">
                                        <div class="section-icon"><i class="icofont-id-card"></i></div>
                                        <h3 class="section-title">Nominee Details</h3>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="text" name="full_name" id="full_name"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="full_name">Full Legal Name</label>
                                            </div>
                                        </div>
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
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="text" name="professional_title" id="professional_title"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="professional_title">Primary Professional Title / Role</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="text" name="industry" id="industry"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="industry">Field of Industry</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="text" name="current_country" id="current_country"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="current_country">Country of Current Professional
                                                    Practice</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="text" name="nationality" id="nationality"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="nationality">Nationality / Citizenship</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="field-set floating-label">
                                                <input type="email" name="email" id="email"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="email">Primary Contact Email</label>
                                            </div>
                                        </div>

                                        <!-- Social Profiles -->
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="url" name="linkedin_url" id="linkedin_url"
                                                    class="form-control premium-input" placeholder=" " required>
                                                <label for="linkedin_url">LinkedIn Profile URL <span
                                                        class="text-main">*</span></label>
                                                <i class="icofont-linkedin input-icon"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="field-set floating-label">
                                                <input type="url" name="github_url" id="github_url"
                                                    class="form-control premium-input" placeholder=" ">
                                                <label for="github_url">GitHub Profile URL (Optional)</label>
                                                <i class="icofont-github input-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 2: Award Application Details -->
                                <div class="form-section">
                                    <div class="section-header">
                                        <div class="section-icon"><i class="icofont-trophy"></i></div>
                                        <h3 class="section-title">Award Application Details</h3>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="field-set">
                                                <label class="static-label">Award Category / Discipline</label>
                                                <select name="category" class="form-control premium-input premium-select"
                                                    required>
                                                    <option value="" disabled selected>Select Category</option>
                                                    <option value="innovation">Innovation & Technology</option>
                                                    <option value="leadership">Leadership & Management</option>
                                                    <option value="social_impact">Social Impact</option>
                                                    <option value="arts">Arts & Culture</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="static-label mb-3 d-block">Mode of Nomination</label>
                                            <div class="d-flex gap-4 flex-wrap">
                                                <label class="custom-radio-card">
                                                    <input type="radio" name="nomination_mode" value="self" checked>
                                                    <div class="radio-card-content">
                                                        <span class="radio-icon"><i class="icofont-user"></i></span>
                                                        <span class="radio-text">Self-Nomination</span>
                                                    </div>
                                                </label>
                                                <label class="custom-radio-card">
                                                    <input type="radio" name="nomination_mode" value="third_party">
                                                    <div class="radio-card-content">
                                                        <span class="radio-icon"><i class="icofont-users"></i></span>
                                                        <span class="radio-text">Institutional / Third-Party</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 3: Contribution Overview -->
                                <div class="form-section">
                                    <div class="section-header">
                                        <div class="section-icon"><i class="icofont-pen-alt-1"></i></div>
                                        <h3 class="section-title">Contribution Overview</h3>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="field-set floating-label">
                                                <input type="text" name="contribution_title" id="contribution_title"
                                                    class="form-control premium-input" maxlength="75" placeholder=" "
                                                    required>
                                                <label for="contribution_title">Title of Principal Contribution or
                                                    Work</label>
                                                <small class="char-count">0/75</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="field-set floating-label">
                                                <textarea name="nature_contribution" id="nature_contribution" class="form-control premium-input premium-textarea"
                                                    maxlength="450" rows="4" placeholder=" " required></textarea>
                                                <label for="nature_contribution">Q1. Nature of Contribution</label>
                                                <small class="char-count">0/450</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="field-set floating-label">
                                                <textarea name="originality" id="originality" class="form-control premium-input premium-textarea" maxlength="450"
                                                    rows="4" placeholder=" " required></textarea>
                                                <label for="originality">Q2. Originality and Distinction at an
                                                    International Level</label>
                                                <small class="char-count">0/450</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="field-set floating-label">
                                                <textarea name="cross_border_scope" id="cross_border_scope" class="form-control premium-input premium-textarea"
                                                    maxlength="450" rows="4" placeholder=" " required></textarea>
                                                <label for="cross_border_scope">Q3. Cross-Border Scope and
                                                    Relevance</label>
                                                <small class="char-count">0/450</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="field-set floating-label">
                                                <textarea name="societal_value" id="societal_value" class="form-control premium-input premium-textarea"
                                                    maxlength="450" rows="4" placeholder=" " required></textarea>
                                                <label for="societal_value">Q4. Professional, Industry, or Societal
                                                    Value</label>
                                                <small class="char-count">0/450</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section 4: Global Reach -->
                                <div class="form-section">
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
                                </div>

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

                                <!-- Section 6: Declaration & Consent -->
                                <div class="form-section">
                                    <div class="section-header">
                                        <div class="section-icon"><i class="icofont-verification-check"></i></div>
                                        <h3 class="section-title">Declaration & Consent</h3>
                                    </div>
                                    <div class="declaration-box">
                                        <label class="custom-checkbox-row">
                                            <input type="checkbox" name="declaration_accurate" required>
                                            <span class="checkbox-box"><i class="icofont-check"></i></span>
                                            <span class="checkbox-text">I declare that the information submitted is
                                                accurate, original, and provided in good faith.</span>
                                        </label>
                                        <label class="custom-checkbox-row">
                                            <input type="checkbox" name="declaration_privacy" required>
                                            <span class="checkbox-box"><i class="icofont-check"></i></span>
                                            <span class="checkbox-text">I wish to keep this submitted data strictly for
                                                internal evaluation purposes only.</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-actions text-end mt-5">
                                    <button type="button" class="btn-main btn-glow btn-next-tab next-btns"
                                        data-next="checkout">Continue to Checkout <i
                                            class="icofont-arrow-right"></i></button>
                                </div>
                            </form>
                        </div>

                        <!-- Checkout & Payment Tabs (Same Placeholders, refined style) -->
                        <div id="tab-checkout" class="tab-pane">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb-4 text-white">Review & Checkout</h4>
                                    <!-- Checkout Table -->
                                    <div class="form-section p-0 overflow-hidden mb-4">
                                        <div class="table-responsive">
                                            <table class="table checkout-table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="ps-4" width="40%">ENTRY INFORMATION</th>
                                                        <th width="35%">CATEGORIES</th>
                                                        <th class="text-end pe-4" width="25%">AMOUNT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="ps-4 py-4">
                                                            <div class="entry-info-cell">
                                                                <div class="info-row mb-2">
                                                                    <span class="label text-muted">Application ID :</span>
                                                                    <span
                                                                        class="value text-white fw-bold">TEC-26-38024</span>
                                                                </div>
                                                                <div class="info-row mb-2">
                                                                    <span class="label text-muted">Entry Title :</span>
                                                                    <span class="value text-white"
                                                                        id="summary-entry-title">-</span>
                                                                </div>
                                                                <div class="info-row">
                                                                    <span class="label text-muted">Company/Individual Name
                                                                        :</span>
                                                                    <span class="value text-white"
                                                                        id="summary-nominee-name">-</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="py-4 align-top">
                                                            <div class="category-cell">
                                                                <span class="text-white" id="summary-category">-</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-end pe-4 py-4 align-top">
                                                            <div class="amount-cell">
                                                                <span class="text-white fw-bold"
                                                                    id="base-amount">$299.99</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- QuickCred Row -->
                                                    <tr class="quick-cred-row">
                                                        <td colspan="2" class="ps-4 py-4 border-bottom-0">
                                                            <div class="quick-cred-wrapper">
                                                                <div class="d-flex align-items-center mb-2 gap-2">
                                                                    <h6 class="mb-0 text-white">QuickCred Evaluation</h6>
                                                                    <span class="text-gold fs-14">($125.00 per
                                                                        entry/category)</span>
                                                                </div>
                                                                <ul class="quick-cred-info text-muted fs-14 ps-3 mb-0">
                                                                    <li>The QuickCred Evaluation process typically requires
                                                                        18–20 days from the date of submission.</li>
                                                                    <li>If the results have not been announced within this
                                                                        timeframe, please contact us with your Entry ID at
                                                                        connect@aureumawards.com.</li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <td class="text-end pe-4 py-4 border-bottom-0 align-top">
                                                            <div class="d-flex flex-column align-items-end gap-2">
                                                                <select
                                                                    class="form-select premium-select premium-select-sm w-auto"
                                                                    id="quick-cred-select">
                                                                    <option value="no">No</option>
                                                                    <option value="yes">Yes</option>
                                                                </select>
                                                                <span class="text-white fw-bold mt-1"
                                                                    id="quick-cred-price">$0.00</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Totals Section -->
                                    <div class="row justify-content-end">
                                        <div class="col-md-5 col-lg-4">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="text-white fw-bold">Administration Fees:</span>
                                                <span class="text-white fw-bold">$35.00</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="text-white fw-bold">Discount Applied:</span>
                                                <span class="text-white fw-bold">$100.00</span>
                                            </div>
                                            <div
                                                class="d-flex justify-content-between align-items-center border-top border-light pt-3">
                                                <span class="text-gold fs-5 fw-bold">TOTAL AMOUNT:</span>
                                                <span class="text-gold fs-5 fw-bold" id="total-amount">$234.99</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="form-actions text-end mt-5">
                                        <button type="button" class="btn-premium-back me-3 btn-prev-tab"
                                            data-prev="nomination">
                                            <i class="icofont-arrow-left"></i> Previous Step
                                        </button>
                                        <button type="button" class="btn-main btn-glow btn-next-tab next-btns"
                                            data-next="payment">Proceed to Payment <i
                                                class="icofont-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>


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
                                                                <div class="d-flex justify-content-between mb-1 text-muted fs-14"
                                                                    id="pay-quickcred-row">
                                                                    <span>QuickCred Evaluation (<span
                                                                            id="pay-quickcred-status">No</span>)</span>
                                                                    <span id="pay-quickcred-amount">$0.00</span>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-between mb-1 text-muted fs-14">
                                                                    <span>Applied Discount</span>
                                                                    <span>$100.00</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-end pe-4 py-4 align-top">
                                                            <div class="amount-column">
                                                                <div class="mb-2 text-white">$299.99</div>
                                                                <div class="mb-1 text-white">$35.00</div>
                                                                <div class="mb-1 text-white"
                                                                    id="pay-quickcred-col-amount">$0.00</div>
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
                                    </div>

                                    <!-- Disclaimer -->
                                    <div class="disclaimer-box mb-5">
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
                                    </div>

                                    <!-- Payment Methods -->
                                    <h4 class="mb-4 text-white">Select Payment Method</h4>
                                    <div class="payment-methods-grid mb-5">
                                        <div class="row g-4">
                                            <div class="col-md-6 col-lg-3">
                                                <label class="custom-radio-card payment-method-card h-100">
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
                                                <label class="custom-radio-card payment-method-card h-100">
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
                                                <label class="custom-radio-card payment-method-card h-100">
                                                    <input type="radio" name="payment_method" value="paypal">
                                                    <div
                                                        class="radio-card-content justify-content-center flex-column text-center p-4">
                                                        <div class="payment-icon mb-3"><i
                                                                class="icofont-brand-paypal"></i></div>
                                                        <span class="radio-text">Stripe</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-6 col-lg-3">
                                                <label class="custom-radio-card payment-method-card h-100">
                                                    <input type="radio" name="payment_method" value="razorpay">
                                                    <div
                                                        class="radio-card-content justify-content-center flex-column text-center p-4">
                                                        <div class="payment-icon mb-3"><i
                                                                class="icofont-brand-amazon"></i></div>
                                                        <span class="radio-text">RazorPay</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-6 col-lg-3">
                                                <label class="custom-radio-card payment-method-card h-100">
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
                                            data-prev="checkout">
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
