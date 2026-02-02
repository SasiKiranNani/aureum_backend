@extends('layouts.frontend.index')

@section('contents')
    <!-- Premium Banner Section -->
    <section id="section-hero" class="section-dark no-top no-bottom text-light relative overflow-hidden">
        <div class="banner-bg">
            <div class="banner-blur"></div>
            <img src="{{ asset('frontend/images/background/2.webp') }}" class="banner-img" alt="">
            <div class="banner-overlay"></div>
            <div class="banner-noise"></div>
        </div>

        <div class="container relative z-10 pt-100 pb-100">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="subtitle wow fadeInUp" data-wow-delay="0s">Join Our Elite Panel</div>
                    <div class="spacer-10"></div>
                    <h1 class="display-3 text-uppercase mb-0 reveal-text wow" data-wow-duration="1.5s">
                        <span class="text-gradient">Judge</span> Application
                    </h1>
                    <div class="spacer-20"></div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <p class="lead text-white-50 wow fadeInUp" data-wow-delay=".4s">
                                Share your expertise and contribute to recognizing excellence in our industry.
                                We seek visionary leaders to join our distinguished panel of judges.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
        </div>
    </section>

    <section id="section-form" class="bg-dark section-dark text-light relative z-2">
        <div class="container">
            <div class="row justify-content-center mt-min-100">
                <div class="col-lg-11">
                    <div class="application-card wow fadeInUp" data-wow-delay=".2s">
                        <form action="{{ route('judge.application.submit') }}" method="POST" enctype="multipart/form-data"
                            id="judgeApplicationForm" class="p-40 p-md-60">
                            @csrf

                            <div class="form-stepper-header mb-5">
                                <div class="step-item active" data-step="1">
                                    <div class="step-icon"><i class="icofont-user-alt-3"></i></div>
                                    <div class="step-label">Personal</div>
                                </div>
                                <div class="step-divider"></div>
                                <div class="step-item" data-step="2">
                                    <div class="step-icon"><i class="icofont-briefcase"></i></div>
                                    <div class="step-label">Experience</div>
                                </div>
                                <div class="step-divider"></div>
                                <div class="step-item" data-step="3">
                                    <div class="step-icon"><i class="icofont-location-pin"></i></div>
                                    <div class="step-label">Location</div>
                                </div>
                                <div class="step-divider"></div>
                                <div class="step-item" data-step="4">
                                    <div class="step-icon"><i class="icofont-listine-dots"></i></div>
                                    <div class="step-label">Category</div>
                                </div>
                            </div>

                            <!-- Form Sections -->
                            <div id="form-sections">
                                <!-- Personal Details -->
                                <div class="form-section active" id="section-1">
                                    <h3 class="section-title mb-4">Personal Information</h3>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="input-group-custom">
                                                <label class="form-label">Full Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control-premium"
                                                    placeholder="Enter your full name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group-custom">
                                                <label class="form-label">Email Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control-premium"
                                                    value="{{ auth()->user()->email }}" readonly required
                                                    title="Email cannot be changed as it is linked to your account.">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group-custom">
                                                <label class="form-label">Phone Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="phone" class="form-control-premium"
                                                    placeholder="+1 234 567 890" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group-custom">
                                                <label class="form-label">LinkedIn Profile URL</label>
                                                <input type="url" name="linkedin" class="form-control-premium"
                                                    placeholder="https://linkedin.com/in/username">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group-custom">
                                                <label class="form-label">Bio (Professional Summary)</label>
                                                <textarea name="bio" class="form-control-premium" rows="4"
                                                    placeholder="Briefly describe your professional background and achievements..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Professional Experience -->
                                <div class="form-section d-none" id="section-2">
                                    <h3 class="section-title mb-4">Professional Expertise</h3>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="input-group-custom">
                                                <label class="form-label">Present Designation <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="present_designation"
                                                    class="form-control-premium"
                                                    placeholder="e.g. CEO, Senior Creative Director" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group-custom">
                                                <label class="form-label">Working Company Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="working_company_name"
                                                    class="form-control-premium" placeholder="Current organization"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group-custom">
                                                <label class="form-label">Years of Experience <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="years_of_experience"
                                                    class="form-control-premium" min="0" placeholder="e.g. 15"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Address Details -->
                                <div class="form-section d-none" id="section-3">
                                    <h3 class="section-title mb-4">Location Details</h3>
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="input-group-custom">
                                                <label class="form-label">Permanent Address <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="address" class="form-control-premium" rows="2" placeholder="Street, Building, etc." required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group-custom">
                                                <label class="form-label">City <span class="text-danger">*</span></label>
                                                <input type="text" name="city" class="form-control-premium"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group-custom">
                                                <label class="form-label">State <span class="text-danger">*</span></label>
                                                <input type="text" name="state" class="form-control-premium"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group-custom">
                                                <label class="form-label">Country <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="country" class="form-control-premium"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group-custom">
                                                <label class="form-label">Postal Code <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="postal" class="form-control-premium"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Category & Questions -->
                                <div class="form-section d-none" id="section-4">
                                    <h3 class="section-title mb-4">Application Focus</h3>
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="input-group-custom">
                                                <label class="form-label">Select Judging Category <span
                                                        class="text-danger">*</span></label>
                                                <select name="category_id" id="categoryIdSelect"
                                                    class="form-select-premium" required>
                                                    <option value="">-- Choose Excellence Category --</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div id="categoryQuestionsWrapper" class="col-12 mt-4" style="display: none;">
                                            <h4 class="text-gold mb-3 fs-20">Category Specific Insight</h4>
                                            <div id="questionsList" class="row g-4">
                                                <!-- Questions will be loaded here via AJAX -->
                                            </div>
                                        </div>

                                        <div class="col-12 mt-5">
                                            <h4 class="text-gold mb-3 fs-20">Credentials & Media</h4>
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <label class="form-label">Profile Portrait <span
                                                            class="text-danger">*</span></label>
                                                    <div class="upload-zone rounded-10 p-4 text-center border-dashed">
                                                        <input type="file" name="profile_pic" class="d-none"
                                                            id="profilePicInput" accept="image/*" required>
                                                        <label for="profilePicInput" class="upload-label cursor-pointer">
                                                            <i class="icofont-camera fs-32 mb-2"></i>
                                                            <span>Click to Upload Portrait</span>
                                                        </label>
                                                        <div id="profilePreviewWrap" class="mt-3 d-none">
                                                            <img id="profilePreview" src=""
                                                                class="avatar-lg rounded-circle">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Supporting Documents</label>
                                                    <div class="upload-zone rounded-10 p-4 text-center border-dashed">
                                                        <input type="file" name="documents[]" class="d-none"
                                                            id="docInput" multiple>
                                                        <label for="docInput" class="upload-label cursor-pointer">
                                                            <i class="icofont-file-pdf fs-32 mb-2"></i>
                                                            <span>Upload Portfolio/CV</span>
                                                        </label>
                                                        <div id="docCount" class="mt-2 text-gold d-none">0 files selected
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-4">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="text-gold mb-0 fs-18">Additional Links</h4>
                                                <button type="button" class="btn btn-sm btn-gold-outline"
                                                    id="addUrlBtn"><i class="icofont-plus"></i> Add Link</button>
                                            </div>
                                            <div id="urlInputsList">
                                                <div class="input-group-premium mb-2">
                                                    <input type="url" name="document_urls[]"
                                                        class="form-control-premium"
                                                        placeholder="Portfolio URL, Personal Website, etc.">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Navigation -->
                            <div class="form-navigation mt-5 d-flex justify-content-between">
                                <button type="button" class="btn-premium-outline d-none"
                                    id="prevBtn">Previous</button>
                                <button type="button" class="btn-premium ms-auto" id="nextBtn">Next Step</button>
                                <button type="submit" class="btn-premium-gold d-none ms-auto" id="submitBtn">Submit
                                    Application</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Modern Hero Styles */
        #section-hero {
            min-height: 80vh;
            display: flex;
            align-items: center;
            background: #050505;
        }

        .banner-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
        }

        .banner-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.6;
            filter: grayscale(20%) contrast(110%);
        }

        .banner-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, #0a0a0a 0%, rgba(10, 10, 10, 0.8) 50%, rgba(10, 10, 10, 0.4) 100%);
        }

        .banner-blur {
            position: absolute;
            top: -10%;
            right: -10%;
            width: 50%;
            height: 50%;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.1) 0%, transparent 70%);
            filter: blur(80px);
            animation: pulse-gold 8s infinite alternate;
        }

        .banner-noise {
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            opacity: 0.03;
            pointer-events: none;
        }

        @keyframes pulse-gold {
            from {
                transform: translate(0, 0) scale(1);
            }

            to {
                transform: translate(-10%, 10%) scale(1.2);
            }
        }

        .text-gradient {
            background: linear-gradient(90deg, #FFD700, #FFA500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .reveal-text {
            overflow: hidden;
            display: inline-block;
        }

        /* Application Card */
        .application-card {
            background: rgba(20, 20, 20, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(20px);
            overflow: hidden;
        }

        .mt-min-100 {
            margin-top: -120px;
        }

        /* Stepper */
        .form-stepper-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
        }

        .step-item {
            text-align: center;
            opacity: 0.4;
            transition: 0.3s;
        }

        .step-item.active {
            opacity: 1;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 215, 0, 0.1);
            color: #FFD700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 5px;
            font-size: 18px;
            border: 1px solid rgba(255, 215, 0, 0.3);
        }

        .step-item.active .step-icon {
            background: #FFD700;
            color: #000;
        }

        .step-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .step-divider {
            flex-grow: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 0 15px;
        }

        /* Form Controls */
        .section-title {
            font-size: 24px;
            color: #FFD700;
            border-left: 4px solid #FFD700;
            padding-left: 15px;
        }

        .form-control-premium,
        .form-select-premium {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 15px 20px;
            color: #fff;
            transition: all 0.3s ease;
        }

        .form-control-premium:focus,
        .form-select-premium:focus {
            background: rgba(255, 255, 255, 0.06);
            border-color: #FFD700;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.15);
            outline: none;
        }

        .form-select-premium option {
            background-color: #1a1a1a;
            color: #fff;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #aaa;
            margin-bottom: 10px;
            display: block;
        }

        /* Buttons */
        .btn-premium {
            background: #FFD700;
            color: #000;
            border: none;
            padding: 15px 40px;
            border-radius: 30px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .btn-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
        }

        .btn-premium-outline {
            background: transparent;
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 15px 40px;
            border-radius: 30px;
            font-weight: 700;
            transition: 0.3s;
        }

        .btn-premium-gold {
            background: linear-gradient(90deg, #FFD700, #FFA500);
            color: #000;
            border: none;
            padding: 15px 50px;
            border-radius: 30px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .btn-gold-outline {
            border: 1px solid #FFD700;
            color: #FFD700;
            background: transparent;
        }

        /* Upload Area */
        .upload-zone {
            background: rgba(255, 255, 255, 0.02);
            cursor: pointer;
            transition: 0.3s;
        }

        .upload-zone:hover {
            background: rgba(255, 215, 0, 0.05);
            border-color: #FFD700;
        }

        .avatar-lg {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 3px solid #FFD700;
        }

        .border-dashed {
            border: 2px dashed rgba(255, 255, 255, 0.1);
        }

        /* Question Item */
        .question-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 25px;
            border-radius: 15px;
            transition: 0.3s;
        }

        .question-card:hover {
            border-color: rgba(255, 215, 0, 0.3);
        }
    </style>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Stepper Logic
                let currentStep = 1;
                const totalSteps = 4;
                const nextBtn = document.getElementById('nextBtn');
                const prevBtn = document.getElementById('prevBtn');
                const submitBtn = document.getElementById('submitBtn');
                const stepperItems = document.querySelectorAll('.step-item');

                function updateStepper(step) {
                    stepperItems.forEach(item => {
                        const stepNum = parseInt(item.getAttribute('data-step'));
                        if (stepNum === step) {
                            item.classList.add('active');
                        } else if (stepNum < step) {
                            item.classList.add('active');
                        } else {
                            item.classList.remove('active');
                        }
                    });

                    // Update Sections
                    document.querySelectorAll('.form-section').forEach(section => {
                        section.classList.add('d-none');
                    });
                    document.getElementById(`section-${step}`).classList.remove('d-none');

                    // Simple animation
                    document.getElementById(`section-${step}`).classList.add('wow', 'fadeIn');
                    new WOW().init();

                    // Update Buttons
                    if (step === 1) {
                        prevBtn.classList.add('d-none');
                        nextBtn.classList.remove('d-none');
                        submitBtn.classList.add('d-none');
                    } else if (step === totalSteps) {
                        nextBtn.classList.add('d-none');
                        submitBtn.classList.remove('d-none');
                        prevBtn.classList.remove('d-none');
                    } else {
                        prevBtn.classList.remove('d-none');
                        nextBtn.classList.remove('d-none');
                        submitBtn.classList.add('d-none');
                    }
                }

                nextBtn.addEventListener('click', () => {
                    if (currentStep < totalSteps) {
                        // Basic validation for current section
                        const activeSection = document.getElementById(`section-${currentStep}`);
                        const inputs = activeSection.querySelectorAll('[required]');
                        let valid = true;
                        inputs.forEach(input => {
                            if (!input.value) {
                                input.classList.add('is-invalid');
                                valid = false;
                            } else {
                                input.classList.remove('is-invalid');
                            }
                        });

                        if (valid) {
                            currentStep++;
                            updateStepper(currentStep);
                            window.scrollTo({
                                top: document.getElementById('section-form').offsetTop - 100,
                                behavior: 'smooth'
                            });
                        } else {
                            Toast.fire({
                                icon: 'warning',
                                text: 'Please fill all required fields.'
                            });
                        }
                    }
                });

                prevBtn.addEventListener('click', () => {
                    if (currentStep > 1) {
                        currentStep--;
                        updateStepper(currentStep);
                    }
                });

                // AJAX Dynamic Questions
                const categorySelect = document.getElementById('categoryIdSelect');
                const questionsWrapper = document.getElementById('categoryQuestionsWrapper');
                const questionsList = document.getElementById('questionsList');

                categorySelect.addEventListener('change', function() {
                    const categoryId = this.value;
                    if (!categoryId) {
                        questionsWrapper.style.display = 'none';
                        return;
                    }

                    questionsList.innerHTML =
                        '<div class="col-12 text-center p-5"><i class="icofont-spinner icofont-spin fs-40 text-gold"></i></div>';
                    questionsWrapper.style.display = 'block';

                    const url = "{{ route('judge.application.questions', ':id') }}".replace(':id', categoryId);

                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            if (data.length > 0) {
                                let html = '';
                                data.forEach(q => {
                                    html += `
                                        <div class="col-12">
                                            <div class="question-card">
                                                <label class="form-label text-white mb-3">${q.question_text} <span class="text-danger">*</span></label>
                                                <textarea name="answers[${q.id}]" class="form-control-premium" rows="3" required placeholder="Provide a detailed response..."></textarea>
                                            </div>
                                        </div>
                                    `;
                                });
                                questionsList.innerHTML = html;
                            } else {
                                questionsList.innerHTML =
                                    '<div class="col-12"><div class="alert alert-info bg-dark border-gold-op-1 text-white">No specific technical questions for this category.</div></div>';
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            questionsList.innerHTML =
                                '<div class="col-12 text-danger">Error loading questions.</div>';
                        });
                });

                // Misc UI Helpers
                const profilePicInput = document.getElementById('profilePicInput');
                profilePicInput.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = e => {
                            document.getElementById('profilePreview').src = e.target.result;
                            document.getElementById('profilePreviewWrap').classList.remove('d-none');
                        };
                        reader.readAsDataURL(file);
                    }
                });

                const docInput = document.getElementById('docInput');
                docInput.addEventListener('change', function() {
                    const count = this.files.length;
                    const docCount = document.getElementById('docCount');
                    docCount.innerText = `${count} file(s) selected`;
                    docCount.classList.remove('d-none');
                });

                document.getElementById('addUrlBtn').addEventListener('click', function() {
                    const div = document.createElement('div');
                    div.className = 'input-group-premium mb-2 d-flex align-items-center gap-2 fadeIn';
                    div.innerHTML = `
                        <input type="url" name="document_urls[]" class="form-control-premium" placeholder="https://...">
                        <button type="button" class="btn btn-danger btn-sm rounded-circle p-2" onclick="this.parentElement.remove()"><i class="icofont-trash"></i></button>
                    `;
                    document.getElementById('urlInputsList').appendChild(div);
                });
            });
        </script>
    @endpush
@endsection
