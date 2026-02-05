<div>
    <div class="judge-login-wrapper">

        <!-- ANIMATED BACKGROUND: 3D GOLDEN RIPPLE MESH -->
        <div class="background-mesh">
            <div class="mesh-container">
                {{-- Generating a 15x15 Grid (225 squares) --}}
                @for ($i = 0; $i < 225; $i++)
                    @php
                        // Grid coordinates (0-14)
                        $row = floor($i / 15);
                        $col = $i % 15;

                        // Distance from center (7, 7)
                        $dist = sqrt(pow($row - 7, 2) + pow($col - 7, 2));

                        // Delay for ripple effect
                        $delay = $dist * 0.2; 
                    @endphp
                    <div class="mesh-box" style="animation-delay: -{{ $delay }}s"></div>
                @endfor
            </div>

            <!-- Vignette -->
            <div class="mesh-vignette"></div>
        </div>

        <!-- CENTERED SPLIT CARD -->
        <div class="split-card">

            <!-- LEFT SIDE: IMAGE -->
            <div class="card-image-side">
                <div class="cinematic-overlay"></div>
                <img src="{{ asset('gavel.jpeg') }}" alt="Gavel" class="obj-cover">
                <div class="image-text">
                    <h3>Honorable Service</h3>
                    <p>Access the judicial portal with security and ease.</p>
                </div>
            </div>

            <!-- RIGHT SIDE: FORM -->
            <div class="card-form-side">
                <div class="form-header">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="form-logo">
                    <!-- Title removed if logo contains text, but keeping for accessibility/structure -->
                    <h2 class="form-title">Judge Portal</h2>
                </div>

                <x-filament-panels::form wire:submit="authenticate">
                    {{ $this->form }}

                    <x-filament-panels::form.actions :actions="$this->getCachedFormActions()"
                        :full-width="$this->hasFullWidthFormActions()" />
                </x-filament-panels::form>

                <div class="form-footer">
                    &copy; {{ date('Y') }} {{ config('app.name') }}
                </div>
            </div>

        </div>

    </div>

    <style>
        /* --- BRAND VARIABLES (EXTRACTED FROM LOGO) --- */
        :root {
            /* LUXURY GOLD PALETTE */
            --brand-gold: #D4AF37;
            /* Metallic Gold */
            --brand-gold-light: #FDB931;
            /* Bright Gold Highlight */
            --brand-gold-dark: #A08028;
            /* Deep Gold Shadow */

            /* PLATINUM/SILVER PALETTE */
            --brand-silver: #E5E4E2;

            /* BACKGROUND */
            --bg-deep: #080808;
            /* Pure Dark for contrast */
            --card-glass: rgba(20, 20, 20, 0.85);

            --text-white: #ffffff;
            --text-gold: #F4C430;
        }
        
        html,
        body {
            scrollbar-width: none;
        }

        /* --- WRAPPER --- */
        .judge-login-wrapper {
            min-height: 100vh;
            width: 100%;
            position: relative;
            background-color: var(--bg-deep);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Manrope', system-ui, sans-serif;
            padding: 2rem 1rem;
            z-index: 9999;
            perspective: 1200px;
            overflow-y: hidden;
            overflow-x: hidden;
        }

        /* --- 3D MESH ANIMATION --- */
        .background-mesh {
            position: fixed;
            inset: -50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 0;
            transform-style: preserve-3d;
        }

        .mesh-container {
            display: grid;
            grid-template-columns: repeat(15, 60px);
            grid-template-rows: repeat(15, 60px);
            gap: 15px;
            transform: rotateX(60deg) rotateZ(20deg) scale(1.2);
            transform-style: preserve-3d;
        }

        .mesh-box {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.01);
            border: 1px solid rgba(255, 215, 0, 0.1);
            /* Subtle Gold Border */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            animation: rippleWave 4s infinite ease-in-out;
        }

        @keyframes rippleWave {

            0%,
            100% {
                transform: translateZ(0);
                background: rgba(255, 255, 255, 0.01);
                border-color: rgba(255, 215, 0, 0.1);
            }

            50% {
                transform: translateZ(100px);
                /* GOLD GLOW AT PEAK */
                background: rgba(212, 175, 55, 0.2);
                border-color: var(--brand-gold-light);
                box-shadow: 0 0 40px rgba(212, 175, 55, 0.5);
            }
        }

        .mesh-vignette {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle, transparent 20%, var(--bg-deep) 80%);
            z-index: 1;
            pointer-events: none;
        }

        /* --- SPLIT CARD --- */
        .split-card {
            position: relative;
            z-index: 10;
            display: flex;
            width: 900px;
            max-width: 100%;
            min-height: 580px;
            background-color: var(--card-glass);
            border-radius: 1.5rem;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.2);
            /* Gold Border */
            box-shadow:
                0 50px 100px -20px rgba(0, 0, 0, 0.95),
                0 0 0 1px rgba(212, 175, 55, 0.1) inset;
            backdrop-filter: blur(25px);
        }

        /* --- LEFT SIDE: IMAGE --- */
        .card-image-side {
            display: none;
            width: 45%;
            position: relative;
            background-color: #000;
        }

        @media (min-width: 768px) {
            .card-image-side {
                display: block;
            }
        }

        .obj-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cinematic-overlay {
            position: absolute;
            inset: 0;
            /* Subtle Golden Warmth in the dark gradient */
            background: linear-gradient(to bottom, transparent 40%, rgba(10, 8, 0, 0.95) 100%);
            z-index: 1;
        }

        .image-text {
            position: absolute;
            bottom: 3rem;
            left: 2.5rem;
            right: 2.5rem;
            z-index: 3;
            color: white;
        }

        .image-text h3 {
            font-size: 2rem;
            font-weight: 800;
            margin: 0 0 0.8rem 0;
            color: var(--brand-gold-light);
            /* Gold Text */
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.9);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .image-text p {
            font-size: 1rem;
            opacity: 0.9;
            margin: 0;
            font-weight: 400;
            color: var(--brand-silver);
        }

        /* --- RIGHT SIDE: FORM --- */
        .card-form-side {
            width: 100%;
            padding: 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        @media (min-width: 768px) {
            .card-form-side {
                width: 55%;
            }
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-logo {
            height: 100px;
            width: auto;
            margin: 0 auto 1.5rem auto;
            display: block;
            /* Gold Glow behind logo */
            filter: drop-shadow(0 0 25px rgba(212, 175, 55, 0.3));
            animation: floatLogo 6s ease-in-out infinite;
        }

        @keyframes floatLogo {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-6px);
            }
        }

        .form-title {
            color: var(--text-white);
            font-size: 1.75rem;
            font-weight: 800;
            margin: 0;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            background: linear-gradient(to right, #D4AF37, #FDB931, #D4AF37);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: shineText 5s linear infinite;
        }

        @keyframes shineText {
            to {
                background-position: 200% center;
            }
        }

        .form-footer {
            margin-top: 2rem;
            text-align: center;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.3);
        }

        /* --- FORM STYLES --- */
        .fi-input-wrp-label,
        .fi-fo-field-wrp-label,
        label,
        label span {
            color: #E5E4E2 !important;
            /* Silver text */
            font-weight: 600 !important;
            letter-spacing: 0.02em;
        }

        .fi-input-wrp {
            background-color: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 0.5rem !important;
            /* Sharper corners for premium feel */
            transition: all 0.3s ease !important;
        }

        .fi-input-wrp:focus-within {
            border-color: var(--brand-gold) !important;
            box-shadow: 0 0 0 1px var(--brand-gold) !important;
            /* Sharp Gold Focus */
            background-color: rgba(255, 255, 255, 0.08) !important;
        }

        .fi-input {
            color: white !important;
            padding: 0.85rem !important;
        }

        /* GOLD GRADIENT BUTTON */
        .fi-btn {
            width: 100%;
            /* Luxury Gold Gradient */
            background: linear-gradient(135deg, #B8860B 0%, #FFD700 50%, #B8860B 100%) !important;
            color: #000 !important;
            /* Black text on Gold = Premium */
            font-weight: 800 !important;
            padding: 1rem !important;
            border-radius: 0.5rem !important;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-top: 2rem;
            border: none !important;
            box-shadow: 0 10px 30px -10px rgba(212, 175, 55, 0.6) !important;
            transition: all 0.3s ease !important;
            position: relative;
            z-index: 1;
        }

        .fi-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px -10px rgba(212, 175, 55, 0.8) !important;
            filter: brightness(1.1);
        }

        /* Checkbox & Link Fixes */
        .fi-checkbox-label {
            color: #aaa !important;
        }

        a {
            color: var(--brand-gold-light) !important;
            transition: 0.2s;
            text-decoration: none !important;
        }

        a:hover {
            color: #fff !important;
            text-decoration: underline !important;
        }
    </style>
</div>