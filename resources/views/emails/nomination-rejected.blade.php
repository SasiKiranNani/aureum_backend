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
            background-color: #0d1117;
            /* Slate dark */
            border-radius: 20px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(148, 163, 184, 0.08);
            overflow: hidden;
        }

        .header {
            padding: 40px 20px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
        }

        .logo-img {
            width: 250px;
            /* Large branding */
            height: auto;
        }

        .content {
            padding: 40px 60px;
            /* Reduced vertical padding for compact height */
        }

        .status-pill {
            display: inline-block;
            padding: 6px 14px;
            background: rgba(148, 163, 184, 0.05);
            border: 1px solid rgba(148, 163, 184, 0.1);
            border-radius: 50px;
            color: #94a3b8;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 30px;
            text-align: center;
        }

        .centered-wrap {
            text-align: center;
            margin-bottom: 40px;
        }

        .title-text {
            font-size: 32px;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .greeting {
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 15px;
        }

        .body-text {
            font-size: 15px;
            line-height: 1.8;
            color: #94a3b8;
            margin-bottom: 30px;
        }

        .context-box {
            background-color: rgba(255, 255, 255, 0.02);
            border-radius: 14px;
            padding: 25px 35px;
            margin: 30px 0;
            border: 1px solid rgba(148, 163, 184, 0.05);
            display: table;
            width: 100%;
            box-sizing: border-box;
        }

        .context-item {
            display: table-cell;
            vertical-align: middle;
        }

        .item-label {
            color: #475569;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            display: block;
            margin-bottom: 4px;
        }

        .item-value {
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 700;
        }

        .closing-signature {
            border-top: 1px solid rgba(255, 255, 255, 0.03);
            padding-top: 30px;
            margin-top: 40px;
            color: #64748b;
            font-size: 14px;
        }

        .footer {
            padding: 40px;
            background-color: #020617;
            text-align: center;
        }

        .footer-brand {
            font-weight: 800;
            font-size: 18px;
            letter-spacing: 3px;
            color: #ffffff;
            margin-bottom: 15px;
        }

        .footer-tagline {
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
                padding: 40px 30px;
            }

            .title-text {
                font-size: 26px;
            }

            .context-box {
                display: block;
                padding: 20px;
            }

            .context-item {
                display: block;
                margin-bottom: 15px;
            }

            .context-item:last-child {
                margin-bottom: 0;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <img src="{{ $message->embed(public_path('logo.png')) }}" alt="ORIONSM Logo" class="logo-img">
            </div>

            <div class="content">
                <div class="centered-wrap">
                    <span class="status-pill">Official Update</span>
                    <h1 class="title-text">Nomination Correspondence</h1>
                </div>

                <div class="greeting">Dear {{ $nomination->full_name }},</div>

                <p class="body-text">
                    We wish to express our appreciation for your participation in the ORIONSM International Tech Awards.
                    The quality of submissions this season was truly exceptional.
                </p>

                <p class="body-text">
                    After a comprehensive evaluation, your nomination has not been selected for an award on this
                    occasion. Our selection process remains highly competitive, reflecting the excellence inherent in
                    our community.
                </p>

                <div class="context-box">
                    <div class="context-item">
                        <span class="item-label">Application ID</span>
                        <span class="item-value">#{{ $nomination->application_id }}</span>
                    </div>
                    <div class="context-item">
                        <span class="item-label">Subject Domain</span>
                        <span class="item-value">{{ $nomination->category->name }}</span>
                    </div>
                </div>

                <p class="body-text">
                    We encourage you to maintain your pursuit of innovation and hope to see your continued impact in
                    future seasons.
                </p>

                <div class="closing-signature">
                    <p style="margin: 0;">Sincerely,</p>
                    <p style="margin: 5px 0 0; font-weight: 700; color: #ffffff;">The ORIONSM Selection Committee</p>
                </div>
            </div>

            <div class="footer">
                <div class="footer-brand">ORIONSM</div>
                <div class="footer-tagline">Excellence Recognized Worldwide</div>
            </div>
        </div>
    </div>
</body>

</html>
