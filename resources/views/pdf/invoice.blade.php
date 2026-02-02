<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE - {{ $invoice_no }}</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            font-family: 'Inter', 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #1a1a1a;
            line-height: 1.6;
            background: #ffffff;
        }

        .top-accent {
            height: 10px;
            background: linear-gradient(90deg, #1a1a1a 0%, #ca8a04 100%);
            width: 100%;
        }

        .header {
            padding: 50px 60px 30px;
            display: table;
            width: 100%;
            box-sizing: border-box;
        }

        .header-content {
            display: table-row;
        }

        .header-left,
        .header-right {
            display: table-cell;
            vertical-align: middle;
        }

        .header-right {
            text-align: right;
        }

        .brand h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 1px;
            color: #1a1a1a;
        }

        .brand span {
            color: #ca8a04;
        }

        .brand p {
            margin: 4px 0 0;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: #666;
        }

        .invoice-info h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            border-bottom: 3px solid #ca8a04;
            display: inline-block;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .invoice-meta {
            font-size: 13px;
            color: #444;
        }

        .invoice-meta strong {
            color: #1a1a1a;
            width: 95px;
            display: inline-block;
        }

        .billing-grid {
            margin: 30px 60px;
            display: table;
            width: 100%;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            padding: 25px 0;
        }

        .billing-col {
            display: table-cell;
            width: 45%;
            vertical-align: top;
        }

        .billing-spacer {
            display: table-cell;
            width: 10%;
        }

        .section-title {
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #ca8a04;
            margin-bottom: 10px;
        }

        .billing-name {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 5px;
        }

        .billing-detail {
            font-size: 12px;
            color: #555;
            line-height: 1.5;
        }

        .item-table {
            margin: 30px 60px;
            width: calc(100% - 120px);
            border-collapse: collapse;
        }

        .item-table th {
            text-align: left;
            padding: 12px 0;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #888;
            border-bottom: 2px solid #1a1a1a;
        }

        .item-table td {
            padding: 20px 0;
            border-bottom: 1px solid #f9f9f9;
            vertical-align: top;
        }

        .item-desc strong {
            display: block;
            font-size: 14px;
            color: #1a1a1a;
            margin-bottom: 4px;
        }

        .item-desc span {
            font-size: 12px;
            color: #666;
        }

        .unit-price {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a1a;
            text-align: right;
        }

        .summary-container {
            margin: 30px 60px;
            display: table;
            width: calc(100% - 120px);
        }

        .summary-spacer {
            display: table-cell;
            width: 55%;
            vertical-align: bottom;
            padding-bottom: 20px;
        }

        .summary-content {
            display: table-cell;
            width: 45%;
            vertical-align: top;
        }

        .summary-row {
            display: table;
            width: 100%;
            padding: 8px 0;
            font-size: 13px;
        }

        .summary-label {
            display: table-cell;
            color: #666;
        }

        .summary-value {
            display: table-cell;
            text-align: right;
            font-weight: 600;
            color: #1a1a1a;
        }

        .discount-row {
            border-bottom: 1px dashed #ca8a04;
            margin-bottom: 10px;
            padding-bottom: 10px;
        }

        .discount-row .summary-label {
            color: #ca8a04;
            font-weight: 700;
        }

        .discount-row .summary-value {
            color: #ca8a04;
        }

        .grand-total-box {
            background: #1a1a1a;
            color: #ffffff;
            margin-top: 15px;
            padding: 15px;
        }

        .grand-total-box .summary-label {
            color: #ca8a04;
            font-weight: 800;
            font-size: 14px;
        }

        .grand-total-box .summary-value {
            color: #ffffff;
            font-size: 22px;
            font-weight: 800;
        }

        .inr-equivalent {
            margin-top: 10px;
            text-align: right;
            font-size: 11px;
            color: #999;
            font-style: italic;
        }

        .signature-area {
            margin-top: 25px;
            text-align: right;
        }

        .verified-seal {
            display: inline-block;
            border: 2px solid #ca8a04;
            color: #ca8a04;
            padding: 8px 18px;
            font-weight: 900;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 2px;
            transform: rotate(-3deg);
            opacity: 0.8;
        }

        .footer {
            margin: 60px 60px 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            text-align: center;
        }

        .footer p {
            font-size: 10px;
            color: #aaa;
            margin: 3px 0;
        }
    </style>
