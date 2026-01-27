<div class="fi-infolist-view-nomination">
    <!-- Main Container -->
    <div
        class="overflow-hidden rounded-xl border border-white/10 bg-gray-900/50 shadow-xl backdrop-blur-sm ring-1 ring-white/10">

        <!-- Header -->
        <div class="flex items-center justify-between border-b border-white/10 bg-yellow-400/5 px-6 py-4">
            <div>
                <h4 class="text-lg font-bold text-white">Nomination Details</h4>
                <span class="text-sm font-medium text-gray-400">{{ $record->application_id }}</span>
            </div>
            <div class="text-right">
                @php
                    $statusColors = [
                        'pending' => 'text-yellow-400 bg-yellow-400/10 border-yellow-400/20',
                        'completed' => 'text-green-400 bg-green-400/10 border-green-400/20',
                        'failed' => 'text-red-400 bg-red-400/10 border-red-400/20',
                        'refunded' => 'text-gray-400 bg-gray-400/10 border-gray-400/20',
                    ];
                    $statusClass =
                        $statusColors[$record->payment_status] ?? 'text-gray-400 bg-gray-400/10 border-gray-400/20';
                @endphp
                <span
                    class="inline-flex items-center rounded-md border px-2.5 py-0.5 text-xs font-medium {{ $statusClass }}">
                    {{ ucfirst($record->payment_status) }}
                </span>
                <div class="mt-1 text-xs text-gray-500">
                    Submitted on {{ $record->created_at->format('d M Y, h:i A') }}
                </div>
            </div>
        </div>

        <div class="p-6">
            <!-- Award Highlights -->
            <div class="mb-8 grid gap-4 md:grid-cols-2">
                <div class="flex items-center gap-4 rounded-xl border border-white/5 bg-white/5 p-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-yellow-400/10">
                        <x-heroicon-o-folder-open class="h-6 w-6 text-yellow-500" />
                    </div>
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wider text-gray-500">Category</div>
                        <div class="font-medium text-white">{{ $record->category->name ?? 'Uncategorized' }}</div>
                    </div>
                </div>
                <div class="flex items-center gap-4 rounded-xl border border-white/5 bg-white/5 p-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-yellow-400/10">
                        <x-heroicon-o-trophy class="h-6 w-6 text-yellow-500" />
                    </div>
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wider text-gray-500">Award</div>
                        <div class="font-medium text-white">{{ $record->award->name ?? 'No Award Selected' }}</div>
                    </div>
                </div>
            </div>

            <!-- Nominee Info -->
            <div class="mb-8">
                <h5
                    class="mb-6 flex items-center gap-2 border-b border-white/5 pb-2 text-sm font-bold uppercase tracking-wider text-yellow-500">
                    <x-heroicon-o-user-circle class="h-5 w-5" />
                    Nominee Information
                </h5>
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="space-y-1">
                        <label class="block text-xs text-gray-500">Nominee Type</label>
                        <div class="font-medium text-white">{{ ucfirst($record->nominee_type) }}</div>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs text-gray-500">Full Name</label>
                        <div class="font-medium text-white">{{ $record->full_name }}</div>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs text-gray-500">Organization</label>
                        <div class="font-medium text-white">{{ $record->organization ?: 'N/A' }}</div>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs text-gray-500">Email</label>
                        <div class="font-medium text-white">{{ $record->email }}</div>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs text-gray-500">Phone</label>
                        <div class="font-medium text-white">{{ $record->phone }}</div>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs text-gray-500">Country</label>
                        <div class="font-medium text-white">{{ $record->country }}</div>
                    </div>
                </div>
            </div>

            <!-- Contribution Details -->
            <div class="mb-8">
                <h5
                    class="mb-6 flex items-center gap-2 border-b border-white/5 pb-2 text-sm font-bold uppercase tracking-wider text-yellow-500">
                    <x-heroicon-o-star class="h-5 w-5" />
                    Contribution Details
                </h5>
                <div class="space-y-6">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-yellow-500">Title</label>
                        <div class="rounded-lg border-l-4 border-yellow-500/50 bg-white/5 p-4 text-gray-300">
                            {{ $record->contribution_title }}
                        </div>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-yellow-500">Timeframe</label>
                        <div class="rounded-lg border-l-4 border-yellow-500/50 bg-white/5 p-4 text-gray-300">
                            {{ $record->timeframe }}
                        </div>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-yellow-500">Eligibility Justification</label>
                        <div
                            class="rounded-lg border-l-4 border-yellow-500/50 bg-white/5 p-4 text-sm leading-relaxed text-gray-300">
                            {{ $record->eligibility_justification }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Details -->
            @if ($record->answers->count() > 0)
                <div class="mb-8">
                    <h5
                        class="mb-6 flex items-center gap-2 border-b border-white/5 pb-2 text-sm font-bold uppercase tracking-wider text-yellow-500">
                        <x-heroicon-o-question-mark-circle class="h-5 w-5" />
                        Additional Details
                    </h5>
                    <div class="space-y-6">
                        @foreach ($record->answers as $answer)
                            <div>
                                <label
                                    class="mb-2 block text-sm font-medium text-yellow-500">{{ $answer->nomineeQuestion->question ?? 'Question Deleted' }}</label>
                                <div
                                    class="rounded-lg border-l-4 border-yellow-500/50 bg-white/5 p-4 text-sm leading-relaxed text-gray-300">
                                    {{ $answer->answer }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Evidence -->
            @if ($record->evidence->count() > 0)
                <div class="mb-8">
                    <h5
                        class="mb-6 flex items-center gap-2 border-b border-white/5 pb-2 text-sm font-bold uppercase tracking-wider text-yellow-500">
                        <x-heroicon-o-paper-clip class="h-5 w-5" />
                        Evidence & References
                    </h5>
                    <div class="grid gap-4 md:grid-cols-2">
                        @foreach ($record->evidence as $evidence)
                            <div
                                class="group flex items-center gap-4 rounded-xl border border-white/5 bg-white/5 p-3 transition hover:border-yellow-500/50 hover:bg-yellow-500/5">
                                @if ($evidence->type === 'file')
                                    <x-heroicon-o-document-text class="h-6 w-6 text-yellow-500" />
                                    <div class="flex-1 min-w-0">
                                        <div class="truncate text-sm font-medium text-white">{{ $evidence->file_name }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ number_format($evidence->file_size / 1024, 2) }} KB</div>
                                    </div>
                                    <a href="{{ route('nomination.evidence.download', $evidence->id) }}"
                                        class="text-gray-400 transition hover:text-yellow-500">
                                        <x-heroicon-o-arrow-down-tray class="h-5 w-5" />
                                    </a>
                                @else
                                    <x-heroicon-o-link class="h-6 w-6 text-yellow-500" />
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-medium text-white">Reference Link</div>
                                        <div class="truncate text-xs text-gray-500">{{ $evidence->reference_url }}
                                        </div>
                                    </div>
                                    <a href="{{ $evidence->reference_url }}" target="_blank"
                                        class="text-gray-400 transition hover:text-yellow-500">
                                        <x-heroicon-o-arrow-top-right-on-square class="h-5 w-5" />
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Payment Info -->
            <div class="mb-8">
                <h5
                    class="mb-6 flex items-center gap-2 border-b border-white/5 pb-2 text-sm font-bold uppercase tracking-wider text-yellow-500">
                    <x-heroicon-o-credit-card class="h-5 w-5" />
                    Payment Information
                </h5>

                @php
                    $totalAmount = ($record->award?->amount ?? 0) + $record->admin_fee - $record->discount_applied;
                @endphp

                <div class="mb-6 grid gap-4 grid-cols-2 md:grid-cols-4">
                    <div class="rounded-2xl border border-yellow-500/10 bg-white/5 p-4 text-center">
                        <div class="mb-1 text-xs text-gray-400">Award Price</div>
                        <div class="text-xl font-bold text-white">${{ number_format($record->award?->amount ?? 0, 2) }}
                        </div>
                    </div>
                    <div class="rounded-2xl border border-yellow-500/10 bg-white/5 p-4 text-center">
                        <div class="mb-1 text-xs text-gray-400">Admin Fee</div>
                        <div class="text-xl font-bold text-white">${{ number_format($record->admin_fee, 2) }}</div>
                    </div>
                    <div class="rounded-2xl border border-yellow-500/10 bg-yellow-400/5 p-4 text-center">
                        <div class="mb-1 text-xs text-yellow-500">Discount</div>
                        <div class="text-xl font-bold text-yellow-500">
                            -${{ number_format($record->discount_applied, 2) }}</div>
                    </div>
                    <div
                        class="rounded-2xl border border-yellow-500/30 bg-gradient-to-br from-yellow-400/20 to-orange-500/10 p-4 text-center">
                        <div class="mb-1 text-xs font-bold text-yellow-500">Grand Total</div>
                        <div class="text-2xl font-bold text-yellow-500">${{ number_format($totalAmount, 2) }}</div>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div class="flex items-center gap-4 rounded-lg border-l-4 border-yellow-500 bg-white/5 p-3">
                        <x-heroicon-o-banknotes class="h-6 w-6 text-yellow-500" />
                        <div>
                            <div class="text-xs font-bold uppercase tracking-wider text-gray-500">Payment Method</div>
                            <div class="font-semibold text-white">{{ strtoupper($record->payment_method ?: 'N/A') }}
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 rounded-lg border-l-4 border-yellow-500 bg-white/5 p-3">
                        <x-heroicon-o-receipt-refund class="h-6 w-6 text-yellow-500" />
                        <div>
                            <div class="text-xs font-bold uppercase tracking-wider text-gray-500">Transaction ID</div>
                            <div class="font-mono text-white">
                                {{ $record->payments->first()?->transaction_id ?: 'N/A' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Compliance -->
            <div>
                <h5
                    class="mb-6 flex items-center gap-2 border-b border-white/5 pb-2 text-sm font-bold uppercase tracking-wider text-yellow-500">
                    <x-heroicon-o-shield-check class="h-5 w-5" />
                    Compliance & Verification
                </h5>
                <div class="grid gap-4 md:grid-cols-3">
                    <div class="rounded-xl border border-white/5 bg-white/5 p-4">
                        <div class="mb-1 text-xs text-gray-500">Sensitive Data Use</div>
                        <div
                            class="font-medium {{ $record->sensitive_data === 'yes' ? 'text-yellow-500' : 'text-green-500' }}">
                            {{ ucfirst($record->sensitive_data) }}
                        </div>
                    </div>
                    <div class="rounded-xl border border-white/5 bg-white/5 p-4">
                        <div class="mb-1 text-xs text-gray-500">Public Controversies</div>
                        <div
                            class="font-medium {{ $record->controversies === 'yes' ? 'text-red-500' : 'text-green-500' }}">
                            {{ ucfirst($record->controversies) }}
                        </div>
                    </div>
                    <div class="rounded-xl border border-white/5 bg-white/5 p-4">
                        <div class="mb-1 text-xs text-gray-500">Industry Influence</div>
                        <div
                            class="font-medium {{ $record->industry_influence === 'yes' ? 'text-green-500' : 'text-yellow-500' }}">
                            {{ ucfirst($record->industry_influence) }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Actions Footer -->
        <div class="border-t border-white/10 bg-gray-900/80 p-6 text-center backdrop-blur">
            <a href="{{ route('nomination.pdf', $record->application_id) }}" target="_blank"
                class="inline-flex items-center gap-2 rounded-lg bg-yellow-500 px-6 py-2.5 text-sm font-bold text-black transition hover:bg-yellow-400">
                <x-heroicon-o-arrow-down-tray class="h-5 w-5" />
                Download Official Record
            </a>
        </div>
    </div>
</div>
