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
        tab.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
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

            // Fetch details
            fetch(`/api/category-details?category_id=${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    renderAwards(data.awards);
                    renderQuestions(data.questions);
                })
                .catch(err => console.error('Error fetching details:', err));
        });
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

    // Review Button Logic
    const btnReview = document.getElementById('btn-review-application');
    if(btnReview){
        btnReview.addEventListener('click', function(){
            alert("Review Mode: A PDF preview would be generated here.");
            // In a real app, window.open('/generate-pdf-preview');
        });
    }


    // Payment Tab Logic
    const paymentNextBtns = document.querySelectorAll('.btn-next-tab[data-next="payment"]');
    const btnApplyDiscount = document.getElementById('btn-apply-discount');
    const btnRemoveDiscount = document.getElementById('btn-remove-discount');
    const discountRow = document.getElementById('discount-row');
    let isDiscountApplied = false;

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
        // Use Dynamic Price from selected award, default to 299.99 if nothing selected yet (fallback)
        const basePrice = selectedAwardPrice > 0 ? selectedAwardPrice : 0;
        
        const adminFees = 35.00;
        const discountValue = 100.00;
        
        let total = basePrice + adminFees;
        
        if (isDiscountApplied) {
            total -= discountValue;
            
            // UI Updates for Applied State
            discountRow.classList.remove('d-none');
            btnApplyDiscount.classList.add('d-none');
            btnRemoveDiscount.classList.remove('d-none');
        } else {
            // UI Updates for Default State
            discountRow.classList.add('d-none');
            btnApplyDiscount.classList.remove('d-none');
            btnRemoveDiscount.classList.add('d-none');
        }

        // Update Summary Table Base Price
        const baseAmountElement = document.getElementById('pay-base-amount');
        if(baseAmountElement) {
            baseAmountElement.textContent = '$' + basePrice.toFixed(2);
        }
        
        document.getElementById('pay-total-amount').textContent = '$' + total.toFixed(2);
    }

    paymentNextBtns.forEach(btn => {
        btn.addEventListener('click', updatePaymentSummary);
    });

    if (btnApplyDiscount) {
        btnApplyDiscount.addEventListener('click', function() {
            isDiscountApplied = true;
            calculatePaymentTotal();
        });
    }

    if (btnRemoveDiscount) {
        btnRemoveDiscount.addEventListener('click', function() {
            isDiscountApplied = false;
            calculatePaymentTotal();
        });
    }

});
