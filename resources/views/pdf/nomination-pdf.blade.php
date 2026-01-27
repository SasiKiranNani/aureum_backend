<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUREUM INSTITUTIONAL RECORD - {{ $nomination->application_id }}</title>
    <style>
        /* PDF Engine Configuration */
        /*
           ABSOLUTE SAFETY MARGINS
           Increased to 5.2cm to guarantee header clearance.
        */
        @page {
            margin-top: 5.2cm;
            margin-bottom: 2.5cm;
            margin-left: 0cm;
            margin-right: 0cm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #1e293b;
            line-height: 1.5;
        }

        /*
           STRUCTURAL SIDEBAR
        */
        .sidebar-master {
            position: fixed;
            left: 0;
            top: -5.2cm;
            bottom: -2.5cm;
            width: 70px;
            background: #0f172a;
            z-index: 100;
        }

        .gold-leaf-accent {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #ca8a04, #fde047, #ca8a04);
        }

        .sidebar-brand {
            position: absolute;
            left: 50%;
            bottom: 80px;
            transform: translateX(-50%) rotate(-90deg);
            transform-origin: center center;
            white-space: nowrap;
            color: rgba(253, 224, 71, 0.5);
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 12px;
            text-transform: uppercase;
        }

        /*
           HEADER FRAME
           Positioned in the negative margin space.
        */
        .header-frame {
            position: fixed;
            top: -5.2cm;
            left: 70px;
            right: 0;
            height: 5.2cm;
            /* background: #ffffff; */
            z-index: 90;
            padding: 45px 50px 0 45px;
            box-sizing: border-box;
        }

        .header-branding {
            display: table;
            width: 100%;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 20px;
        }

        .header-title-cell {
            display: table-cell;
            vertical-align: bottom;
        }

        .header-title-cell h1 {
            font-size: 32px;
            font-weight: 900;
            color: #0f172a;
            margin: 0;
            letter-spacing: 10px;
            text-transform: uppercase;
        }

        .header-title-cell p {
            font-size: 10px;
            color: #ca8a04;
            font-weight: 700;
            margin: 5px 0 0;
            letter-spacing: 5px;
            text-transform: uppercase;
        }

        .header-id-cell {
            display: table-cell;
            vertical-align: bottom;
            text-align: right;
        }

        .id-ribbon {
            display: inline-block;
            background: #0f172a;
            color: #fde047;
            padding: 6px 15px;
            font-size: 12px;
            font-weight: 800;
            border-left: 4px solid #ca8a04;
            letter-spacing: 1px;
        }

        /*
           FOOTER
        */
        .footer-minimal {
            position: fixed;
            bottom: -2.0cm;
            left: 110px;
            right: 50px;
            border-top: 1px solid #f1f5f9;
            padding-top: 10px;
            font-size: 8px;
            color: #94a3b8;
            z-index: 100;
        }

        .footer-table {
            width: 100%;
            border-collapse: collapse;
        }

        .footer-left {
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .footer-center {
            text-align: center;
            font-weight: bold;
            color: #cbd5e1;
        }

        .footer-right {
            text-align: right;
            font-weight: 600;
        }

        /*
           PAGE CONTENT
           Added explicit padding-top as a double-safety mechanism.
        */
        .page-content {
            margin-left: 115px;
            margin-right: 50px;
            padding-top: 20px;
        }

        /*
           CARDS to separate content
           Removed borders from the main container to avoid "ghost borders" on breaks.
           Instead, we style the header strap and the content independently or use bottom borders.
        */
        .section-block {
            margin-bottom: 30px;
            page-break-inside: auto;
        }

        /* The Header Strap for each section */
        .section-header {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #0f172a;
            padding: 10px 20px;
            margin-bottom: 0;
            /* Attach to body */
            page-break-after: avoid;
            /* Keep with content */
        }

        .section-header h3 {
            margin: 0;
            font-size: 11px;
            font-weight: 900;
            color: #1e1b4b;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* The Body for each section */
        .section-body {
            border: 1px solid #e2e8f0;
            border-top: none;
            /* Connect to header */
            padding: 20px;
            background: #ffffff;
        }

        /*
           METRICS - SPECIAL HANDLING
           No outer border to avoid the "empty box" issue on page breaks.
           Just individual items.
        */
        .metrics-container {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .metrics-header {
            border-bottom: 2px solid #ca8a04;
            margin-bottom: 20px;
            padding-bottom: 10px;
            page-break-after: avoid;
        }

        .metrics-header h3 {
            font-size: 14px;
            font-weight: 900;
            color: #0f172a;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
        }

        /* GRID STYLES */
        .clean-grid {
            width: 100%;
            border-collapse: collapse;
        }

        .clean-row td {
            padding: 8px 0;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: top;
        }

        .clean-row {
            page-break-inside: avoid;
        }

        .clean-label {
            width: 35%;
            font-size: 10px;
            color: #64748b;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding-right: 15px;
        }

        .clean-value {
            width: 65%;
            font-size: 12px;
            color: #0f172a;
            font-weight: 500;
        }

        /* NARRATIVE */
        .narrative-box {
            background: #fdfdfd;
            border-left: 4px solid #0f172a;
            padding: 15px 20px;
            font-size: 11px;
            color: #334155;
            line-height: 1.6;
            margin-top: 0;
            /* Flash with body */
            text-align: justify;
        }

        /* CRITERIA ITEMS */
        .criteria-item {
            margin-bottom: 25px;
            border-left: 2px solid #e2e8f0;
            padding-left: 15px;
            page-break-inside: avoid;
        }

        .criteria-ques {
            font-size: 11px;
            font-weight: 800;
            color: #1e1b4b;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .criteria-ans {
            font-size: 11px;
            color: #475569;
            line-height: 1.6;
        }

        /* FINANCIALS */
        .financial-table td {
            padding: 10px 0;
        }

        .financial-value {
            text-align: right;
        }

        .financial-highlight {
            color: #ca8a04 !important;
            font-size: 15px !important;
            font-weight: 800 !important;
        }

        /* UTILS */
        .text-accent {
            color: #ca8a04;
            font-weight: 700;
        }

        .pagenum:before {
            content: counter(page);
        }
    </style>
</head>

<body>
    <!-- Persistent Sidebar -->
    <div class="sidebar-master">
        <div class="gold-leaf-accent"></div>
        <div class="sidebar-brand">NOMINATION RECORD</div>
    </div>

    <!-- Repeating Header Frame -->
    <div class="header-frame">
        <div class="header-branding">
            <div class="header-title-cell">
                <h1>AUREUM</h1>
                <p>Excellence Recognized Worldwide</p>
            </div>
            <div class="header-id-cell">
                <div class="id-ribbon">{{ $nomination->application_id }}</div>
            </div>
        </div>
    </div>

    <!-- Repeating Footer Anchor -->
    <div class="footer-minimal">
        <table class="footer-table">
            <tr>
                <td class="footer-left">Aureum Awards &copy; {{ date('Y') }}</td>
                <td class="footer-center">• AUTHENTICATED DOCUMENT •</td>
                <td class="footer-right">PAGE <span class="pagenum"></span></td>
            </tr>
        </table>
    </div>

    <!-- Main Content Flow -->
    <div class="page-content">

        <!-- SECTION: IDENTITY -->
        <div class="section-block">
            <div class="section-header">
                <h3>I. Candidate Specification</h3>
            </div>
            <div class="section-body">
                <table class="clean-grid">
                    <tr class="clean-row">
                        <td class="clean-label">Legal Reference Name</td>
                        <td class="clean-value">{{ $nomination->full_name }}</td>
                    </tr>
                    <tr class="clean-row">
                        <td class="clean-label">Entity Classification</td>
                        <td class="clean-value" style="text-transform: capitalize;">{{ $nomination->nominee_type }}</td>
                    </tr>
                    <tr class="clean-row">
                        <td class="clean-label">Institutional Affiliation</td>
                        <td class="clean-value">{{ $nomination->organization ?? 'Independent Representation' }}</td>
                    </tr>
                    <tr class="clean-row">
                        <td class="clean-label">Global Residency</td>
                        <td class="clean-value">{{ $nomination->country }}</td>
                    </tr>
                    <tr class="clean-row">
                        <td class="clean-label">Selected Honor Category</td>
                        <td class="clean-value">{{ $nomination->category->name }}</td>
                    </tr>
                    <tr class="clean-row">
                        <td class="clean-label">Specific Award Designation</td>
                        <td class="clean-value text-accent">{{ $nomination->award->name }}</td>
                    </tr>
                    <tr class="clean-row">
                        <td class="clean-label">Evidence Submitted</td>
                        <td class="clean-value">{{ $nomination->evidence()->where('type', 'file')->count() }} Files
                            Attached</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- SECTION: CONTRIBUTION -->
        <div class="section-block">
            <div class="section-header">
                <h3>II. Contribution Summary</h3>
            </div>
            <div class="section-body">
                <table class="clean-grid">
                    <tr class="clean-row">
                        <td class="clean-label">Primary Application Title</td>
                        <td class="clean-value">{{ $nomination->contribution_title }}</td>
                    </tr>
                    <tr class="clean-row">
                        <td class="clean-label">Impact Period</td>
                        <td class="clean-value">{{ $nomination->timeframe }}</td>
                    </tr>
                </table>
                <div style="margin-top: 20px;">
                    <div class="clean-label" style="margin-bottom: 5px;">Executive Justification & Case</div>
                    <div class="narrative-box">
                        {{ $nomination->eligibility_justification }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Reference Links Section -->
        @php
            $referenceLinks = $nomination->evidence()->where('type', 'link')->get();
        @endphp
        @if ($referenceLinks->count() > 0)
            <div class="section-block">
                <div class="section-header">
                    <h3>Reference & Digital citations</h3>
                </div>
                <div class="section-body">
                    <table class="clean-grid">
                        @foreach ($referenceLinks as $link)
                            <tr class="clean-row">
                                <td class="clean-label" style="width: 20%;">CITATION {{ $loop->iteration }}</td>
                                <td class="clean-value">
                                    <a href="{{ $link->reference_url }}" target="_blank"
                                        style="color: #0f172a; text-decoration: none; border-bottom: 1px dotted #ca8a04;">
                                        {{ Str::limit($link->reference_url, 60) }}
                                    </a>
                                    @if ($link->description)
                                        <div style="font-size: 10px; color: #64748b; margin-top: 2px;">
                                            {{ $link->description }}</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        @endif

        <!-- III. METRIC PERFORMANCE (No Card Container!) -->
        @if ($nomination->answers->count() > 0)
            <div class="metrics-container">
                <div class="metrics-header">
                    <h3>III. Metric Performance Indicators</h3>
                </div>

                @foreach ($nomination->answers as $answer)
                    <div class="criteria-item">
                        <div class="criteria-ques">{{ $answer->nomineeQuestion->question }}</div>
                        <div class="criteria-ans">
                            {{ $answer->answer }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- IV. FINANCIAL SETTLEMENT -->
        @php
            $isCompleted = strtolower($nomination->payment_status) === 'completed';
            $awardPrice = $nomination->award?->amount ?? 0;
            $grandTotal = $awardPrice + $nomination->admin_fee - $nomination->discount_applied;
            $transaction = $nomination->payments()->where('status', 'completed')->first();
        @endphp

        @if ($isCompleted)
            <div class="section-block">
                <div class="section-header">
                    <h3>IV. Financial Settlement Record</h3>
                </div>
                <div class="section-body">
                    <table class="clean-grid financial-table">
                        <tr class="clean-row">
                            <td class="financial-label">Award Entry Fee</td>
                            <td class="financial-value">{{ number_format($awardPrice, 2) }} USD</td>
                        </tr>
                        <tr class="clean-row">
                            <td class="financial-label">Administrative Processing</td>
                            <td class="financial-value">{{ number_format($nomination->admin_fee, 2) }} USD</td>
                        </tr>
                        @if ($nomination->discount_applied > 0)
                            <tr class="clean-row">
                                <td class="financial-label">Incentive / Discount</td>
                                <td class="financial-value" style="color: #ef4444;">-
                                    {{ number_format($nomination->discount_applied, 2) }} USD</td>
                            </tr>
                        @endif
                        <tr class="clean-row">
                            <td class="financial-label" style="color: #0f172a; font-weight: 800;">Gross Settlement
                                Amount</td>
                            <td class="financial-value financial-highlight">{{ number_format($grandTotal, 2) }} USD
                            </td>
                        </tr>
                        <tr class="clean-row">
                            <td class="financial-label">Payment Methodology</td>
                            <td class="financial-value" style="font-weight: 500;">
                                {{ strtoupper($nomination->payment_method ?? 'Verified Gateway') }}</td>
                        </tr>
                        @if ($transaction)
                            <tr class="clean-row">
                                <td class="financial-label">Transaction Identifier</td>
                                <td class="financial-value" style="font-family: monospace; font-size: 11px;">
                                    {{ $transaction->transaction_id }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        @endif

        <!-- V. COMPLIANCE -->
        <div class="section-block">
            <div class="section-header" style="background: white; border-left: 4px solid #ca8a04;">
                <h3>V. Compliance & Verification</h3>
            </div>
            <div class="section-body" style="border-top: 1px solid #e2e8f0;">
                <table class="clean-grid">
                    <tr class="clean-row">
                        <td class="clean-label" style="border: none;">Data Intel Propriety</td>
                        <td class="clean-value" style="border: none;">{{ ucfirst($nomination->sensitive_data) }}</td>
                    </tr>
                    <tr class="clean-row">
                        <td class="clean-label" style="border: none;">Public Standing Index</td>
                        <td class="clean-value" style="border: none;">{{ ucfirst($nomination->controversies) }}</td>
                    </tr>
                    <tr class="clean-row">
                        <td class="clean-label" style="border: none; padding-top: 10px;">Institutional Vouching</td>
                        <td class="clean-value"
                            style="border: none; padding-top: 10px; color: #ca8a04; font-weight: 800; letter-spacing: 1px;">
                            DIGITALLY SEALED & AUTHENTICATED</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

    <!-- Script for Page Numbers -->
    <script type="text/php">
        if ( isset($pdf) ) {
            $font = $fontMetrics->get_font("helvetica", "bold");
            $pdf->page_text(500, 800, "PAGE {PAGE_NUM} OF {PAGE_COUNT}", $font, 7, array(0.58, 0.64, 0.73));
        }
    </script>
</body>

</html>
