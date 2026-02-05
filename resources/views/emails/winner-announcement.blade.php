<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap');

        body {
            font-family: 'Outfit', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #020617;
            margin: 0;
            padding: 0;
            color: #ffffff;
        }

        .wrapper {
            width: 100%;
            background-color: #020617;
            padding: 50px 0;
        }

        .container {
            max-width: 720px;
            /* Precise 720px wide */
            margin: 0 auto;
            background-color: #0f172a;
            border-radius: 20px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.1);
            overflow: hidden;
            text-align: center;
            /* Ensures global alignment */
        }

        .header {
            padding: 40px 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .logo-img {
            width: 280px;
            /* Large premium logo */
            height: auto;
        }

        .content {
            padding: 40px 60px;
            /* Compact height */
        }

        .status-badge {
            display: inline-block;
            padding: 6px 16px;
            background: rgba(251, 191, 36, 0.1);
            border: 1px solid rgba(251, 191, 36, 0.3);
            border-radius: 50px;
            color: #fbbf24;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 25px;
        }

        .congrats-text {
            font-size: 24px;
            font-weight: 300;
            color: #94a3b8;
            margin: 0;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .winner-name {
            font-size: 48px;
            font-weight: 800;
            color: #ffffff;
            margin: 5px 0 30px;
            letter-spacing: -1.5px;
            line-height: 1;
        }

        .message-intro {
            font-size: 17px;
            line-height: 1.6;
            color: #94a3b8;
            max-width: 500px;
            margin: 0 auto 40px;
        }

        .award-gold-card {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            border: 1px solid rgba(251, 191, 36, 0.2);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 40px;
            display: table;
            width: 100%;
            box-sizing: border-box;
            text-align: left;
            /* Left alignment inside card */
        }

        .card-left {
            display: table-cell;
            vertical-align: middle;
        }

        .card-right {
            display: table-cell;
            vertical-align: middle;
            text-align: right;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .badge-display {
            color: #fbbf24;
            font-size: 28px;
            font-weight: 800;
            margin: 0;
            letter-spacing: 0.5px;
        }

        .category-display {
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 4px;
            display: block;
        }

        .cta-wrap {
            margin-bottom: 20px;
        }

        .premium-btn {
            display: inline-block;
            padding: 18px 45px;
            background: #ffffff;
            color: #0f172a !important;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 800;
            font-size: 15px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .footer {
            padding: 40px;
            background-color: #020617;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-logo {
            font-weight: 800;
            font-size: 18px;
            letter-spacing: 4px;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .footer-tag {
            color: #475569;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
                border-radius: 0;
            }

            .content {
                padding: 40px 25px;
            }

            .winner-name {
                font-size: 34px;
            }

            .award-gold-card {
                display: block;
            }

            .card-left,
            .card-right {
                display: block;
                text-align: center;
            }

            .card-right {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <!-- Large centered logo -->
                <img src="{{ $message->embed(public_path('logo.png')) }}" alt="ORIONSM Logo" class="logo-img">
            </div>

            <div class="content">
                <span class="status-badge">Official Result</span>

                <p class="congrats-text">Congratulations</p>
                <h1 class="winner-name">{{ $nomination->full_name }}</h1>

                <p class="message-intro">
                    We are honored to recognize your extraordinary contribution to the global tech ecosystem. This award
                    stands as a testament to your innovation and pursuit of excellence.
                </p>

                <div class="award-gold-card">
                    <div class="card-left">
                        <h2 class="badge-display">{{ $nomination->badge_name }}</h2>
                        <span class="category-display">{{ $nomination->category->name }}</span>
                    </div>
                    <div class="card-right">
                        #{{ $nomination->application_id }}
                    </div>
                </div>

                <div class="cta-wrap">
                    <a href="{{ url('/past-winners') }}" class="premium-btn">View Hall of Fame</a>
                </div>

                <p
                    style="margin-top: 30px; color: #475569; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                    Best regards, The ORIONSM Committee
                </p>
            </div>

            <div class="footer">
                <div class="footer-logo">ORIONSM</div>
                <div class="footer-tag">Recognizing Excellence Worldwide</div>
                <p style="color: rgba(255,255,255,0.1); font-size: 9px; margin-top: 30px; letter-spacing: 1px;">
                    &copy; {{ date('Y') }} ORIONSM. SECURE OFFICIAL COMMUNICATION.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
