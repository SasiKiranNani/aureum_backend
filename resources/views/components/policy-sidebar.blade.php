@props(['active' => ''])

<div class="policy-sidebar sticky-top wow" data-wow-delay=".2s" style="top: 100px; z-index: 10;">
    <div class="policy-nav-card">
        <div class="policy-nav-title">Quick Navigation</div>
        <nav class="policy-nav">
            <a href="{{ route('privacy-policy') }}"
                class="policy-nav-link {{ $active === 'privacy-policy' ? 'active' : '' }}">
                <i class="fa fa-shield"></i> Privacy Policy
            </a>
            <a href="{{ route('terms-and-conditions') }}"
                class="policy-nav-link {{ $active === 'terms-and-conditions' ? 'active' : '' }}">
                <i class="fa fa-gavel"></i> Terms & Conditions
            </a>
            <a href="{{ route('cookie-policy') }}"
                class="policy-nav-link {{ $active === 'cookie-policy' ? 'active' : '' }}">
                <i class="fa fa-cookie"></i> Cookie Policy
            </a>
            <a href="{{ route('cancellation-refund-policy') }}"
                class="policy-nav-link {{ $active === 'cancellation-refund-policy' ? 'active' : '' }}">
                <i class="fa fa-ban"></i> Cancellation Policy
            </a>
        </nav>
    </div>

    <div class="policy-contact-box">
        <div class="policy-contact-title">Have Questions?</div>
        <div class="policy-contact-info">
            <i class="fa fa-envelope"></i> excellence@orionsm.com
        </div>
        <div class="policy-contact-info">
            <i class="fa fa-whatsapp"></i> +1 (445) 249-7785
        </div>
    </div>
</div>

<style>
    .policy-sidebar {
        position: sticky !important;
        top: 100px !important;
    }
</style>
