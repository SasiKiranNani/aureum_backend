<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0c0c0c;
            color: #ffffff;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #1a1a1a;
            border: 1px solid #c59d5f;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .header {
            background-color: #000000;
            padding: 40px 20px;
            text-align: center;
            border-bottom: 2px solid #c59d5f;
        }

        .logo {
            width: 180px;
            height: auto;
        }

        .content {
            padding: 40px;
            text-align: center;
        }

        .welcome-text {
            font-size: 24px;
            color: #c59d5f;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .message {
            font-size: 16px;
            color: #cccccc;
            margin-bottom: 30px;
        }

        .user-name {
            color: #ffffff;
            font-weight: bold;
        }

        .action-button {
            display: inline-block;
            padding: 15px 40px;
            background: linear-gradient(135deg, #c59d5f 0%, #9e7e4a 100%);
            color: #000000 !important;
            text-decoration: none;
            font-weight: bold;
            border-radius: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(197, 157, 95, 0.3);
        }

        .footer {
            background-color: #111111;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666666;
            border-top: 1px solid #333333;
        }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #c59d5f, transparent);
            margin: 30px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 style="color: #c59d5f; margin: 0;">ORIONSM AWARDS</h1>
        </div>
        <div class="content">
            <h1 class="welcome-text">Password Reset Request</h1>
            <p class="message">
                Hello <span class="user-name">{{ $user->name }}</span>,<br><br>
                We received a request to reset your password for your <strong>ORIONSM International Tech Awards</strong>
                account.
            </p>

            <div class="divider"></div>

            <p class="message">
                If you made this request, please click the button below to set a new password. This link will expire in
                60 minutes.
            </p>

            <a href="{{ $resetUrl }}" class="action-button">Reset Password</a>

            <div class="divider"></div>

            <p class="message" style="font-size: 14px;">
                If you did not request a password reset, no further action is required. Your account remains secure.
            </p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} ORIONSM International Tech Awards. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
