document.addEventListener('DOMContentLoaded', function() {
    // Tab Switching Logic
    const tabs = document.querySelectorAll('.tab-item');
    const contents = document.querySelectorAll('.tab-pane');
    const nextBtns = document.querySelectorAll('.btn-next-tab');
    const prevBtns = document.querySelectorAll('.btn-prev-tab');

    function switchTab(tabId) {
        // Remove active class from all tabs and contents
        tabs.forEach(t => t.classList.remove('active'));
        contents.forEach(c => c.classList.remove('active'));

        // Add active class to selected tab and content
        const activeTab = document.querySelector(`.tab-item[data-tab="${tabId}"]`);
        const activeContent = document.getElementById(`tab-${tabId}`);

        if (activeTab && activeContent) {
            activeTab.classList.add('active');
            activeContent.classList.add('active');

            // Trigger data updates based on tab
            if (tabId === 'checkout' && typeof updateCheckoutSummary === 'function') {
                updateCheckoutSummary();
            }
            if (tabId === 'payment' && typeof updatePaymentSummary === 'function') {
                updatePaymentSummary();
            }

            // Smooth scroll to top of form
            const tabWrapper = document.querySelector('.nomination-tabs-wrapper');
            const offset = 100; // Offset for fixed header if any
            const bodyRect = document.body.getBoundingClientRect().top;
            const elementRect = tabWrapper.getBoundingClientRect().top;
            const elementPosition = elementRect - bodyRect;
            const offsetPosition = elementPosition - offset;

            window.scrollTo({
                top: offsetPosition,
                behavior: "smooth"
            });
        }
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            const tabId = this.getAttribute('data-tab');
            
            // Lock Payment Tab until submission
            if (tabId === 'payment' && !nominationData) {
                e.preventDefault();
                e.stopPropagation();
                Toast.fire({
                    icon: 'warning',
                    title: 'Action Required',
                    text: "Please complete the nomination form and click 'Proceed to Payment' to continue."
                });
                return false;
            }
            
            switchTab(tabId);
        });
    });

    nextBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const nextTabId = this.getAttribute('data-next');
            switchTab(nextTabId);
        });
    });

    prevBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const prevTabId = this.getAttribute('data-prev');
            switchTab(prevTabId);
        });
    });

    // Radio Button Active State Toggling
    const radioInputs = document.querySelectorAll('input[type="radio"]');
    
    function updateRadioStates() {
        radioInputs.forEach(radio => {
            const parent = radio.closest('.custom-radio-card') || radio.closest('.custom-radio-pill');
            if (parent) {
                if (radio.checked) {
                    parent.classList.add('active');
                    parent.style.borderColor = '#FFD700';
                    // Reset others in same group
                    const name = radio.name;
                    document.querySelectorAll(`input[name="${name}"]`).forEach(other => {
                        if (other !== radio) {
                            const otherParent = other.closest('.custom-radio-card') || other.closest('.custom-radio-pill');
                            if(otherParent) {
                                otherParent.classList.remove('active');
                                otherParent.style.borderColor = 'rgba(255, 255, 255, 0.1)';
                            }
                        }
                    });
                }
            }
        });
    }

    radioInputs.forEach(radio => {
        radio.addEventListener('change', updateRadioStates);
    });
    
    // Initial check
    updateRadioStates();

    // File Upload Name Display
    const fileInputs = document.querySelectorAll('.file-input, input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            let displayText = 'No file chosen';
            
            if (this.files && this.files.length > 1) {
                displayText = `${this.files.length} files selected`;
            } else if (this.files && this.files.length === 1) {
                displayText = this.files[0].name;
            }

            const nameDisplay = this.parentElement.querySelector('.file-name');
            if (nameDisplay) {
                nameDisplay.textContent = displayText;
                nameDisplay.style.color = '#FFD700';
            }
            
            // For evidence upload
            if (this.id === 'evidence') {
                const evidenceDisplay = document.getElementById('evidence-file-names');
                if (evidenceDisplay) {
                     evidenceDisplay.textContent = displayText;
                     evidenceDisplay.style.color = '#FFD700';
                }
            }

            // If it's the drag & drop zone
            const wrapper = this.closest('.file-upload-wrapper');
            if (wrapper) {
                const text = wrapper.querySelector('.main-text');
                if (text) text.textContent = displayText;
                wrapper.style.borderColor = '#FFD700';
                wrapper.style.background = 'rgba(255, 215, 0, 0.05)';
            }
        });
    });

    // Add Link Logic
    const addLinkBtn = document.getElementById('add-link-btn');
    const linksContainer = document.getElementById('links-container');
    const maxLinks = 5;

    if (addLinkBtn) {
        addLinkBtn.addEventListener('click', function() {
            const currentLinks = linksContainer.querySelectorAll('.link-group').length;
            if (currentLinks < maxLinks) {
                const newLinkGroup = document.createElement('div');
                newLinkGroup.className = 'input-group link-group mb-3';
                newLinkGroup.innerHTML = `
                    <span class="input-group-text"><i class="icofont-link"></i></span>
                    <input type="url" name="references[]" class="form-control premium-input" placeholder="https://">
                    <button type="button" class="btn btn-danger remove-link" style="border-radius: 0 10px 10px 0;"><i class="icofont-close"></i></button>
                `;
                linksContainer.appendChild(newLinkGroup);

                // Add remove listener
                newLinkGroup.querySelector('.remove-link').addEventListener('click', function() {
                    newLinkGroup.remove();
                    addLinkBtn.style.display = 'block';
                });
            }

            if (linksContainer.querySelectorAll('.link-group').length >= maxLinks) {
                addLinkBtn.style.display = 'none';
            }
        });
    }

    // Character Count Logic
    const textareas = document.querySelectorAll('textarea[maxlength], input[maxlength]');
    textareas.forEach(input => {
        input.addEventListener('input', function() {
            const max = this.getAttribute('maxlength');
            const current = this.value.length;
            const counter = this.nextElementSibling;
            if (counter && counter.classList.contains('char-count')) {
                counter.textContent = `${current}/${max}`;
            }
        });
    });
    // Dynamic Form Logic
    const categorySelect = document.getElementById('category_select');
    const awardsContainer = document.getElementById('awards-container');
    const awardsList = document.getElementById('awards-list');
    const questionsContainer = document.getElementById('dynamic-questions-container');
    let selectedAwardPrice = 0;

    if (categorySelect) {
        categorySelect.addEventListener('change', function() {
            const categoryId = this.value;
            if (!categoryId) return;
            fetchCategoryDetails(categoryId);
        });

        // Pre-fill if editing
        if (window.nominationToEdit && window.nominationToEdit.category_id) {
            categorySelect.value = window.nominationToEdit.category_id;
            fetchCategoryDetails(window.nominationToEdit.category_id);
        }
    }

    function fetchCategoryDetails(categoryId) {
        fetch(`/api/category-details?category_id=${categoryId}`)
            .then(response => response.json())
            .then(data => {
                renderAwards(data.awards);
                renderQuestions(data.questions);

                // Pre-fill award and questions if editing
                if (window.nominationToEdit) {
                    // Pre-select award
                    const awardRadio = document.querySelector(`input[name="award_id"][value="${window.nominationToEdit.award_id}"]`);
                    if (awardRadio) {
                        awardRadio.checked = true;
                        awardRadio.dispatchEvent(new Event('change'));
                        updateRadioStates();
                    }

                    // Pre-fill dynamic questions
                    if (window.nominationToEdit.answers) {
                        window.nominationToEdit.answers.forEach(answer => {
                            const field = document.getElementById(`question_${answer.nominee_question_id}`);
                            if (field) {
                                field.value = answer.answer;
                            }
                        });
                    }
                    
                    // Set nominationData for payment tab
                    nominationData = {
                        nomination_id: window.nominationToEdit.id,
                        application_id: window.nominationToEdit.application_id,
                        full_name: window.nominationToEdit.full_name,
                        award_amount: window.nominationToEdit.award?.amount || (awardRadio ? awardRadio.getAttribute('data-price') : 0),
                        total_amount: window.nominationToEdit.amount_paid
                    };
                    
                    // Update application ID display
                    const appIdElements = document.querySelectorAll('.application-id-value');
                    appIdElements.forEach(el => el.textContent = window.nominationToEdit.application_id);
                    
                    // Pre-fill references
                    if (window.nominationToEdit.evidence) {
                        const references = window.nominationToEdit.evidence.filter(e => e.type === 'link');
                        if (references.length > 0) {
                            const linksContainer = document.getElementById('links-container');
                            const firstInput = linksContainer.querySelector('input[name="references[]"]');
                            if (firstInput) firstInput.value = references[0].reference_url;
                            
                            for (let i = 1; i < references.length; i++) {
                                document.getElementById('add-link-btn').click();
                                const inputs = linksContainer.querySelectorAll('input[name="references[]"]');
                                inputs[inputs.length - 1].value = references[i].reference_url;
                            }
                        }
                    }
                }
            })
            .catch(err => console.error('Error fetching details:', err));
    }

    function renderAwards(awards) {
        awardsList.innerHTML = '';
        if (awards && awards.length > 0) {
            awardsContainer.style.display = 'block';
            awards.forEach(award => {
                const awardId = `award_${award.id}`;
                const html = `
                    <div class="col-md-6 col-lg-4">
                        <label class="custom-radio-card h-100 p-3 d-flex align-items-center">
                            <input type="radio" name="award_id" value="${award.id}" data-price="${award.amount}" class="award-radio" required>
                            <div class="d-flex justify-content-between align-items-start w-100 gap-3">
                                <span class="radio-text fw-bold text-white text-wrap" style="word-break: break-word; line-height: 1.4;">${award.name}</span>
                                <span class="text-gold fw-bold flex-shrink-0">$${parseFloat(award.amount).toFixed(2)}</span>
                            </div>
                        </label>
                    </div>
                `;
                awardsList.innerHTML += html;
            });
            
            // Add listener to new radios
            document.querySelectorAll('.award-radio').forEach(radio => {
                radio.addEventListener('change', function() {
                    selectedAwardPrice = parseFloat(this.getAttribute('data-price'));
                    // Update summaries immediately if on payment tab, forcing recalc
                     if(document.getElementById('tab-payment').classList.contains('active')){
                        updatePaymentSummary();
                     }
                });
            });
        } else {
            awardsContainer.style.display = 'none';
             awardsList.innerHTML = '<p class="text-muted">No awards available for this category.</p>';
        }
    }

    function renderQuestions(questions) {
        questionsContainer.innerHTML = '';
        if (questions && questions.length > 0) {
            questions.forEach((q, index) => {
                const html = `
                    <div class="field-set floating-label mb-4">
                        <textarea name="question_${q.id}" id="question_${q.id}" 
                            class="form-control premium-input premium-textarea"
                            rows="4" placeholder=" " required></textarea>
                        <label for="question_${q.id}">${q.question}</label>
                    </div>
                `;
                questionsContainer.innerHTML += html;
            });
        }
    }

    // Form Submission Logic
    const nominationForm = document.getElementById('nomination-form');
    const btnProceedPayment = document.querySelector('.btn-next-tab[data-next="payment"]');
    let nominationData = null; // Store nomination data after submission

    if (btnProceedPayment) {
        btnProceedPayment.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Custom Manual Validation to avoid "not focusable" browser errors
            let isValid = true;
            let firstInvalidField = null;
            const requiredFields = nominationForm.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value || field.value.trim() === '') {
                    isValid = false;
                    field.classList.add('is-invalid'); // Add visual error state
                    if (!firstInvalidField) firstInvalidField = field;
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                const fieldName = firstInvalidField.getAttribute('name') || 'required field';
                Toast.fire({
                    icon: 'warning',
                    title: 'Missing Information',
                    text: `Please complete the ${fieldName} field.`
                });
                
                // Scroll to error
                if (firstInvalidField) {
                    firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    try { firstInvalidField.focus(); } catch(e){}
                }
                return;
            }

            // Show loading state
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="icofont-spinner icofont-spin"></i> Submitting...';
            this.disabled = true;

            // Prepare form data
            const formData = new FormData(nominationForm);
            
            // Add discount code if applied
            const discountSelect = document.getElementById('discount_select');
            if (discountSelect && discountSelect.value) {
                formData.append('discount_code', discountSelect.value);
            }

            // Submit via AJAX
            fetch(nominationForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Store nomination data
                    nominationData = data.data;
                    
                    // Update payment tab with nomination data
                    document.getElementById('pay-nominee-name').textContent = data.data.full_name;
                    document.getElementById('pay-entry-title').textContent = document.getElementById('contribution_title').value;
                    
                    const categorySelect = document.querySelector('select[name="category"]');
                    document.getElementById('pay-category').textContent = categorySelect.options[categorySelect.selectedIndex]?.text || 'N/A';
                    
                    // Update application ID
                    const appIdElements = document.querySelectorAll('.application-id-value');
                    appIdElements.forEach(el => el.textContent = data.data.application_id);
                    
                    // Update amounts
                    document.getElementById('pay-base-amount').textContent = '$' + parseFloat(data.data.award_amount).toFixed(2);
                    document.getElementById('pay-total-amount').textContent = '$' + parseFloat(data.data.total_amount).toFixed(2);
                    
                    // Show success message
                    Toast.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Nomination submitted successfully! Application ID: ' + data.data.application_id
                    });
                    
                    // Switch to payment tab
                    switchTab('payment');
                    
                    // Reset button
                    btnProceedPayment.innerHTML = originalText;
                    btnProceedPayment.disabled = false;
                } else {
                    // Show error
                    Toast.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Failed to submit nomination'
                    });
                    btnProceedPayment.innerHTML = originalText;
                    btnProceedPayment.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Toast.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while submitting your nomination. Please try again.'
                });
                btnProceedPayment.innerHTML = originalText;
                btnProceedPayment.disabled = false;
            });
        });
    }

    // Review Button Logic - Generate PDF Preview
    const btnReview = document.getElementById('btn-review-application');
    if(btnReview){
        btnReview.addEventListener('click', function(){
            const appId = (nominationData && nominationData.application_id) || (window.nominationToEdit && window.nominationToEdit.application_id);
            if (appId) {
                window.open('/nomination/pdf/' + appId, '_blank');
            } else {
                Toast.fire({
                    icon: 'info',
                    title: 'Submission Required',
                    text: "Please click 'Proceed to Payment' first to save your details and generate a review PDF."
                });
            }
        });
    }


    // Payment Tab Logic
    const paymentNextBtns = document.querySelectorAll('.btn-next-tab[data-next="payment"]');
    const btnApplyDiscount = document.getElementById('btn-apply-discount');
    const btnRemoveDiscount = document.getElementById('btn-remove-discount');
    const discountRow = document.getElementById('discount-row');
    const discountInputContainer = document.getElementById('discount-input-container');
    const discountSelect = document.getElementById('discount_select');
    
    let isDiscountApplied = false;
    let currentDiscountValue = 0;

    function updatePaymentSummary() {
        // Get values from DOM (Step 1 inputs)
        const fullName = document.getElementById('full_name').value || '-';
        const entryTitle = document.getElementById('contribution_title').value || '-';
        const categorySelect = document.querySelector('select[name="category"]');
        const categoryText = categorySelect.options[categorySelect.selectedIndex]?.text ||
            'No Category Selected';

        // Update Payment DOM
        document.getElementById('pay-nominee-name').textContent = fullName;
        document.getElementById('pay-entry-title').textContent = entryTitle;
        document.getElementById('pay-category').textContent = categoryText;

        calculatePaymentTotal();
    }

    function calculatePaymentTotal() {
        // Use Dynamic Price from nomination data (source of truth after submission)
        let basePrice = 0;
        if (nominationData && nominationData.award_amount) {
            basePrice = parseFloat(nominationData.award_amount);
        } else if (typeof selectedAwardPrice !== 'undefined') {
            basePrice = parseFloat(selectedAwardPrice);
        }
        
        const adminFees = parseFloat(window.adminFeeAmount || 35.00);
        
        // Ensure numbers
        if (isNaN(basePrice)) basePrice = 0;
        
        let subtotal = basePrice + adminFees;
        let couponDiscountAmount = 0;
        
        if (isDiscountApplied) {
            couponDiscountAmount = currentDiscountValue;
            // UI Updates for Applied State
            discountRow.classList.remove('d-none');
            discountInputContainer.classList.remove('d-none');
            if(btnRemoveDiscount) btnRemoveDiscount.classList.add('d-none');
        } else {
            // UI Updates for Default State
            discountRow.classList.add('d-none');
            discountInputContainer.classList.remove('d-none');
            if(btnRemoveDiscount) btnRemoveDiscount.classList.add('d-none');
        }

        const remainingTotal = subtotal - couponDiscountAmount;
        
        // Gateway Discount
        const selectedGateway = document.querySelector('input[name="payment_method"]:checked');
        let gatewayDiscountAmount = 0;
        const gatewayDiscountRow = document.getElementById('gateway-discount-row');
        const gatewayDiscountValueEl = document.getElementById('gateway-discount-amount');

        if (selectedGateway) {
            const gatewayPct = parseFloat(selectedGateway.getAttribute('data-discount') || 0);
            if (gatewayPct > 0) {
                gatewayDiscountAmount = (remainingTotal * gatewayPct) / 100;
                if (gatewayDiscountRow) gatewayDiscountRow.classList.remove('d-none');
                if (gatewayDiscountValueEl) gatewayDiscountValueEl.textContent = '-$' + gatewayDiscountAmount.toFixed(2);
            } else {
                if (gatewayDiscountRow) gatewayDiscountRow.classList.add('d-none');
            }
        }

        const finalTotal = remainingTotal - gatewayDiscountAmount;

        // Update Summary Table Base Price
        const baseAmountElement = document.getElementById('pay-base-amount');
        if(baseAmountElement) {
            baseAmountElement.textContent = '$' + basePrice.toFixed(2);
        }
        
        document.getElementById('pay-total-amount').textContent = '$' + (finalTotal < 0 ? 0 : finalTotal).toFixed(2);
    }

    function applySelectedDiscount() {
        const selectedOption = discountSelect.options[discountSelect.selectedIndex];
        
        if (!discountSelect.value || discountSelect.value === "") {
            return;
        }

        const type = selectedOption.getAttribute('data-type');
        const value = parseFloat(selectedOption.getAttribute('data-value'));

        if (type === 'fixed') {
            currentDiscountValue = value;
        } else if (type === 'percentage') {
            let basePrice = 0;
            if (typeof nominationData !== 'undefined' && nominationData && nominationData.award_amount) {
                basePrice = parseFloat(nominationData.award_amount);
            } else if (typeof selectedAwardPrice !== 'undefined') {
                basePrice = parseFloat(selectedAwardPrice);
            }
            
            const adminFees = parseFloat(window.adminFeeAmount || 35.00);
            const subtotal = basePrice + adminFees;
            currentDiscountValue = (subtotal * value) / 100;
        }

        isDiscountApplied = true;
        const discountAmountEl = document.getElementById('discount-amount');
        if (discountAmountEl) {
            discountAmountEl.textContent = '-$' + currentDiscountValue.toFixed(2);
        }
        calculatePaymentTotal();
    }

    if (btnApplyDiscount) {
        btnApplyDiscount.addEventListener('click', function() {
            if (!discountSelect.value || discountSelect.value === "") {
                Toast.fire({
                    icon: 'warning',
                    title: 'Selection Required',
                    text: 'Please select a discount from the list.'
                });
                return;
            }
            applySelectedDiscount();
            Toast.fire({
                icon: 'success',
                title: 'Discount Applied',
                text: 'Discount applied successfully!'
            });
        });
    }

    // Direct Apply on Change
    if (discountSelect) {
        discountSelect.addEventListener('change', function() {
            applySelectedDiscount();
        });
    }

    paymentNextBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            updatePaymentSummary();
            // Check for auto-apply if only one discount
            if (discountSelect && discountSelect.getAttribute('data-auto-apply') === 'true') {
                setTimeout(applySelectedDiscount, 100); // Small delay to ensure nominationData is ready
            }
        });
    });

    if (btnRemoveDiscount) {
        btnRemoveDiscount.addEventListener('click', function() {
            isDiscountApplied = false;
            currentDiscountValue = 0;
            calculatePaymentTotal();
        });
    }

    // Payment Method Selection Logic
    const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
    const conversionInfo = document.getElementById('payment-conversion-info');

    paymentMethodRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'payu') {
                conversionInfo.classList.remove('d-none');
            } else {
                conversionInfo.classList.add('d-none');
            }
            updateRadioStates();
            calculatePaymentTotal();
        });
    });

    // Pay & Submit Logic
    const btnPayAndSubmit = document.querySelector('.btn-main.btn-glow.px-5.next-btns'); // Pay & Submit button
    if (btnPayAndSubmit && btnPayAndSubmit.textContent.includes('Pay')) {
        btnPayAndSubmit.addEventListener('click', function(e) {
            e.preventDefault();

            if (!nominationData || !nominationData.nomination_id) {
                Toast.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Nomination data not found. Please try again.'
                });
                return;
            }

            const selectedMethod = document.querySelector('input[name="payment_method"]:checked')?.value;
            if (!selectedMethod) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Selection Required',
                    text: 'Please select a payment method.'
                });
                return;
            }

            // Show loading
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="icofont-spinner icofont-spin"></i> Initializing Payment...';
            this.disabled = true;

            const discountSelect = document.getElementById('discount_select');
            let discountId = null;
            if (discountSelect && discountSelect.selectedIndex > 0) {
                discountId = discountSelect.value;
            }
            
            console.log('Initiating payment with data:', {
                nomination_id: nominationData.nomination_id,
                payment_method: selectedMethod,
                discount_id: discountId,
                isDiscountApplied: isDiscountApplied
            });

            fetch('/payment/initiate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify({
                    nomination_id: nominationData.nomination_id,
                    payment_method: selectedMethod,
                    discount_id: discountId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Handle redirection or gateway specific logic
                    if (data.payment_data.url) {
                        if (data.payment_data.payload) {
                            // For PayPal (IPN), PayU (POST form)
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = data.payment_data.url;

                            for (const key in data.payment_data.payload) {
                                const input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = key;
                                input.value = data.payment_data.payload[key];
                                form.appendChild(input);
                            }
                            document.body.appendChild(form);
                            form.submit();
                        } else {
                            // For Stripe Checkout direct redirect
                            window.location.href = data.payment_data.url;
                        }
                    } else if (selectedMethod === 'razorpay') {
                        // Handle Razorpay SDK
                        const options = {
                            ...data.payment_data,
                            "handler": function (response){
                                // Verify payment on backend
                                window.location.href = `/payment/success?razorpay_payment_id=${response.razorpay_payment_id}&razorpay_order_id=${response.razorpay_order_id}&razorpay_signature=${response.razorpay_signature}`;
                            },
                        };
                        
                        if (typeof Razorpay === 'undefined') {
                            const script = document.createElement('script');
                            script.src = 'https://checkout.razorpay.com/v1/checkout.js';
                            script.onload = () => {
                                const rzp = new Razorpay(options);
                                rzp.open();
                                btnPayAndSubmit.innerHTML = originalText;
                                btnPayAndSubmit.disabled = false;
                            };
                            document.body.appendChild(script);
                        } else {
                            const rzp = new Razorpay(options);
                            rzp.open();
                            btnPayAndSubmit.innerHTML = originalText;
                            btnPayAndSubmit.disabled = false;
                        }
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Payment configuration missing for ' + selectedMethod
                        });
                        btnPayAndSubmit.innerHTML = originalText;
                        btnPayAndSubmit.disabled = false;
                    }
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Failed to initiate payment'
                    });
                    btnPayAndSubmit.innerHTML = originalText;
                    btnPayAndSubmit.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Toast.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred. Please try again.'
                });
                btnPayAndSubmit.innerHTML = originalText;
                btnPayAndSubmit.disabled = false;
            });
        });
    }

});
