@extends('layouts.frontend.index')

@section('contents')
    <!-- Judge Details Section -->
    <section class="judge-details-section">
        <div class="hero-background-effects">
            <div class="gradient-orb orb-1"></div>
            <div class="gradient-orb orb-2"></div>
            <div class="gradient-orb orb-3"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="container">
            <div class="judge-details-wrapper">
                <!-- Left Side - Image -->
                <div class="judge-image-column">
                    <div class="image-container">
                        <div class="image-border-glow"></div>
                        <div class="image-inner">
                            <img src="{{ $judgeData->image ? asset('storage/' . $judgeData->image) : asset('divya-images/about.jpg') }}"
                                alt="{{ $judgeData->name }}" class="judge-main-image">
                            <div class="image-overlay-gradient"></div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Content -->
                <div class="judge-content-column">
                    <!-- Name Section -->
                    <div class="name-section">
                        <h1 class="judge-name-title">{{ $judgeData->name }}</h1>
                        <div class="title-decoration">
                            <span class="decoration-dot"></span>
                            <span class="decoration-line"></span>
                            <span class="decoration-dot"></span>
                        </div>
                    </div>

                    <!-- Category and LinkedIn -->
                    <div class="meta-section">
                        <div class="category-tag">
                            <div class="tag-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <span class="tag-text">{{ $judgeData->title }}</span>
                        </div>

                        @if (isset($judgeData->linkedin) && $judgeData->linkedin)
                            <a href="{{ $judgeData->linkedin }}" target="_blank" class="linkedin-btn">
                                <span class="btn-icon">
                                    <i class="fab fa-linkedin"></i>
                                </span>
                                <span class="btn-text">Connect on LinkedIn</span>
                                <span class="btn-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </a>
                        @endif
                    </div>

                    <!-- Biography Section -->
                    <div class="bio-section">
                        <div class="bio-header">
                            <h2 class="bio-heading">
                                <span class="heading-icon">
                                    <i class="fas fa-user-tie"></i>
                                </span>
                                Professional Biography
                            </h2>
                            <div class="heading-underline"></div>
                        </div>

                        <div class="bio-content-card">
                            <div class="card-glow"></div>
                            <div class="bio-text">
                                {!! $judgeData->bio !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Main Section */
        .judge-details-section {
            background: #0a0a0f;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
            min-height: 100vh;
        }

        .hero-background-effects {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .gradient-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.25;
            animation: float 25s infinite ease-in-out;
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, #ff6b00 0%, transparent 70%);
            top: -150px;
            left: -150px;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, #00adb5 0%, transparent 70%);
            bottom: -200px;
            right: -200px;
            animation-delay: 8s;
        }

        .orb-3 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #ff6b00 0%, transparent 70%);
            top: 40%;
            right: 5%;
            animation-delay: 16s;
        }

        .grid-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(255, 107, 0, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 107, 0, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            opacity: 0.3;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) scale(1) rotate(0deg);
            }

            33% {
                transform: translate(40px, -40px) scale(1.15) rotate(120deg);
            }

            66% {
                transform: translate(-30px, 30px) scale(0.85) rotate(240deg);
            }
        }

        .judge-details-wrapper {
            display: grid;
            grid-template-columns: 480px 1fr;
            gap: 100px;
            position: relative;
            z-index: 2;
            align-items: start;
        }

        /* Left Column - Image */
        .judge-image-column {
            position: sticky;
            top: 80px;
            height: fit-content;
        }

        .image-container {
            position: relative;
            padding: 8px;
        }

        .image-border-glow {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #ff6b00, #00adb5, #ff6b00);
            border-radius: 35px;
            opacity: 0.6;
            filter: blur(20px);
            animation: rotate-gradient 8s linear infinite;
        }

        @keyframes rotate-gradient {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .image-inner {
            position: relative;
            border-radius: 30px;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(255, 107, 0, 0.1), rgba(0, 173, 181, 0.1));
            box-shadow:
                0 0 0 1px rgba(255, 255, 255, 0.1),
                0 40px 100px rgba(0, 0, 0, 0.6);
        }

        .judge-main-image {
            width: 100%;
            height: 600px;
            object-fit: cover;
            display: block;
            position: relative;
            z-index: 1;
        }

        .image-overlay-gradient {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(to top, rgba(10, 10, 15, 0.8) 0%, transparent 100%);
            pointer-events: none;
        }

        /* Right Column - Content */
        .judge-content-column {
            color: #fff;
        }

        /* Name Section */
        .name-section {
            margin-bottom: 40px;
        }

        .judge-name-title {
            font-size: 72px;
            font-weight: 900;
            line-height: 1;
            margin: 0 0 20px 0;
            background: linear-gradient(135deg, #ffffff 0%, #ff6b00 50%, #00adb5 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -2px;
            position: relative;
        }

        .title-decoration {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 20px;
        }

        .decoration-dot {
            width: 8px;
            height: 8px;
            background: linear-gradient(135deg, #ff6b00, #ff8c00);
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(255, 107, 0, 0.6);
        }

        .decoration-line {
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg, #ff6b00 0%, transparent 100%);
        }

        /* Meta Section */
        .meta-section {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 60px;
            flex-wrap: wrap;
        }

        .category-tag {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, rgba(255, 107, 0, 0.15) 0%, rgba(255, 140, 0, 0.15) 100%);
            border: 1.5px solid rgba(255, 107, 0, 0.4);
            padding: 14px 28px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            backdrop-filter: blur(20px);
            box-shadow:
                0 8px 32px rgba(255, 107, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .category-tag:hover {
            transform: translateY(-2px);
            box-shadow:
                0 12px 40px rgba(255, 107, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.15);
        }

        .tag-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, #ff6b00, #ff8c00);
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(255, 107, 0, 0.4);
        }

        .tag-icon i {
            font-size: 14px;
            color: #fff;
        }

        .tag-text {
            color: #fff;
        }

        .linkedin-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 14px 28px;
            background: linear-gradient(135deg, rgba(0, 119, 181, 0.15) 0%, rgba(0, 119, 181, 0.25) 100%);
            border: 1.5px solid rgba(0, 119, 181, 0.4);
            border-radius: 50px;
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.5px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
            box-shadow:
                0 8px 32px rgba(0, 119, 181, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .linkedin-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transition: left 0.6s;
        }

        .linkedin-btn:hover::before {
            left: 100%;
        }

        .linkedin-btn:hover {
            background: linear-gradient(135deg, #0077b5 0%, #005885 100%);
            border-color: #0077b5;
            transform: translateY(-2px);
            box-shadow:
                0 15px 45px rgba(0, 119, 181, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }

        .btn-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
        }

        .btn-icon i {
            font-size: 16px;
        }

        .btn-arrow {
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .linkedin-btn:hover .btn-arrow {
            transform: translateX(5px);
        }

        /* Biography Section */
        .bio-section {
            margin-top: 60px;
        }

        .bio-header {
            margin-bottom: 40px;
        }

        .bio-heading {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 42px;
            font-weight: 800;
            color: #fff;
            margin: 0 0 20px 0;
            line-height: 1.2;
        }

        .heading-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            flex-shrink: 0;
            background: linear-gradient(135deg, rgba(255, 107, 0, 0.2), rgba(255, 140, 0, 0.2));
            border: 2px solid rgba(255, 107, 0, 0.5);
            border-radius: 50%;
            color: #ff6b00;
            /* backdrop-filter: blur(10px); */
        }

        .heading-icon i {
            font-size: 22px;
        }

        .heading-underline {
            width: 120px;
            height: 4px;
            background: linear-gradient(90deg, #ff6b00 0%, transparent 100%);
            border-radius: 2px;
        }

        .bio-content-card {
            position: relative;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.01) 100%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 30px;
            padding: 55px;
            backdrop-filter: blur(30px);
            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            overflow: hidden;
        }

        .bio-content-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, rgba(255, 107, 0, 0.6) 50%, transparent 100%);
        }

        .card-glow {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 107, 0, 0.08) 0%, transparent 60%);
            pointer-events: none;
            animation: glow-rotate 15s linear infinite;
        }

        @keyframes glow-rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .bio-text {
            font-size: 18px;
            line-height: 2;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 400;
            position: relative;
            z-index: 1;
        }

        .bio-text p {
            margin-bottom: 28px;
        }

        .bio-text p:last-child {
            margin-bottom: 0;
        }

        .bio-text strong {
            color: #ff6b00;
            font-weight: 700;
        }

        .bio-text a {
            color: #ff6b00;
            text-decoration: none;
            border-bottom: 1px solid rgba(255, 107, 0, 0.4);
            transition: all 0.3s ease;
        }

        .bio-text a:hover {
            color: #ff8c00;
            border-bottom-color: #ff8c00;
        }

        /* Link styling for cards */
        .judge-card-link {
            text-decoration: none;
            color: inherit;
            display: block;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .judge-card-link:hover {
            transform: translateY(-10px);
        }

        .judge-card-link:hover .judge-card {
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
        }

        /* Responsive Design */
        @media (max-width: 1400px) {
            .judge-details-wrapper {
                grid-template-columns: 420px 1fr;
                gap: 80px;
            }

            .judge-main-image {
                height: 550px;
            }

            .judge-name-title {
                font-size: 64px;
            }
        }

        @media (max-width: 1200px) {
            .judge-details-wrapper {
                grid-template-columns: 380px 1fr;
                gap: 60px;
            }

            .judge-main-image {
                height: 500px;
            }

            .judge-name-title {
                font-size: 56px;
            }
        }

        @media (max-width: 992px) {
            .judge-details-wrapper {
                grid-template-columns: 1fr;
                gap: 60px;
            }

            .judge-image-column {
                position: relative;
                top: 0;
                max-width: 550px;
                margin: 0 auto;
            }

            .judge-name-title {
                font-size: 52px;
                text-align: center;
            }

            .name-section {
                text-align: center;
            }

            .title-decoration {
                justify-content: center;
            }

            .meta-section {
                justify-content: center;
            }

            .bio-header {
                text-align: center;
            }

            .bio-content-card {
                padding: 50px;
            }
        }

        @media (max-width: 768px) {
            .judge-details-section {
                padding: 70px 0;
            }

            .judge-main-image {
                height: 450px;
            }

            .judge-name-title {
                font-size: 44px;
                letter-spacing: -1px;
            }

            .category-tag {
                font-size: 12px;
                padding: 12px 22px;
            }

            .linkedin-btn {
                font-size: 13px;
                padding: 12px 24px;
            }

            .bio-content-card {
                padding: 40px;
            }

            .bio-heading {
                font-size: 36px;
            }

            .bio-text {
                font-size: 17px;
                line-height: 1.85;
            }
        }

        @media (max-width: 576px) {
            .judge-details-section {
                padding: 50px 0;
            }

            .judge-details-wrapper {
                gap: 50px;
            }

            .judge-image-column {
                max-width: 100%;
            }

            .judge-main-image {
                height: 380px;
            }

            .judge-name-title {
                font-size: 36px;
                margin-bottom: 15px;
            }

            .meta-section {
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .category-tag,
            .linkedin-btn {
                justify-content: center;
                width: 100%;
            }

            .category-tag {
                font-size: 11px;
                padding: 10px 20px;
            }

            .linkedin-btn {
                font-size: 12px;
                padding: 12px 24px;
            }

            .header-badge {
                font-size: 14px;
                padding: 10px 20px;
            }

            .bio-heading {
                font-size: 28px;
                gap: 12px;
            }

            .heading-icon {
                width: 40px;
                height: 40px;
            }

            .heading-icon i {
                font-size: 18px;
            }

            .bio-content-card {
                padding: 30px 25px;
                border-radius: 25px;
            }

            .bio-text {
                font-size: 16px;
                line-height: 1.75;
            }

            .bio-text p {
                margin-bottom: 22px;
            }
        }
    </style>
@endsection
