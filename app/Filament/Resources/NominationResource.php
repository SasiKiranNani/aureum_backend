<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NominationResource\Pages;
use App\Models\Nomination;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Builder;

class NominationResource extends Resource
{
    protected static ?string $model = Nomination::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    
    protected static ?string $navigationLabel = 'Nominations';
    
    protected static ?string $modelLabel = 'Nomination';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Form is not needed as nominations are created from frontend
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('application_id')
                    ->label('Application ID')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold')
                    ->color('primary'),
                    
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nominee Name')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                    
                Tables\Columns\TextColumn::make('award.name')
                    ->label('Award')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                    
                Tables\Columns\BadgeColumn::make('payment_status')
                    ->label('Payment Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'completed',
                        'danger' => 'failed',
                        'secondary' => 'refunded',
                    ])
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Submitted On')
                    ->dateTime('M d, Y h:i A')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->label('Category'),
                    
                Tables\Filters\SelectFilter::make('award')
                    ->relationship('award', 'name')
                    ->label('Award'),
                    
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ])
                    ->label('Payment Status'),
                    
                Tables\Filters\SelectFilter::make('season')
                    ->relationship('season', 'name')
                    ->label('Season'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('download_pdf')
                    ->label('Download PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (Nomination $record): string => route('nomination.pdf', $record->application_id))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Application Information')
                    ->schema([
                        Infolists\Components\TextEntry::make('application_id')
                            ->label('Application ID')
                            ->size('lg')
                            ->weight('bold')
                            ->color('primary')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Submission Date')
                            ->dateTime('F d, Y \a\t h:i A'),
                    ])
                    ->columns(2),
                    
                Infolists\Components\Section::make('Nominee Details')
                    ->schema([
                        Infolists\Components\ImageEntry::make('headshot')
                            ->label('Professional Headshot')
                            ->height(150)
                            ->defaultImageUrl(url('/images/default-avatar.png')),
                        Infolists\Components\TextEntry::make('nominee_type')
                            ->label('Nominee Type')
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => ucfirst(str_replace('_', ' ', $state))),
                        Infolists\Components\TextEntry::make('full_name')
                            ->label('Full Name'),
                        Infolists\Components\TextEntry::make('organization')
                            ->label('Organization')
                            ->default('N/A'),
                        Infolists\Components\TextEntry::make('email')
                            ->label('Email')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('phone')
                            ->label('Phone')
                            ->copyable(),
                        Infolists\Components\TextEntry::make('country')
                            ->label('Country'),
                        Infolists\Components\TextEntry::make('industry')
                            ->label('Industry'),
                        Infolists\Components\TextEntry::make('workforce_size')
                            ->label('Workforce Size')
                            ->default('N/A'),
                        Infolists\Components\TextEntry::make('address')
                            ->label('Address')
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('linkedin_url')
                            ->label('LinkedIn Profile')
                            ->url(fn ($state) => $state)
                            ->openUrlInNewTab()
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
                    
                Infolists\Components\Section::make('Award Application')
                    ->schema([
                        Infolists\Components\TextEntry::make('category.name')
                            ->label('Category')
                            ->badge()
                            ->color('info'),
                        Infolists\Components\TextEntry::make('award.name')
                            ->label('Award')
                            ->badge()
                            ->color('success'),
                        Infolists\Components\TextEntry::make('eligibility_justification')
                            ->label('Eligibility Justification')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                    
                Infolists\Components\Section::make('Contribution Overview')
                    ->schema([
                        Infolists\Components\TextEntry::make('contribution_title')
                            ->label('Contribution Title')
                            ->size('lg')
                            ->weight('bold'),
                        Infolists\Components\TextEntry::make('timeframe')
                            ->label('Timeframe')
                            ->columnSpanFull(),
                        Infolists\Components\RepeatableEntry::make('answers')
                            ->label('Category-Specific Questions')
                            ->schema([
                                Infolists\Components\TextEntry::make('nomineeQuestion.question')
                                    ->label('Question')
                                    ->weight('bold'),
                                Infolists\Components\TextEntry::make('answer')
                                    ->label('Answer'),
                            ])
                            ->columnSpanFull()
                            ->visible(fn ($record) => $record->answers->count() > 0),
                    ])
                    ->columns(1),
                    
                Infolists\Components\Section::make('Evidence & References')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('evidence')
                            ->label('Evidence Files & Links')
                            ->schema([
                                Infolists\Components\Grid::make(4)
                                    ->schema([
                                        Infolists\Components\TextEntry::make('type')
                                            ->badge()
                                            ->color(fn (string $state): string => match ($state) {
                                                'file' => 'success',
                                                'link' => 'info',
                                            }),
                                        Infolists\Components\TextEntry::make('file_name')
                                            ->label('File Name')
                                            ->visible(fn ($record) => $record->type === 'file'),
                                        Infolists\Components\TextEntry::make('reference_url')
                                            ->label('Reference URL')
                                            ->url(fn ($state) => $state)
                                            ->openUrlInNewTab()
                                            ->visible(fn ($record) => $record->type === 'link')
                                            ->formatStateUsing(fn ($state) => 'Open Link'),
                                        Infolists\Components\Actions::make([
                                            Infolists\Components\Actions\Action::make('view')
                                                ->label('View')
                                                ->icon('heroicon-m-eye')
                                                ->color('success')
                                                ->url(fn ($record) => $record->file_url)
                                                ->openUrlInNewTab(),
                                            Infolists\Components\Actions\Action::make('download')
                                                ->label('Download')
                                                ->icon('heroicon-m-arrow-down-tray')
                                                ->color('primary')
                                                ->url(fn ($record) => route('nomination.evidence.download', $record->id)),
                                        ])
                                        ->visible(fn ($record) => $record->type === 'file')
                                        ->alignEnd(),
                                    ])
                            ])
                            ->columnSpanFull()
                            ->visible(fn ($record) => $record->evidence->count() > 0),
                    ])
                    ->collapsible(),
                    
                Infolists\Components\Section::make('Compliance Information')
                    ->schema([
                        Infolists\Components\TextEntry::make('sensitive_data')
                            ->label('Use of Sensitive Data')
                            ->badge()
                            ->color(fn (string $state): string => $state === 'yes' ? 'warning' : 'success'),
                        Infolists\Components\TextEntry::make('controversies')
                            ->label('Past Public Controversies')
                            ->badge()
                            ->color(fn (string $state): string => $state === 'yes' ? 'danger' : 'success'),
                        Infolists\Components\TextEntry::make('industry_influence')
                            ->label('Influence on Industry')
                            ->badge()
                            ->color(fn (string $state): string => $state === 'yes' ? 'success' : 'warning'),
                    ])
                    ->columns(3)
                    ->collapsible(),
                    
                Infolists\Components\Section::make('Payment Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('payment_status')
                            ->label('Payment Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'warning',
                                'completed' => 'success',
                                'failed' => 'danger',
                                'refunded' => 'secondary',
                            }),
                        Infolists\Components\TextEntry::make('payment_method')
                            ->label('Payment Method')
                            ->formatStateUsing(fn ($state) => ucfirst($state ?? 'N/A'))
                            ->default('N/A'),
                        Infolists\Components\TextEntry::make('award.amount')
                            ->label('Award Price')
                            ->money('USD'),
                        Infolists\Components\TextEntry::make('admin_fee')
                            ->label('Admin Fee')
                            ->money('USD'),
                        Infolists\Components\TextEntry::make('discount_applied')
                            ->label('Discount Applied')
                            ->money('USD')
                            ->color('danger'),
                        Infolists\Components\TextEntry::make('amount_paid')
                            ->label('Total Paid')
                            ->money('USD')
                            ->size('lg')
                            ->weight('bold')
                            ->color('success'),
                    ])
                    ->columns(3),

                Infolists\Components\Section::make('Transaction History')
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('payments')
                            ->label('Payment Records')
                            ->schema([
                                Infolists\Components\TextEntry::make('transaction_id')
                                    ->label('Transaction ID')
                                    ->copyable(),
                                Infolists\Components\TextEntry::make('paymentGateway.name')
                                    ->label('Gateway'),
                                Infolists\Components\TextEntry::make('amount_usd')
                                    ->label('Amount (USD)')
                                    ->money('USD'),
                                Infolists\Components\TextEntry::make('status')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'completed' ? 'success' : 'danger'),
                                Infolists\Components\TextEntry::make('created_at')
                                    ->label('Date')
                                    ->dateTime(),
                            ])
                            ->columns(5)
                    ])
                    ->visible(fn ($record) => $record->payments->count() > 0)
                    ->collapsible(),
            ]);
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
