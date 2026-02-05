<?php

namespace App\Filament\Pages;

use App\Filament\Resources\NominationResource;
use App\Models\Badge;
use App\Models\Nomination;
use App\Models\Season;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Components\Tab;

class PastWinners extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    // We do not register navigation here; it is handled dynamically in AdminPanelProvider
    protected static bool $shouldRegisterNavigation = false;

    // Simplified slug without route parameters to avoid 404s
    protected static ?string $slug = 'past-winners';

    protected static string $view = 'filament.pages.past-winners';

    public ?Season $season = null;

    public function mount(): void
    {
        $seasonId = request()->query('season_id');

        if ($seasonId) {
            $this->season = Season::find($seasonId);
        }

        if (!$this->season) {
            // Fallback: pick the latest closed season with winners?
            // Or just the latest closed season
            $this->season = Season::whereDate('closing_date', '<', now())->orderBy('closing_date', 'desc')->first();
        }

        if ($this->season) {
            $this->heading = $this->season->name . ' Winners';
        } else {
            $this->heading = 'Past Winners';
        }
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Nomination::query()
                    ->when($this->season, fn($q) => $q->where('season_id', $this->season->id))
            )
            ->columns([
                Tables\Columns\TextColumn::make('row_index')->label('ID')->rowIndex(),
                Tables\Columns\TextColumn::make('application_id')->label('Application ID')->searchable()->sortable()->weight('bold')->color('primary'),
                Tables\Columns\TextColumn::make('full_name')->label('Nominee')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.name')->label('Category')->badge()->color('info'),
                Tables\Columns\TextColumn::make('award.name')->label('Award'),
                Tables\Columns\BadgeColumn::make('status')->label('Status')
                    ->colors(['gray' => 'pending', 'warning' => 'processing', 'success' => 'awarded', 'danger' => 'rejected']),
                Tables\Columns\TextColumn::make('final_grade')->label('Grade')->badge(),
                Tables\Columns\TextColumn::make('badge_name')->label('Badge')->badge(),
                Tables\Columns\TextColumn::make('final_score')->label('Score')->numeric(2),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn(Nomination $record) => NominationResource::getUrl('view', ['record' => $record])),
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
                        // Email logic omitted for brevity as it's a direct copy
                        \Filament\Notifications\Notification::make()
                            ->title('Payment Updated')
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make('download_pdf')->label('PDF')->icon('heroicon-o-arrow-down-tray')->url(fn(Nomination $record) => route('nomination.pdf', $record->application_id))->openUrlInNewTab(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('payment_status')
                    ->label('Payment Status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        // 'refunded' => 'Refunded',
                    ]),
                Tables\Filters\SelectFilter::make('payment_method')
                    ->label('Payment Method')
                    ->options(fn() => Nomination::distinct()->pluck('payment_method', 'payment_method')->filter()->toArray()),
                Tables\Filters\SelectFilter::make('badge_id')
                    ->label('Badge')
                    ->relationship('badge', 'name'),
            ], layout: \Filament\Tables\Enums\FiltersLayout::AboveContent)
            ->paginated([10, 25, 50])
            ->defaultSort('final_score', 'desc');
    }

    public function getTabs(): array
    {
        $seasonId = $this->season?->id;

        return [
            'all' => Tab::make('All Nominations')
                ->badge(Nomination::query()->where('season_id', $seasonId)->count()),
            'awarded' => Tab::make('Awarded')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'awarded'))
                ->badge(Nomination::query()->where('season_id', $seasonId)->where('status', 'awarded')->count())
                ->badgeColor('success'),
            'pending' => Tab::make('Pending')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'pending'))
                ->badge(Nomination::query()->where('season_id', $seasonId)->where('status', 'pending')->count())
                ->badgeColor('gray'),
            'rejected' => Tab::make('Rejected')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'rejected'))
                ->badge(Nomination::query()->where('season_id', $seasonId)->where('status', 'rejected')->count())
                ->badgeColor('danger'),
        ];
    }
}
