<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItrNominationInvoiceResource\Pages;
use App\Models\Nomination;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class ItrNominationInvoiceResource extends Resource
{
    protected static ?string $model = Nomination::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'ITR Nomination Invoice';

    protected static ?string $modelLabel = 'ITR Nomination Invoice';

    protected static ?string $navigationGroup = 'Payments';

    protected static ?int $navigationSort = 3;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\TextColumn::make('itr_invoice_no')
                        ->label('ITR Invoice No')
                        ->weight('bold')
                        ->color('primary')
                        ->size('lg'),
                    Tables\Columns\TextColumn::make('full_name')
                        ->label('Nominee')
                        ->icon('heroicon-m-user'),
                    Tables\Columns\TextColumn::make('amount_paid')
                        ->label('Amount Paid')
                        ->money('USD')
                        ->color('success')
                        ->weight('bold'),
                    Tables\Columns\TextColumn::make('paid_at')
                        ->label('Paid At')
                        ->dateTime('d M Y, h:i A')
                        ->color('gray')
                        ->size('xs'),
                ])->space(3),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->groups([
                Tables\Grouping\Group::make('month_year')
                    ->label('Paid Period')
                    ->titlePrefixedWithLabel(false)
                    ->getTitleFromRecordUsing(function (Nomination $record): string {
                        if (! $record->paid_at) {
                            return 'UNPAID';
                        }
                        $start = $record->paid_at->copy()->startOfMonth();
                        $end = $record->paid_at->copy()->endOfMonth();
                        $dateRange = $start->format('M jS').' to '.$end->format('M jS');

                        return strtoupper($dateRange);
                    })
                    ->collapsible(),
            ])
            ->defaultGroup('month_year')
            ->groupingSettingsHidden()
            ->groupingDirectionSettingHidden()
            ->filtersFormColumns(1)
            ->filters([
                Filter::make('paid_at')
                    ->form([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                DatePicker::make('paid_from')
                                    ->label('Paid From')
                                    ->native(false)
                                    ->displayFormat('d M Y')
                                    ->prefixIcon('heroicon-m-calendar'),
                                DatePicker::make('paid_until')
                                    ->label('Paid Until')
                                    ->native(false)
                                    ->displayFormat('d M Y')
                                    ->prefixIcon('heroicon-m-calendar'),
                            ]),
                        Forms\Components\Placeholder::make('styles')
                            ->hiddenLabel()
                            ->content(new \Illuminate\Support\HtmlString('
                                <style>
                                    .fi-ta-header-ctn {
                                        border-bottom: 1px solid #e2e8f0 !important;
                                        padding-bottom: 0.5rem !important;
                                    }
                                    .fi-ta-group-header {
                                        background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%) !important;
                                        border-left: 6px solid #4f46e5 !important;
                                        border-radius: 0 16px 16px 0 !important;
                                        margin: 1.5rem 0 1rem 0 !important;
                                        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
                                        padding: 1.25rem 2rem !important;
                                        transition: all 0.3s ease !important;
                                    }
                                    .fi-ta-group-header:hover {
                                        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) !important;
                                        transform: translateX(4px) !important;
                                    }
                                    .fi-ta-group-header h4 {
                                        color: #1e1b4b !important;
                                        font-weight: 800 !important;
                                        letter-spacing: -0.025em !important;
                                        font-size: 1rem !important;
                                        display: flex !important;
                                        align-items: center !important;
                                    }
                                    .fi-ta-group-header h4::before {
                                        content: "BILLING CYCLE";
                                        background: #4f46e5;
                                        color: white;
                                        padding: 2px 8px;
                                        border-radius: 6px;
                                        font-size: 0.65rem;
                                        letter-spacing: 0.1em;
                                        margin-right: 1rem;
                                        font-weight: 900;
                                    }
                                </style>
                            ')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['paid_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('paid_at', '>=', $date),
                            )
                            ->when(
                                $data['paid_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('paid_at', '<=', $date),
                            );
                    }),
            ], layout: Tables\Enums\FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\Action::make('view_pdf')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn (Nomination $record) => $record->itr_invoice_path ? Storage::disk('public')->url($record->itr_invoice_path) : null)
                    ->openUrlInNewTab()
                    ->visible(fn (Nomination $record) => ! empty($record->itr_invoice_path)),
                Tables\Actions\Action::make('download_pdf')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->url(fn (Nomination $record) => $record->itr_invoice_path ? Storage::disk('public')->url($record->itr_invoice_path) : null)
                    ->extraAttributes(['download' => ''])
                    ->visible(fn (Nomination $record) => ! empty($record->itr_invoice_path)),
            ])
            ->bulkActions([]);
        // ->defaultSort('paid_at', 'desc');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereNotNull('itr_invoice_no')
            ->select('*')
            ->selectRaw("DATE_FORMAT(paid_at, '%Y-%m') as month_year");
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItrNominationInvoices::route('/'),
        ];
    }
}
