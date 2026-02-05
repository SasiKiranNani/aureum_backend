<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NominationResource\Pages;
use App\Models\Nomination;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class NominationResource extends Resource
{
    protected static ?string $model = Nomination::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?string $navigationLabel = 'Nominations';

    protected static ?string $modelLabel = 'Nomination';

    protected static ?string $permissionPrefix = 'nomination';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Form not used, created via frontend
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn($query) => $query->whereHas('season', fn($q) => $q->whereDate('closing_date', '>=', now())))
            ->columns([
                Tables\Columns\TextColumn::make('application_id')->label('ID')->searchable()->sortable()->weight('bold')->color('primary'),
                Tables\Columns\TextColumn::make('full_name')->label('Nominee')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.name')->label('Category')->badge()->color('info'),
                Tables\Columns\TextColumn::make('award.name')->label('Award'),
                Tables\Columns\BadgeColumn::make('status')->label('Status')
                    ->colors(['gray' => 'pending', 'warning' => 'processing', 'success' => 'awarded', 'danger' => 'rejected']),
                // Tables\Columns\TextColumn::make('created_at')->label('Submitted')->dateTime('M d, Y'),
                Tables\Columns\TextColumn::make('payment_method')->label('Payment Method'),
                Tables\Columns\TextColumn::make('payment_status')->label('Payment Status'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('season')
                    ->relationship('season', 'name')
                    ->label('Season'),
                Tables\Filters\SelectFilter::make('category')->relationship('category', 'name'),
                Tables\Filters\SelectFilter::make('status')->label('Winning Status')->options(['pending' => 'Pending', 'processing' => 'Processing', 'awarded' => 'Awarded', 'rejected' => 'Rejected']),
                Tables\Filters\SelectFilter::make('payment_status')->label('Payment Status')->options(['pending' => 'Pending', 'processing' => 'Processing', 'awarded' => 'Awarded', 'rejected' => 'Rejected']),
                Tables\Filters\SelectFilter::make('payment_gateway_id')->label('Payment Gateway')->relationship('paymentGateway', 'name'),
            ], layout: \Filament\Tables\Enums\FiltersLayout::AboveContent)
            ->filtersFormColumns(3)
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('view_manual_invoice')
                    ->label('View Invoice')
                    ->icon('heroicon-o-document-text')
                    ->color('info')
                    ->url(fn(Nomination $record) => $record->manual_invoice ? asset('storage/' . $record->manual_invoice) : '#')
                    ->openUrlInNewTab()
                    ->visible(fn(Nomination $record) => (in_array(strtolower($record->payment_method), ['wiretransfer/ach', 'wire transfer', 'ach']) || $record->manual_invoice) && strtolower($record->payment_status) !== 'completed'),
                Tables\Actions\Action::make('update_payment')
                    ->label('Update Payment')
                    ->icon('heroicon-o-currency-dollar')
                    ->color('success')
                    ->visible(fn(Nomination $record) => in_array(strtolower($record->payment_method), ['wiretransfer/ach', 'wire transfer', 'ach']) && strtolower($record->payment_status) !== 'completed')
                    ->form([
                        \Filament\Forms\Components\Select::make('payment_status')
                            ->options([
                                'pending' => 'Pending',
                                'completed' => 'Completed',
                                'failed' => 'Failed',
                                'refunded' => 'Refunded',
                            ])
                            ->required(),
                        \Filament\Forms\Components\Select::make('payment_gateway_id')
                            ->label('Payment Gateway')
                            ->relationship('paymentGateway', 'name')
                            ->searchable()
                            ->preload(),
                        \Filament\Forms\Components\TextInput::make('payment_method')
                            ->label('Payment Method Name (e.g. Wire Transfer)')
                            ->default('Wire Transfer'),
                        \Filament\Forms\Components\DateTimePicker::make('paid_at'),
                        \Filament\Forms\Components\TextInput::make('manual_transaction_id')
                            ->label('Transaction ID'),
                    ])
                    ->fillForm(fn(Nomination $record): array => [
                        'payment_status' => $record->payment_status,
                        'payment_gateway_id' => $record->payment_gateway_id,
                        'payment_method' => $record->payment_method,
                        'paid_at' => $record->paid_at,
                        'manual_transaction_id' => $record->manual_transaction_id,
                    ])
                    ->action(function (array $data, Nomination $record): void {
                        $record->update($data);

                        if ($data['payment_status'] === 'completed' && $record->wasChanged('payment_status')) {
                            // Trigger Email
                            try {
                                // Load relations for PDF
                                $record->load(['answers.nomineeQuestion', 'evidence', 'category', 'award', 'user']);

                                // Generate PDF
                                $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.nomination-pdf', ['nomination' => $record]);
                                $pdfContent = $pdf->output();
                                $fileName = 'nomination-' . $record->application_id . '.pdf';

                                // Create dummy payment object for email view
                                $payment = new \stdClass;
                                $payment->amount_usd = $record->amount_paid ?? 0;

                                \Illuminate\Support\Facades\Mail::to($record->email)
                                    ->send(new \App\Mail\NominationInvoiceMail($record, $payment, $pdfContent, $fileName));

                            } catch (\Exception $e) {
                                \Filament\Notifications\Notification::make()
                                    ->title('Error sending email')
                                    ->body($e->getMessage())
                                    ->danger()
                                    ->send();
                            }
                        }

                        \Filament\Notifications\Notification::make()
                            ->title('Payment Updated')
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make('download_pdf')->label('PDF')->icon('heroicon-o-arrow-down-tray')->url(fn(Nomination $record) => route('nomination.pdf', $record->application_id))->openUrlInNewTab(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema(self::getInfolistSchema());
    }

    public static function getInfolistSchema(): array
    {
        return [
            // HERO HEADER (Premium Dark Gradient)
            Infolists\Components\Section::make()
                ->schema([
                    Infolists\Components\Grid::make(12)->schema([
                        // HEADSHOT
                        Infolists\Components\ImageEntry::make('headshot')
                            ->hiddenLabel()
                            ->height(200)
                            ->width(200)
                            ->circular()
                            ->defaultImageUrl(url('/images/default-avatar.png'))
                            ->extraAttributes(['class' => 'border-[4px] border-white/20 shadow-2xl'])
                            ->columnSpan(3),

                        // MAIN TITLE & INFO
                        Infolists\Components\Group::make([
                            Infolists\Components\TextEntry::make('full_name')
                                ->hiddenLabel()
                                ->size('5xl')
                                ->weight('black')
                                ->fontFamily('font-serif')
                                ->color('white')
                                ->extraAttributes(['class' => 'leading-tight drop-shadow-md']),

                            Infolists\Components\TextEntry::make('organization')
                                ->hiddenLabel()
                                ->size('2xl')
                                ->weight('light')
                                ->color('gray')
                                ->icon('heroicon-m-building-office')
                                ->extraAttributes(['class' => 'mb-6 text-gray-300']),

                            // KEY HIGHLIGHTS ROW
                            Infolists\Components\Grid::make(3)->schema([
                                Infolists\Components\TextEntry::make('category.name')
                                    ->label('CATEGORY')
                                    ->color('warning')
                                    ->weight('bold')
                                    ->extraAttributes(['class' => 'tracking-widest text-xs opacity-80']),

                                Infolists\Components\TextEntry::make('award.name')
                                    ->label('AWARD')
                                    ->color('warning')
                                    ->weight('bold')
                                    ->extraAttributes(['class' => 'tracking-widest text-xs opacity-80']),

                                Infolists\Components\TextEntry::make('application_id')
                                    ->label('APPLICATION ID')
                                    ->color('white')
                                    ->weight('bold')
                                    ->extraAttributes(['class' => 'tracking-widest text-xs opacity-80']),
                            ]),
                        ])->columnSpan(9)->extraAttributes(['class' => 'pl-4 flex flex-col justify-center']),
                    ]),
                ])->extraAttributes([
                        'class' => 'bg-gradient-to-br from-slate-900 via-slate-800 to-indigo-900 rounded-2xl shadow-xl border-none mb-8 p-8 overflow-hidden relative',
                    ]),

            // CONTENT LAYOUT: 2-COLUMN (8 Main / 4 Sidebar)
            Infolists\Components\Grid::make(12)->schema([

                // === LEFT MAIN COLUMN (Story & Evidence) ===
                Infolists\Components\Group::make([

                    // 1. CONTRIBUTION NARRATIVE
                    Infolists\Components\Section::make('Nomination Narrative')
                        ->icon('heroicon-o-book-open')
                        ->schema([
                            Infolists\Components\TextEntry::make('contribution_title')
                                ->label('Contribution Title')
                                ->size('2xl')
                                ->weight('bold')
                                ->extraAttributes(['class' => 'text-slate-800 mb-2']),

                            Infolists\Components\TextEntry::make('timeframe')
                                ->label('Timeframe')
                                ->badge()
                                ->color('gray'),

                            Infolists\Components\TextEntry::make('eligibility_justification')
                                ->label('Eligibility Justification (Why this contribution fits?)')
                                ->markdown()
                                ->prose()
                                ->extraAttributes(['class' => 'bg-slate-50 p-6 rounded-lg text-lg leading-relaxed text-slate-700 shadow-inner mt-4']),
                        ]),

                    // 2. Q&A
                    Infolists\Components\Section::make('Category Question')
                        ->icon('heroicon-o-chat-bubble-left-right')
                        // ->collapsed()
                        ->schema([
                            Infolists\Components\RepeatableEntry::make('answers')
                                ->hiddenLabel()
                                ->contained(false)
                                ->schema([
                                    Infolists\Components\TextEntry::make('nomineeQuestion.question')
                                        ->hiddenLabel()
                                        ->weight('bold')
                                        ->color('primary')
                                        ->extraAttributes(['class' => 'mb-1 text-sm uppercase tracking-wide']),
                                    Infolists\Components\TextEntry::make('answer')
                                        ->hiddenLabel()
                                        ->markdown()
                                        ->extraAttributes(['class' => 'mb-6 text-slate-600 border-l-4 border-slate-200 pl-4']),
                                ]),
                        ]),

                    // 3. EVIDENCE GALLERY
                    Infolists\Components\Section::make('Evidence & Attachments')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            Infolists\Components\RepeatableEntry::make('evidence')
                                ->hiddenLabel()
                                ->grid(1)
                                ->schema([
                                    Infolists\Components\Grid::make(12)->schema([
                                        // Icon (Computed State)
                                        Infolists\Components\TextEntry::make('ev_icon')
                                            ->hiddenLabel()
                                            ->state(' ')
                                            ->icon(fn($record) => match (true) {
                                                ($record->type ?? '') === 'link' => 'heroicon-m-link',
                                                ($record->type ?? '') === 'video' => 'heroicon-m-video-camera',
                                                Str::contains($record->file_type ?? '', 'image') => 'heroicon-m-photo',
                                                Str::contains($record->file_type ?? '', 'pdf') => 'heroicon-m-document-text',
                                                Str::contains($record->file_type ?? '', 'video') => 'heroicon-m-video-camera',
                                                default => 'heroicon-m-paper-clip',
                                            })
                                            ->color('warning')
                                            ->size('lg')
                                            ->columnSpan(1),

                                        // Name/URL (Computed State)
                                        Infolists\Components\TextEntry::make('ev_name')
                                            ->hiddenLabel()
                                            ->state(fn($record) => $record->type === 'link' ? $record->reference_url : $record->file_name)
                                            ->limit(50)
                                            ->tooltip(fn($state) => $state)
                                            ->weight('medium')
                                            ->columnSpan(9)
                                            ->url(fn($record) => $record->type === 'link' ? $record->reference_url : null)
                                            ->openUrlInNewTab(),

                                        // Action
                                        Infolists\Components\Actions::make([
                                            Infolists\Components\Actions\Action::make('access')
                                                ->hiddenLabel()
                                                ->icon('heroicon-m-arrow-top-right-on-square')
                                                ->color('gray')
                                                ->url(fn($record) => $record->file_url ?? $record->reference_url)
                                                ->openUrlInNewTab(),
                                        ])->columnSpan(2)->alignEnd(),
                                    ])->extraAttributes(['class' => 'items-center']),
                                ])->extraAttributes(['class' => 'gap-4']),
                        ]),

                    // 4. COMPLIANCE
                    Infolists\Components\Section::make('Compliance')
                        ->icon('heroicon-o-scale')
                        // ->collapsed()
                        ->columns(3)
                        ->schema([
                            Infolists\Components\TextEntry::make('sensitive_data')->label('Sensitive Data')->badge()->color(fn($state) => $state === 'yes' ? 'danger' : 'success'),
                            Infolists\Components\TextEntry::make('controversies')->label('Controversies')->badge()->color(fn($state) => $state === 'yes' ? 'danger' : 'success'),
                            Infolists\Components\TextEntry::make('industry_influence')->label('Industry Influence')->badge()->color(fn($state) => $state === 'yes' ? 'danger' : 'success'),
                            Infolists\Components\TextEntry::make('declaration_accurate')
                                ->label('Declared Accurate')
                                ->badge()
                                ->formatStateUsing(fn(bool $state) => $state ? 'Yes' : 'No')
                                ->color(fn(bool $state) => $state ? 'success' : 'danger')
                                ->icon(fn(bool $state) => $state ? 'heroicon-m-check-circle' : 'heroicon-m-x-circle'),

                            Infolists\Components\TextEntry::make('declaration_privacy')
                                ->label('Declared Privacy')
                                ->badge()
                                ->formatStateUsing(fn(bool $state) => $state ? 'Yes' : 'No')
                                ->color(fn(bool $state) => $state ? 'success' : 'danger')
                                ->icon(fn(bool $state) => $state ? 'heroicon-m-check-circle' : 'heroicon-m-x-circle'),
                        ]),

                ])->columnSpan(['default' => 12, 'lg' => 8]),

                // === RIGHT SIDEBAR COLUMN (Data & Meta) ===
                Infolists\Components\Group::make([

                    // 1. EXECUTIVE SUMMARY CARD
                    Infolists\Components\Section::make('Executive Summary')
                        ->icon('heroicon-o-user')
                        ->schema([
                            Infolists\Components\TextEntry::make('nominee_type')->label('Type')->badge()->color('gray'),
                            Infolists\Components\TextEntry::make('industry')->label('Industry')->badge()->color('gray'),
                            Infolists\Components\TextEntry::make('workforce_size')->label('Workforce')->icon('heroicon-m-users'),
                            Infolists\Components\TextEntry::make('status')
                                ->badge()
                                ->color(fn($state) => match ($state) {
                                    'awarded' => 'success', 'rejected' => 'danger', default => 'warning'
                                }),
                        ])->columns(2),

                    // 2. EVALUATION OVERVIEW
                    Infolists\Components\Section::make('Evaluation Overview')
                        ->icon('heroicon-o-clipboard-document-check')
                        ->schema([
                            Infolists\Components\TextEntry::make('judge.name')
                                ->label('Assigned Judge')
                                ->icon('heroicon-m-user')
                                ->placeholder('Unassigned'),

                            Infolists\Components\Grid::make(3)->schema([
                                Infolists\Components\TextEntry::make('final_grade')
                                    ->label('Grade')
                                    ->badge()
                                    ->color(fn($state) => match ($state) {
                                        'A', 'B' => 'success',
                                        'C' => 'warning',
                                        'D', 'F' => 'danger',
                                        default => 'gray'
                                    })
                                    ->size('lg'),

                                Infolists\Components\TextEntry::make('final_score')
                                    ->label('Score')
                                    ->numeric(2)
                                    ->weight('bold')
                                    ->size('lg'),

                                Infolists\Components\TextEntry::make('status')
                                    ->label('Status')
                                    ->badge()
                                    ->color(fn($state) => match ($state) {
                                        'awarded' => 'success', 'rejected' => 'danger', default => 'gray'
                                    }),
                            ]),
                        ]),
                    Infolists\Components\Section::make('Financials')
                        ->icon('heroicon-o-currency-dollar')
                        ->hidden(fn() => auth()->user()->hasRole('judge'))
                        ->schema([
                            Infolists\Components\TextEntry::make('payments.transaction_id')
                                ->label('Txn ID')
                                ->size('3xl')
                                ->weight('black')
                                ->alignCenter()
                                ->extraAttributes(['class' => 'mb-2 break-all']),

                            Infolists\Components\TextEntry::make('payment_method')
                                ->label('Via')
                                ->money('USD')
                                ->size('3xl')
                                ->weight('black')
                                ->color('success')
                                ->alignCenter()
                                ->badge()->formatStateUsing(fn($state) => strtoupper($state))
                                ->extraAttributes(['class' => 'mb-2']),

                            Infolists\Components\Grid::make(2)->schema([
                                Infolists\Components\TextEntry::make('award.amount')->label('Award Price')->money('USD')->size('xs'),
                                Infolists\Components\TextEntry::make('admin_fee')->label('Admin Fee')->money('USD')->size('xs'),
                                Infolists\Components\TextEntry::make('discount_applied')->label('Discount')->money('USD')->color('danger')->size('xs'),
                                // Infolists\Components\TextEntry::make('payment_method')->label('Via')->badge()->formatStateUsing(fn($state) => strtoupper($state)),
                                // Infolists\Components\TextEntry::make('payments.transaction_id')->label('Txn ID')->fontFamily('font-mono')->size('xs')->limit(12),

                                Infolists\Components\TextEntry::make('amount_paid')
                                    ->label('TOTAL PAID')
                                    ->money('USD')
                                    ->size('3xl')
                                    ->weight('black')
                                    ->color('success')
                                    ->extraAttributes(['class' => 'mb-2']),
                            ]),
                        ]),

                    // 3. CONTACT & LOCATION
                    Infolists\Components\Section::make('Contact')
                        ->icon('heroicon-o-at-symbol')
                        ->schema([
                            Infolists\Components\TextEntry::make('curr_email')->label('Email')->default(fn($record) => $record->email)->icon('heroicon-m-envelope')->url(fn($state) => 'mailto:' . $state)->extraAttributes(['class' => 'whitespace-normal break-all']),
                            Infolists\Components\TextEntry::make('curr_phone')->label('Phone')->default(fn($record) => $record->phone)->icon('heroicon-m-phone'),
                            Infolists\Components\TextEntry::make('linkedin_url')->label('LinkedIn')->icon('heroicon-m-link')->url(fn($state) => $state)->openUrlInNewTab()->limit(20)->extraAttributes(['class' => 'break-all']),
                            Infolists\Components\TextEntry::make('address')->icon('heroicon-m-map-pin')->size('xs')->color('gray')->extraAttributes(['class' => 'whitespace-normal']),
                            Infolists\Components\TextEntry::make('country')->badge(),
                        ]),

                ])->columnSpan(['default' => 12, 'lg' => 4]),

            ]),
        ];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNominations::route('/'),
            'view' => Pages\ViewNomination::route('/{record}'),
        ];
    }
}
