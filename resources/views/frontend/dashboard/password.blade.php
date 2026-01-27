@extends('frontend.dashboard.layout')

@section('dashboard-content')
    <div class="dashboard-content">
        <div class="dashboard-card">
            <h4>Change Password</h4>
            <form id="updatePasswordForm" action="{{ route('password.update') }}" method="POST" class="mt-4">
                @csrf
                <div class="field-set mb-4">
                    <label class="static-label">Old Password</label>
                    <input type="password" name="old_password" class="form-control premium-input" required>
                </div>
                <div class="field-set mb-4">
                    <label class="static-label">New Password</label>
                    <input type="password" name="new_password" class="form-control premium-input" required>
                </div>
                <div class="field-set mb-4">
                    <label class="static-label">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control premium-input" required>
                </div>
                <button type="submit" class="btn-main">
                    <span class="btn-text">Change Password</span>
                    <span class="btn-spinner d-none"><i class="fa fa-spinner fa-spin"></i></span>
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('updatePasswordForm');
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
                            form.reset();
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
                        console.error('Form Error:', error);
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
