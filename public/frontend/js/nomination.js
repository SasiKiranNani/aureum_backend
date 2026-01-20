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

    // File Upload Name Display
    const fileInputs = document.querySelectorAll('.file-input, input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
            const nameDisplay = this.parentElement.querySelector('.file-name');
            if (nameDisplay) {
                nameDisplay.textContent = fileName;
                nameDisplay.style.color = '#FFD700';
            }

            // If it's the drag & drop zone
            const wrapper = this.closest('.file-upload-wrapper');
            if (wrapper) {
                const text = wrapper.querySelector('.main-text');
                if (text) text.textContent = fileName;
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
    // Checkout Logic
    const checkoutTabBtn = document.querySelector('.tab-item[data-tab="checkout"]');
    const checkoutNextBtns = document.querySelectorAll('.btn-next-tab[data-next="checkout"]');

    function updateCheckoutSummary() {
        // Get values
        const fullName = document.getElementById('full_name').value || '-';
        const entryTitle = document.getElementById('contribution_title').value || '-';
        const categorySelect = document.querySelector('select[name="category"]');
        const categoryText = categorySelect.options[categorySelect.selectedIndex]?.text ||
            'No Category Selected';

        // Update DOM
        document.getElementById('summary-nominee-name').textContent = fullName;
        document.getElementById('summary-entry-title').textContent = entryTitle;
        document.getElementById('summary-category').textContent = categoryText;

        calculateTotal();
    }

    function calculateTotal() {
        const basePrice = 299.99;
        const quickCredCost = 125.00;
        const adminFees = 35.00;
        const discount = 100.00;

        const quickCredSelect = document.getElementById('quick-cred-select');
        const isQuickCred = quickCredSelect.value === 'yes';

        let total = basePrice + adminFees - discount;

        if (isQuickCred) {
            total += quickCredCost;
            document.getElementById('quick-cred-price').textContent = '$' + quickCredCost.toFixed(2);
        } else {
            document.getElementById('quick-cred-price').textContent = '$0.00';
        }

        document.getElementById('total-amount').textContent = '$' + total.toFixed(2);
    }

    // Listeners
    if (checkoutTabBtn) {
        checkoutTabBtn.addEventListener('click', updateCheckoutSummary);
    }
    checkoutNextBtns.forEach(btn => {
        btn.addEventListener('click', updateCheckoutSummary);
    });

    const quickCredSelect = document.getElementById('quick-cred-select');
    if (quickCredSelect) {
        quickCredSelect.addEventListener('change', calculateTotal);
    }

    // Payment Tab Logic
    const paymentNextBtns = document.querySelectorAll('.btn-next-tab[data-next="payment"]');

    function updatePaymentSummary() {
        // Get values from DOM (reuse checkout logic values)
        const fullName = document.getElementById('full_name').value || '-';
        const entryTitle = document.getElementById('contribution_title').value || '-';
        const categorySelect = document.querySelector('select[name="category"]');
        const categoryText = categorySelect.options[categorySelect.selectedIndex]?.text ||
            'No Category Selected';

        // Get Total and QuickCred status from Checkout tab calculation
        const quickCredSelect = document.getElementById('quick-cred-select');
        const isQuickCred = quickCredSelect.value === 'yes';

        // Update Payment DOM
        document.getElementById('pay-nominee-name').textContent = fullName;
        document.getElementById('pay-entry-title').textContent = entryTitle;
        document.getElementById('pay-category').textContent = categoryText;

        // Update QuickCred details in Payment Summary
        const quickCredCost = 125.00;
        if (isQuickCred) {
            document.getElementById('pay-quickcred-status').textContent = 'Yes';
            document.getElementById('pay-quickcred-amount').textContent = '$' + quickCredCost.toFixed(2);
            document.getElementById('pay-quickcred-col-amount').textContent = '$' + quickCredCost.toFixed(
                2);
        } else {
            document.getElementById('pay-quickcred-status').textContent = 'No';
            document.getElementById('pay-quickcred-amount').textContent = '$0.00';
            document.getElementById('pay-quickcred-col-amount').textContent = '$0.00';
        }

        // Update Total
        // Recalculate to be safe
        const basePrice = 299.99;
        const adminFees = 35.00;
        const discount = 100.00;
        let total = basePrice + adminFees - discount;
        if (isQuickCred) total += quickCredCost;

        document.getElementById('pay-total-amount').textContent = '$' + total.toFixed(2);
    }

    paymentNextBtns.forEach(btn => {
        btn.addEventListener('click', updatePaymentSummary);
    });

});
