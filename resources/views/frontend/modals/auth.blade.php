<!-- Auth Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content auth-modal-content" data-lenis-prevent>
            <div class="modal-body p-0">
                <div class="auth-container">
                    <button type="button" class="btn-close btn-close-white auth-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                    <div class="auth-forms-wrapper">
                        <!-- Login Form -->
                        <div class="auth-form" id="loginForm">
                            <div class="auth-header">
                                <h2 class="auth-title">Welcome Back</h2>
                                <p class="auth-subtitle">Login to your account to continue</p>
                            </div>
                            <form action="#" method="POST">
                                <div class="form-group mb-4">
                                    <label class="auth-label">Email Address</label>
                                    <div class="auth-input-wrapper">
                                        <i class="fa fa-envelope auth-input-icon"></i>
                                        <input type="email" class="form-control auth-input"
                                            placeholder="email@example.com" required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="auth-label">Password</label>
                                    <div class="auth-input-wrapper">
                                        <i class="fa fa-lock auth-input-icon"></i>
                                        <input type="password" class="form-control auth-input password-field"
                                            placeholder="••••••••" required>
                                        <i class="fa fa-eye-slash toggle-password auth-eye-icon"></i>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input auth-checkbox" type="checkbox" id="rememberMe">
                                        <label class="form-check-label auth-checkbox-label" for="rememberMe">Remember
                                            me</label>
                                    </div>
                                    <a href="javascript:void(0)" class="auth-link toggle-auth"
                                        data-target="forgot">Forgot Password?</a>
                                </div>
                                <button type="submit" class="btn-main w-100 mb-4"><span>Login Now</span></button>
                                <p class="auth-footer-text">Don't have an account? <a href="javascript:void(0)"
                                        class="auth-link toggle-auth" data-target="signup">Sign Up</a></p>
                            </form>
                        </div>

                        <!-- Signup Form -->
                        <div class="auth-form d-none" id="signupForm">
                            <div class="auth-header">
                                <h2 class="auth-title">Create Account</h2>
                                <p class="auth-subtitle">Join us and start your journey</p>
                            </div>
                            <form action="#" method="POST">
                                <div class="form-group mb-4">
                                    <label class="auth-label">Full Name</label>
                                    <div class="auth-input-wrapper">
                                        <i class="fa fa-user auth-input-icon"></i>
                                        <input type="text" class="form-control auth-input" placeholder="John Doe"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="auth-label">Email Address</label>
                                    <div class="auth-input-wrapper">
                                        <i class="fa fa-envelope auth-input-icon"></i>
                                        <input type="email" class="form-control auth-input"
                                            placeholder="email@example.com" required>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="auth-label">Password</label>
                                    <div class="auth-input-wrapper">
                                        <i class="fa fa-lock auth-input-icon"></i>
                                        <input type="password" class="form-control auth-input password-field"
                                            placeholder="••••••••" required>
                                        <i class="fa fa-eye-slash toggle-password auth-eye-icon"></i>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="auth-label">Confirm Password</label>
                                    <div class="auth-input-wrapper">
                                        <i class="fa fa-lock auth-input-icon"></i>
                                        <input type="password" class="form-control auth-input password-field"
                                            placeholder="••••••••" required>
                                        <i class="fa fa-eye-slash toggle-password auth-eye-icon"></i>
                                    </div>
                                </div>
                                <button type="submit" class="btn-main w-100 mb-4"><span>Sign Up Now</span></button>
                                <p class="auth-footer-text">Already have an account? <a href="javascript:void(0)"
                                        class="auth-link toggle-auth" data-target="login">Login</a></p>
                            </form>
                        </div>

                        <!-- Forgot Password Form -->
                        <div class="auth-form d-none" id="forgotForm">
                            <div class="auth-header">
                                <h2 class="auth-title">Reset Password</h2>
                                <p class="auth-subtitle">Enter your email to receive a reset link</p>
                            </div>
                            <form action="#" method="POST">
                                <div class="form-group mb-4">
                                    <label class="auth-label">Email Address</label>
                                    <div class="auth-input-wrapper">
                                        <i class="fa fa-envelope auth-input-icon"></i>
                                        <input type="email" class="form-control auth-input"
                                            placeholder="email@example.com" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn-main w-100 mb-4"><span>Send Reset
                                        Link</span></button>
                                <p class="auth-footer-text">Remember your password? <a href="javascript:void(0)"
                                        class="auth-link toggle-auth" data-target="login">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleLinks = document.querySelectorAll('.toggle-auth');
        const forms = {
            login: document.getElementById('loginForm'),
            signup: document.getElementById('signupForm'),
            forgot: document.getElementById('forgotForm')
        };

        function switchForm(targetId) {
            // Find current active form
            let activeForm = null;
            for (let key in forms) {
                if (!forms[key].classList.contains('d-none')) {
                    activeForm = forms[key];
                    break;
                }
            }

            if (activeForm && activeForm !== forms[targetId]) {
                activeForm.classList.add('fade-out');
                setTimeout(() => {
                    activeForm.classList.add('d-none');
                    activeForm.classList.remove('fade-out');
                    forms[targetId].classList.remove('d-none');
                    forms[targetId].classList.add('fade-in');
                }, 300);
            }
        }

        toggleLinks.forEach(link => {
            link.addEventListener('click', function() {
                const target = this.getAttribute('data-target');
                switchForm(target);
            });
        });

        // Password Visibility Toggle
        const togglePasswords = document.querySelectorAll('.toggle-password');
        togglePasswords.forEach(icon => {
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
    });
</script>
