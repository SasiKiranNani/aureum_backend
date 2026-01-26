@extends('layouts.frontend.index')

@section('contents')
    <section id="section-hero" class="section-dark no-top no-bottom text-light jarallax relative mh-100vh jarallax">
        <img src="{{ asset('frontend/images/background/2.webp') }}" class="jarallax-img" alt="">
        <div class="sw-overlay op-7"></div>
        <div class="text-center w-100 z-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8" style="margin-top: 100px; margin-bottom: 50px;">
                        <div class="premium-reset-card wow fadeInUp">
                            <div class="card-header-icon mb-4">
                                <i class="fa fa-unlock-alt"></i>
                            </div>
                            <h2 class="fs-48 text-uppercase mb-2">Reset Password</h2>
                            <p class="text-muted mb-4 text-white-50">Please enter your new password below to secure your
                                account.</p>

                            <form id="resetPasswordForm" action="{{ route('password.update.submit') }}" method="POST"
                                class="text-start">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ $email }}">

                                <div class="field-set mb-4">
                                    <label class="static-label">Email Address</label>
                                    <input type="email" class="form-control premium-input" value="{{ $email }}"
                                        disabled>
                                </div>

                                <div class="field-set mb-4">
                                    <label class="static-label">New Password</label>
                                    <div class="password-input-wrap">
                                        <input type="password" name="password" id="password"
                                            class="form-control premium-input password-field"
                                            placeholder="Minimum 8 characters" required>
                                        <i class="fa fa-eye-slash toggle-password-view"></i>
                                    </div>
                                </div>

                                <div class="field-set mb-4">
                                    <label class="static-label">Confirm New Password</label>
                                    <div class="password-input-wrap">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control premium-input password-field"
                                            placeholder="Confirm your password" required>
                                        <i class="fa fa-eye-slash toggle-password-view"></i>
                                    </div>
                                </div>

                                <button type="submit" class="btn-main w-100 py-3">
                                    <span class="btn-text">Update Password</span>
                                    <span class="btn-spinner d-none"><i class="fa fa-spinner fa-spin"></i></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .premium-reset-card {
            background: rgba(17, 17, 17, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(197, 157, 95, 0.2);
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .card-header-icon {
            width: 80px;
            height: 80px;
            background: rgba(197, 157, 95, 0.1);
            border: 1px solid rgba(197, 157, 95, 0.4);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .card-header-icon i {
            font-size: 32px;
            color: #c59d5f;
            text-shadow: 0 0 15px rgba(197, 157, 95, 0.5);
        }

        .password-input-wrap {
            position: relative;
        }

        .toggle-password-view {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: rgba(255, 255, 255, 0.5);
            transition: color 0.3s ease;
        }

        .toggle-password-view:hover {
            color: #c59d5f;
        }

        .premium-input:disabled {
            background: rgba(255, 255, 255, 0.05) !important;
            color: rgba(255, 255, 255, 0.3) !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password Visibility Toggle
            const toggleIcons = document.querySelectorAll('.toggle-password-view');
            toggleIcons.forEach(icon => {
                icon.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('.password-field');
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.classList.remove('fa-eye-slash');
                        this.classList.add('fa-eye');
                    } else {
                        input.type = 'password';
                        this.classList.remove('fa-eye');
                        this.classList.add('fa-eye-slash');
                    }
                });
            });

            // AJAX Form Submission
            const form = document.getElementById('resetPasswordForm');
            if (form) {
                form.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    const submitBtn = form.querySelector('button[type="submit"]');
                    const btnText = submitBtn.querySelector('.btn-text');
                    const btnSpinner = submitBtn.querySelector('.btn-spinner');

                    btnText.classList.add('d-none');
                    btnSpinner.classList.remove('d-none');
                    submitBtn.disabled = true;

                    const formData = new FormData(form);

                    try {
                        const response = await fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]')?.content || ''
                            }
                        });

                        const data = await response.json();

                        if (response.ok) {
                            Toast.fire({
                                icon: 'success',
                                text: data.message
                            });

                            setTimeout(() => {
                                window.location.href = data.redirect;
                            }, 1500);
                        } else {
                            let errorMsg = data.message || 'Something went wrong.';
                            if (data.errors) {
                                errorMsg = Object.values(data.errors).flat()[0];
                            }
                            Toast.fire({
                                icon: 'error',
                                text: errorMsg
                            });
                        }
                    } catch (error) {
                        console.error('Reset Error:', error);
                        Toast.fire({
                            icon: 'error',
                            text: 'Network error. Please try again.'
                        });
                    } finally {
                        btnText.classList.remove('d-none');
                        btnSpinner.classList.add('d-none');
                        submitBtn.disabled = false;
                    }
                });
            }
        });
    </script>
@endsection
