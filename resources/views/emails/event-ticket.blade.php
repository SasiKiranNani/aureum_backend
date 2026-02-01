<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Your Event Ticket</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #FFD700 0%, #FF6B00 100%);
            padding: 40px 20px;
            text-align: center;
            color: #ffffff;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .content {
            padding: 30px;
            color: #333333;
            line-height: 1.6;
        }

        .event-info {
            background: #f9f9f9;
            border-left: 4px solid #FFD700;
            padding: 20px;
            margin: 20px 0;
        }

        .event-info h2 {
            margin-top: 0;
            color: #FF6B00;
        }

        .ticket-footer {
            background: #222222;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }

        .ticket-number {
            font-size: 20px;
            font-weight: bold;
            color: #FFD700;
            margin-top: 10px;
        }

        .button {
            display: inline-block;
            padding: 12px 30px;
            background: #FF6B00;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>AUREUM AWARDS</h1>
            <p>Your Event Registration is Confirmed!</p>
        </div>
        <div class="content">
            <p>Hi {{ $booking->user->name }},</p>
            <p>Thank you for booking your spot for our upcoming event. We are thrilled to have you with us!</p>

            <div class="event-info">
                <h2>{{ $booking->event->title }}</h2>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($booking->event->event_date)->format('D, M d, Y') }}
                </p>
                <p><strong>Location:</strong> {{ $booking->event->location }}</p>
                <p><strong>Price Paid:</strong> ${{ number_format($booking->amount, 2) }}</p>
            </div>

            <p>Please keep this ticket handy for entry. Your unique ticket number is:</p>
            <div class="ticket-number">{{ $booking->ticket_number }}</div>

            <center>
                <a href="{{ route('home') }}" class="button">Visit Our Website</a>
            </center>
        </div>
        <div class="ticket-footer">
            <p>&copy; {{ date('Y') }} Aureum Awards. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
