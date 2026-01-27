@extends('frontend.dashboard.layout')

@section('dashboard-content')
    <div class="dashboard-content">
        <div class="dashboard-card p-0 overflow-hidden">
            <!-- Header with Status -->
            <div class="card-header-premium p-4 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1">Nomination Details</h4>
                    <span class="application-id fs-18">{{ $nomination->application_id }}</span>
                </div>
                <div class="text-end">
                    <span class="status-badge status-{{ $nomination->payment_status }} fs-14">
                        {{ ucfirst($nomination->payment_status) }}
                    </span>
                    <div class="mt-2 text-muted fs-12">Submitted on {{ $nomination->created_at->format('d M Y, h:i A') }}
                    </div>
                </div>
            </div>

            <div class="p-4">
                <!-- Award Highlights -->
                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <div class="highlight-box">
                            <i class="fa fa-folder-open text-gold"></i>
                            <div>
                                <label>Category</label>
                                <div>{{ $nomination->category->name }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="highlight-box">
                            <i class="fa fa-trophy text-gold"></i>
                            <div>
                                <label>Award</label>
                                <div>{{ $nomination->award->name }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sections -->
                <div class="info-section">
                    <h5 class="section-title-premium"><i class="fa fa-user-circle"></i> Nominee Information</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label>Nominee Type</label>
                                <span>{{ ucfirst($nomination->nominee_type) }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label>Full Name</label>
                                <span>{{ $nomination->full_name }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label>Organization</label>
                                <span>{{ $nomination->organization ?: 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label>Email</label>
                                <span>{{ $nomination->email }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label>Phone</label>
                                <span>{{ $nomination->phone }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label>Country</label>
                                <span>{{ $nomination->country }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-section mt-5">
                    <h5 class="section-title-premium"><i class="fa fa-star"></i> Contribution Details</h5>
                    <div class="detail-block">
                        <label>Title</label>
                        <p>{{ $nomination->contribution_title }}</p>
                    </div>
                    <div class="detail-block">
                        <label>Timeframe</label>
                        <p>{{ $nomination->timeframe }}</p>
                    </div>
                    <div class="detail-block">
                        <label>Eligibility Justification</label>
                        <p>{{ $nomination->eligibility_justification }}</p>
                    </div>
                </div>

                @if ($nomination->answers->count() > 0)
                    <div class="info-section mt-5">
                        <h5 class="section-title-premium"><i class="fa fa-question-circle"></i> Additional Details</h5>
                        @foreach ($nomination->answers as $answer)
                            <div class="detail-block">
                                <label>{{ $answer->nomineeQuestion->question }}</label>
                                <p>{{ $answer->answer }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ($nomination->evidence->count() > 0)
                    <div class="info-section mt-5">
                        <h5 class="section-title-premium"><i class="fa fa-paperclip"></i> Evidence & References</h5>
                        <div class="row g-3">
                            @foreach ($nomination->evidence as $evidence)
                                <div class="col-md-6">
                                    <div class="evidence-pill">
                                        @if ($evidence->type === 'file')
                                            <i class="fa fa-file-alt"></i>
                                            <div class="ev-info">
                                                <div class="ev-name">{{ $evidence->file_name }}</div>
                                                <div class="ev-meta">{{ number_format($evidence->file_size / 1024, 2) }} KB
                                                </div>
                                            </div>
                                            <a href="{{ route('nomination.evidence.download', $evidence->id) }}"
                                                class="ev-download" title="Download">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        @else
                                            <i class="fa fa-link"></i>
                                            <div class="ev-info">
                                                <div class="ev-name">Reference Link</div>
                                                <div class="ev-meta">
                                                    {{ \Illuminate\Support\Str::limit($evidence->reference_url, 40) }}
                                                </div>
                                            </div>
                                            <a href="{{ $evidence->reference_url }}" target="_blank" class="ev-download"
                                                title="Visit">
                                                <i class="fa fa-external-link-alt"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Payment Details Section -->
                <div class="info-section mt-5">
                    <h5 class="section-title-premium mb-4"><i class="fa fa-credit-card"></i> Payment Information</h5>

                    @php
                        $totalAmount =
                            ($nomination->award?->amount ?? 0) + $nomination->admin_fee - $nomination->discount_applied;
                    @endphp

                    <div class="row g-4">
                        <!-- Financial Breakdown Cards -->
                        <div class="col-md-3">
                            <div class="payment-stat-card p-4 rounded-4 h-100 text-center"
                                style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 215, 0, 0.1);">
                                <div class="text-muted fs-12 mb-2">Award Price</div>
                                <div class="text-white fw-bold fs-24">
                                    ${{ number_format($nomination->award?->amount ?? 0, 2) }}</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="payment-stat-card p-4 rounded-4 h-100 text-center"
                                style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 215, 0, 0.1);">
                                <div class="text-muted fs-12 mb-2">Admin Fee</div>
                                <div class="text-white fw-bold fs-24">${{ number_format($nomination->admin_fee, 2) }}</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="payment-stat-card p-4 rounded-4 h-100 text-center"
                                style="background: rgba(255, 215, 0, 0.03); border: 1px solid rgba(255, 215, 0, 0.1);">
                                <div class="text-gold fs-12 mb-2">Discount Applied</div>
                                <div class="text-gold fw-bold fs-24">
                                    -${{ number_format($nomination->discount_applied, 2) }}</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="payment-stat-card p-4 rounded-4 h-100 text-center"
                                style="background: linear-gradient(135deg, rgba(255, 215, 0, 0.15), rgba(255, 107, 0, 0.05)); border: 1px solid rgba(255, 215, 0, 0.3);">
                                <div class="text-gold fs-12 mb-2 fw-bold">Grand Total Paid</div>
                                <div class="text-gold fw-bold fs-30">${{ number_format($totalAmount, 2) }}</div>
                            </div>
                        </div>

                        <!-- Secondary Info Cards -->
                        <div class="col-md-6">
                            <div class="info-tile d-flex align-items-center gap-3 p-3 rounded-3"
                                style="background: rgba(255, 255, 255, 0.03); border-left: 4px solid #FFD700;">
                                <div class="icon-box"><i class="fa fa-university text-gold"></i></div>
                                <div>
                                    <div class="text-muted fs-11 uppercase fw-bold tracking-wider">Payment Method</div>
                                    <div class="text-white fw-semibold">
                                        {{ strtoupper($nomination->payment_method ?: 'N/A') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-tile d-flex align-items-center gap-3 p-3 rounded-3"
                                style="background: rgba(255, 255, 255, 0.03); border-left: 4px solid #FFD700;">
                                <div class="icon-box"><i class="fa fa-receipt text-gold"></i></div>
                                <div>
                                    <div class="text-muted fs-11 uppercase fw-bold tracking-wider">Transaction ID</div>
                                    <div class="text-white fw-mono">
                                        {{ $nomination->payments->first()?->transaction_id ?: 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer-premium p-4 bg-dark-glass text-center">
                <a href="{{ route('dashboard.nominations') }}" class="btn-main outline">
                    <i class="fa fa-arrow-left"></i> Back to My Nominations
                </a>
                <a href="{{ route('nomination.pdf', $nomination->application_id) }}" class="btn-main ms-3">
                    <i class="fa fa-file-pdf"></i> Download PDF
                </a>
            </div>
        </div>
    </div>

    <style>
        .card-header-premium {
            background: rgba(255, 215, 0, 0.05);
            border-bottom: 1px solid rgba(255, 215, 0, 0.1);
        }

        .section-title-premium {
            color: #FFD700;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .highlight-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .highlight-box i {
            font-size: 24px;
        }

        .highlight-box label {
            display: block;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .highlight-box div:last-child {
            font-weight: 600;
            color: #fff;
        }

        .detail-item {
            margin-bottom: 15px;
        }

        .detail-item label {
            display: block;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 4px;
        }

        .detail-item span {
            font-weight: 500;
            color: #fff;
        }

        .detail-block {
            margin-bottom: 25px;
        }

        .detail-block label {
            display: block;
            font-size: 13px;
            color: #FFD700;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .detail-block p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            background: rgba(255, 255, 255, 0.02);
            padding: 15px;
            border-radius: 10px;
            border-left: 3px solid rgba(255, 215, 0, 0.3);
        }

        .evidence-pill {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 12px 15px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
        }

        .evidence-pill:hover {
            border-color: #FFD700;
            background: rgba(255, 215, 0, 0.05);
        }

        .evidence-pill i {
            font-size: 20px;
            color: #FFD700;
        }

        .ev-info {
            flex: 1;
        }

        .ev-name {
            font-weight: 600;
            font-size: 13px;
            color: #fff;
        }

        .ev-meta {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.5);
        }

        .ev-download {
            color: rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
        }

        .ev-download:hover {
            color: #FFD700;
        }

        .btn-main.outline {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .btn-main.outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #fff;
        }
    </style>
@endsection