</head>

<body>
    <div class="top-accent"></div>

    <div class="header">
        <div class="header-content">
            <div class="header-left">
                <div class="brand">
                    <h1>ORION<span>SM</span></h1>
                    <p>Excellence Recognized</p>
                </div>
            </div>
            <div class="header-right">
                <div class="invoice-info">
                    <h2>{{ $is_itr ? 'ITR FILING INVOICE' : 'TAX INVOICE' }}</h2>
                    <div class="invoice-meta">
                        <div><strong>Invoice No:</strong> {{ $invoice_no }}</div>
                        <div><strong>Issue Date:</strong> {{ $payment_date }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="billing-grid">
        <div class="billing-col">
            <div class="section-title">Billed To</div>
            <div class="billing-name">{{ $nomination->full_name }}</div>
            <div class="billing-detail">
                @if ($nomination->organization)
                    {{ $nomination->organization }}<br>
                @endif
                {{ $nomination->email }} | {{ $nomination->phone }}<br>
                {{ $nomination->address }}, {{ $nomination->country }}
            </div>
        </div>
        <div class="billing-spacer"></div>
        <div class="billing-col">
            <div class="section-title">Payment Details</div>
            <div class="billing-detail">
                <strong>Method:</strong> {{ strtoupper($nomination->payment_method) }}<br>
                <strong>Transaction ID:</strong> {{ $payment->transaction_id }}<br>
                <strong>App ID:</strong> {{ $nomination->application_id }}
            </div>
        </div>
    </div>

    <table class="item-table">
        <thead>
            <tr>
                <th style="width: 75%;">Description of Service</th>
                <th style="width: 25%; text-align: right;">Amount (USD)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="item-desc">
                    <strong>{{ $nomination->award->name }} Nomination</strong>
                    <span>Category: {{ $nomination->category->name }}</span>
                </td>
                <td class="unit-price">${{ number_format($nomination->award->amount, 2) }}</td>
            </tr>
            <tr>
                <td class="item-desc">
                    <strong>Administrative Processing</strong>
                    <span>Standard global verification & logistics fee.</span>
                </td>
                <td class="unit-price">${{ number_format($nomination->admin_fee, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="summary-container">
        <div class="summary-spacer">
            <div class="verified-seal">Payment Confirmed</div>
        </div>
        <div class="summary-content">
            @if ($coupon_discount > 0)
                <div class="summary-row">
                    <div class="summary-label">
                        Discount
                        @if ($nomination->discount)
                            ({{ $nomination->discount->code }})
                        @endif
                    </div>
                    <div class="summary-value">-${{ number_format($coupon_discount, 2) }}</div>
                </div>
            @endif

            @if ($gateway_discount > 0)
                <div class="summary-row" style="color: #ca8a04; font-weight: 600;">
                    <div class="summary-label">Gateway Discount</div>
                    <div class="summary-value">-${{ number_format($gateway_discount, 2) }}</div>
                </div>
            @endif

            <div class="grand-total-box">
                <div class="summary-row" style="padding: 0;">
                    <div class="summary-label">Grand Total</div>
                    <div class="summary-value">${{ number_format($total, 2) }}</div>
                </div>
            </div>

            @if ($payment->amount_inr)
                <div class="inr-equivalent">
                    Approximate: ₹{{ number_format($payment->amount_inr, 2) }} INR
                </div>
            @endif
        </div>
    </div>

    <div class="footer">
        <p>This is a computer-generated document issued by ORIONSM International Tech Awards Secretariat.</p>
        <p>ORIONSM International Tech Awards &copy; {{ date('Y') }} | excellence@orionsm.com | www.orionsm.com</p>
        <p>Security Hash: {{ substr(md5($invoice_no . $payment->transaction_id), 0, 16) }}</p>
    </div>
</body>

</html>
