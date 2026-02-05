<div>
    <div class="admin-login-wrapper">

        <!-- ANIMATED BACKGROUND: HYPER-ACTIVE DATA COMMAND CENTER -->
        <div class="background-hyper">

            <!-- 1. FAST MOVING GRID -->
            <div class="grid-floor"></div>
            <div class="grid-ceiling"></div>

            <!-- 2. RISING DATA PILLARS (The "City Lights" effect) -->
            <div class="data-pillars">
                @for ($i = 0; $i < 30; $i++)
                    @php
                        $left = rand(0, 100);
                        $delay = rand(-5, 0);
                        $duration = rand(2, 5);
                        $height = rand(100, 300);
                    @endphp
                    <div class="pillar" style="
                            left: {{ $left }}%; 
                            height: {{ $height }}px;
                            animation-duration: {{ $duration }}s; 
                            animation-delay: {{ $delay }}s;">
                    </div>
                @endfor
            </div>

            <!-- 3. ROTATING HORIZON RINGS (Constant Motion) -->
            <div class="horizon-ring ring-outer"></div>
            <div class="horizon-ring ring-inner"></div>

            <!-- 4. ACTIVE SCANLINES -->
            <div class="scanline-horizontal"></div>
            <div class="scanline-vertical"></div>

            <!-- 5. PARTICLE STORM -->
            <div class="particle-storm">
                @for ($i = 0; $i < 50; $i++)
                    @php
                        $top = rand(0, 100);
                        $left = rand(0, 100);
                        $delay = rand(-10, 0);
                        $anim = rand(0, 1) ? 'floatRight' : 'floatLeft';
                    @endphp
                    <div class="storm-particle" style="
                            top: {{ $top }}%; left: {{ $left }}%;
                            animation-name: {{ $anim }};
                            animation-delay: {{ $delay }}s;">
                    </div>
                @endfor
            </div>

            <!-- Horizon Flash -->
            <div class="horizon-flash"></div>
        </div>

        <!-- CENTERED SPLIT CARD -->
        <div class="split-card">

            <!-- LEFT SIDE: IMAGE -->
            <div class="card-image-side">
                <div class="cinematic-overlay"></div>
                <img src="{{ asset('admin.png') }}" alt="System Admin" class="obj-cover">
                <div class="image-text">
                    <h3>Command Center</h3>
                    <p>Secure system administration and oversight.</p>
                </div>
            </div>

            <!-- RIGHT SIDE: FORM -->
            <div class="card-form-side">
                <div class="form-header">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="form-logo">
                    <h2 class="form-title">Admin Portal</h2>
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
        /* --- BRAND VARIABLES --- */
        :root {
            --brand-gold: #D4AF37;
            --brand-gold-bright: #FFD700;
            --bg-deep: #020202;
            --card-glass: rgba(10, 10, 15, 0.85);
            --text-white: #ffffff;
        }

        html,
        body {
            background-color: var(--bg-deep);
            scrollbar-width: none;
            margin: 0;
            padding: 0;
            overflow: visible;
        }

        /* --- WRAPPER --- */
        .admin-login-wrapper {
            min-height: 100vh;
            width: 100%;
            position: relative;
            background-color: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Manrope', system-ui, sans-serif;
            padding: 2rem 1rem;
            z-index: 9999;
        }

        /* --- HYPER ANIMATION --- */
        .background-hyper {
            position: fixed;
            inset: 0;
            background: #000;
            perspective: 800px;
            z-index: 0;
            overflow: hidden;
        }

        /* 1. FAST GRID */
        .grid-floor,
        .grid-ceiling {
            position: absolute;
            left: -50%;
            width: 200%;
            height: 100vh;
            background-image:
                linear-gradient(90deg, transparent 0%, transparent 48%, rgba(212, 175, 55, 0.4) 50%, transparent 52%, transparent 100%),
                linear-gradient(0deg, transparent 0%, transparent 48%, rgba(212, 175, 55, 0.4) 50%, transparent 52%, transparent 100%);
            background-size: 80px 80px;
            transform-style: preserve-3d;
        }

        .grid-floor {
            bottom: -50vh;
            transform: rotateX(75deg);
            background-size: 80px 80px;
            animation: moveGrid 1.5s linear infinite;
            /* FAST SPEED */
            mask-image: linear-gradient(to top, rgba(0, 0, 0, 1) 20%, rgba(0, 0, 0, 0) 100%);
            -webkit-mask-image: linear-gradient(to top, rgba(0, 0, 0, 1) 20%, rgba(0, 0, 0, 0) 100%);
        }

        .grid-ceiling {
            top: -50vh;
            transform: rotateX(-75deg);
            animation: moveGrid 1.5s linear infinite;
            mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 1) 20%, rgba(0, 0, 0, 0) 100%);
            -webkit-mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 1) 20%, rgba(0, 0, 0, 0) 100%);
            opacity: 0.3;
        }

        @keyframes moveGrid {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 0 80px;
            }
        }

        /* 2. RISING PILLARS */
        .data-pillars {
            position: absolute;
            inset: 0;
            transform-style: preserve-3d;
            transform: perspective(600px) rotateX(20deg);
        }

        .pillar {
            position: absolute;
            bottom: -100px;
            width: 4px;
            background: linear-gradient(to top, var(--brand-gold-bright), transparent);
            box-shadow: 0 0 10px var(--brand-gold);
            opacity: 0.6;
            animation: risePillar linear infinite;
        }

        @keyframes risePillar {
            0% {
                transform: translateY(100vh) scaleY(0);
                opacity: 0;
            }

            20% {
                opacity: 1;
            }

            100% {
                transform: translateY(-50vh) scaleY(2);
                opacity: 0;
            }
        }

        /* 3. HORIZON RINGS */
        .horizon-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotateX(75deg);
            border: 2px dashed rgba(255, 215, 0, 0.4);
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.2);
            z-index: 0;
        }

        .ring-outer {
            width: 150vw;
            height: 150vw;
            animation: spinRing 40s linear infinite;
        }

        .ring-inner {
            width: 100vw;
            height: 100vw;
            border-style: solid;
            border-width: 1px;
            border-color: rgba(255, 215, 0, 0.2);
            animation: spinRing 25s linear infinite reverse;
        }

        @keyframes spinRing {
            from {
                transform: translate(-50%, -50%) rotateX(75deg) rotateZ(0deg);
            }

            to {
                transform: translate(-50%, -50%) rotateX(75deg) rotateZ(360deg);
            }
        }

        /* 4. SCANLINES */
        .scanline-horizontal {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: rgba(255, 255, 255, 0.3);
            animation: scanY 3s linear infinite;
            z-index: 2;
        }

        @keyframes scanY {
            0% {
                top: -10%;
                opacity: 0;
            }

            50% {
                opacity: 0.5;
            }

            100% {
                top: 110%;
                opacity: 0;
            }
        }

        /* 5. PARTICLE STORM */
        .storm-particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #FFD700;
            box-shadow: 0 0 5px #FFD700;
            border-radius: 50%;
            animation-duration: 5s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes floatRight {
            0% {
                transform: translateX(-10vw);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: translateX(110vw);
                opacity: 0;
            }
        }

        @keyframes floatLeft {
            0% {
                transform: translateX(110vw);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: translateX(-10vw);
                opacity: 0;
            }
        }

        .horizon-flash {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 2px;
            background: #FFD700;
            box-shadow: 0 0 60px 20px rgba(255, 215, 0, 0.6);
            z-index: 1;
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
            border: 1px solid rgba(212, 175, 55, 0.4);
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
            /* Gold Tint Gradient */
            background: linear-gradient(to bottom, #f5d689 40%, rgba(10, 8, 0, 0.95) 100%);
            z-index: 1;
            opacity: 0.3;
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
            color: var(--brand-gold-bright);
            text-shadow: 0 0 20px rgba(212, 175, 55, 0.5);
            /* Glowing Text */
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .image-text p {
            font-size: 1rem;
            opacity: 0.9;
            margin: 0;
            font-weight: 400;
            color: #E5E4E2;
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
            background: linear-gradient(to right, #D4AF37, #FFD700, #D4AF37);
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
            color: rgba(255, 255, 255, 0.5);
        }

        /* --- FORM STYLES --- */
        .fi-input-wrp-label,
        .fi-fo-field-wrp-label,
        label,
        label span {
            color: #E5E4E2 !important;
            font-weight: 600 !important;
            letter-spacing: 0.02em;
        }

        .fi-input-wrp {
            background-color: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 0.5rem !important;
            transition: all 0.3s ease !important;
        }

        .fi-input-wrp:focus-within {
            border-color: var(--brand-gold) !important;
            box-shadow: 0 0 0 1px var(--brand-gold) !important;
            background-color: rgba(255, 255, 255, 0.1) !important;
        }

        .fi-input {
            color: white !important;
            padding: 0.85rem !important;
        }

        /* GOLD GRADIENT BUTTON */
        .fi-btn {
            width: 100%;
            background: linear-gradient(135deg, #B8860B 0%, #FFD700 50%, #B8860B 100%) !important;
            color: #000 !important;
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
            color: var(--brand-gold) !important;
            transition: 0.2s;
            text-decoration: none !important;
        }

        a:hover {
            color: #fff !important;
            text-decoration: underline !important;
        }
    </style>
</div>