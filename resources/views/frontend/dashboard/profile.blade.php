@extends('frontend.dashboard.layout')

@section('dashboard-content')
    <div class="dashboard-content">
        <div class="dashboard-card">
            <h4>Edit Profile</h4>
            <form id="updateProfileForm" action="{{ route('profile.update') }}" method="POST" class="mt-4">
                @csrf
                <div class="field-set mb-4">
                    <label class="static-label">Full Name</label>
                    <input type="text" name="name" class="form-control premium-input" value="{{ Auth::user()->name }}"
                        required>
                </div>
                <button type="submit" class="btn-main">
                    <span class="btn-text">Update Profile</span>
                    <span class="btn-spinner d-none"><i class="fa fa-spinner fa-spin"></i></span>
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('updateProfileForm');
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
                            // Update name displays across the page
                            document.querySelectorAll('.user-name-display').forEach(el =>
                                el.innerText = data.user.name);
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
