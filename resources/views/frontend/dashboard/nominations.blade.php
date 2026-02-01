@extends('frontend.dashboard.layout')

@section('dashboard-content')
    <div class="dashboard-content">
        <div class="dashboard-card">
            <div class="card-header d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">My Nominations</h4>
                <a href="{{ route('nomination') }}" class="btn-main btn-sm">
                    <i class="fa fa-plus"></i> New Nomination
                </a>
            </div>

            <div class="table-responsive">
                <table class="table premium-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category & Award</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nominations as $nomination)
                            <tr>
                                <td>
                                    <span class="application-id">{{ $nomination->application_id }}</span>
                                </td>
                                <td>
                                    <div class="award-info">
                                        <div class="category-name text-white">{{ $nomination->category->name }}</div>
                                        <div class="award-name text-muted fs-12">{{ $nomination->award->name }}</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $nomination->payment_status }}">
                                        {{ ucfirst($nomination->payment_status) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="date text-muted">{{ $nomination->created_at->format('d M Y') }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex gap-2 justify-content-end align-items-center">
                                        @if ($nomination->payment_status === 'pending')
                                            @php
                                                $isSeasonClosed = false;
                                                if ($nomination->season) {
                                                    $isSeasonClosed = now()->gt(
                                                        $nomination->season->application_deadline_date->endOfDay(),
                                                    );
                                                }
                                            @endphp

                                            @if ($isSeasonClosed)
                                                <span class="text-danger fs-12 fw-bold bg-danger-soft p-2 rounded">
                                                    <i class="fa fa-clock me-1"></i> Season Closed
                                                </span>
                                            @else
                                                <a href="{{ route('nomination', ['app_id' => $nomination->application_id]) }}"
                                                    class="btn-action edit" title="Edit & Pay">
                                                    <i class="fa fa-credit-card"></i> Pay
                                                </a>
                                            @endif

                                            <button class="btn-action-delete text-danger btn-main"
                                                onclick="deleteNomination('{{ $nomination->application_id }}')"
                                                title="Delete Nomination">
                                                <i class="fa fa-trash-alt text-white"></i>
                                            </button>
                                        @else
                                            <a href="{{ route('dashboard.nominations.view', $nomination->application_id) }}"
                                                class="btn-action view" title="View Details">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="empty-state">
                                        <i class="fa fa-trophy mb-3 fs-48 text-muted opacity-2"></i>
                                        <p class="text-muted">No nominations found.</p>
                                        <a href="{{ route('nomination') }}" class="btn-main mt-3">Start Your First
                                            Nomination</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .premium-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .premium-table thead th {
            color: rgba(255, 255, 255, 0.5);
            font-weight: 500;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            padding: 15px 20px;
            border: none;
        }

        .premium-table tbody tr {
            background: rgba(255, 255, 255, 0.02);
            transition: all 0.3s ease;
        }

        .premium-table tbody tr:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: scale(1.01);
        }

        .premium-table tbody td {
            padding: 20px;
            border: none;
            vertical-align: middle;
        }

        .premium-table tbody tr td:first-child {
            border-radius: 12px 0 0 12px;
        }

        .premium-table tbody tr td:last-child {
            border-radius: 0 12px 12px 0;
        }

        .application-id {
            color: #FFD700;
            font-weight: 600;
            font-family: monospace;
        }

        .status-badge {
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: rgba(255, 165, 0, 0.1);
            color: #FFA500;
            border: 1px solid rgba(255, 165, 0, 0.2);
        }

        .status-completed {
            background: rgba(0, 255, 0, 0.1);
            color: #00FF00;
            border: 1px solid rgba(0, 255, 0, 0.2);
        }

        .status-failed {
            background: rgba(255, 0, 0, 0.1);
            color: #FF0000;
            border: 1px solid rgba(255, 0, 0, 0.2);
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.3s ease;
        }

        .btn-action.edit {
            background: linear-gradient(135deg, #FFD700, #FF8C00);
            color: #000;
        }

        .btn-action.view {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .btn-action.view:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: #FFD700;
            color: #FFD700;
        }

        .btn-action-delete {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-action-delete:hover {
            background: #dc3545;
            color: #fff;
            transform: scale(1.1);
        }

        .bg-danger-soft {
            background: rgba(220, 53, 69, 0.1);
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteNomination(appId) {
            Swal.fire({
                title: 'Delete Nomination?',
                text: "Are you sure you want to delete this nomination? This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FFD700',
                cancelButtonColor: '#333',
                confirmButtonText: 'Yes, Delete it!',
                cancelButtonText: 'Cancel',
                background: '#1a1a1a',
                color: '#fff',
                customClass: {
                    confirmButton: 'btn-main py-2 px-4 border-0 text-black',
                    cancelButton: 'btn-secondary py-2 px-4'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/nomination/${appId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    }).then(response => response.json()).then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: data.message,
                                icon: 'success',
                                background: '#1a1a1a',
                                color: '#fff',
                                confirmButtonColor: '#FFD700'
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: data.message,
                                icon: 'error',
                                background: '#1a1a1a',
                                color: '#fff'
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
