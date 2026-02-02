<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #ca8a04;
            margin: 0;
            font-size: 24px;
            letter-spacing: 5px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: #0f172a;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #666;
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>ORIONSM</h1>
            <p>Excellence Recognized Worldwide</p>
        </div>

        <p>Dear {{ $nomination->full_name }},</p>

        <p>Thank you for your payment for the nomination <strong>{{ $nomination->application_id }}</strong>.</p>

        <p>We are pleased to confirm that your transaction was successful. Please find your official tax invoice
            attached to this email for your records.</p>

        <p><strong>Nomination Details:</strong><br>
            Application ID: {{ $nomination->application_id }}<br>
            Award: {{ $nomination->award->name }}<br>
            Amount Paid: {{ number_format($payment->amount_usd, 2) }} USD
        </p>

        <p>If you have any questions regarding your nomination or payment, please feel free to contact our support team.
        </p>

        <p>Best regards,<br>
            <strong>The ORIONSM International Tech Awards Team</strong>
        </p>

        <div class="footer">
            <p>&copy; {{ date('Y') }} ORIONSM International Tech Awards. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
