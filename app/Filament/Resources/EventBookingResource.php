<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventBookingResource\Pages;
use App\Models\EventBooking;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EventBookingResource extends Resource
{
    protected static ?string $model = EventBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationLabel = 'Event Bookings';

    protected static ?string $modelLabel = 'Event Booking';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            //
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('booking_id')
                    ->label('Booking ID')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->color('primary'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('event.title')
                    ->label('Event')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('ticket_number')
                    ->label('Ticket #')
                    ->searchable()
                    ->fontFamily('font-mono'),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('payment_status')
                    ->label('Status')
                    ->colors([
                        'gray' => 'pending',
                        'success' => 'paid',
                        'danger' => 'failed',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Booked At')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('event')
                    ->relationship('event', 'title'),
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Booking Information')
                    ->schema([
                        Infolists\Components\Grid::make(2)->schema([
                            Infolists\Components\TextEntry::make('booking_id')
                                ->label('Booking ID')
                                ->weight('bold')
                                ->color('primary'),
                            Infolists\Components\TextEntry::make('ticket_number')
                                ->label('Ticket Number')
                                ->fontFamily('font-mono'),
                            Infolists\Components\TextEntry::make('user.name')->label('Customer Name'),
                            Infolists\Components\TextEntry::make('user.email')->label('Customer Email'),
                            Infolists\Components\TextEntry::make('event.title')->label('Event'),
                            Infolists\Components\TextEntry::make('event.event_date')
                                ->label('Event Date')
                                ->dateTime('M d, Y'),
                        ]),
                    ]),
                Infolists\Components\Section::make('Payment Details')
                    ->schema([
                        Infolists\Components\Grid::make(2)->schema([
                            Infolists\Components\TextEntry::make('amount')
                                ->label('Amount Paid')
                                ->money('USD'),
                            Infolists\Components\TextEntry::make('payment_status')
                                ->label('Status')
                                ->badge()
                                ->color(fn ($state) => match ($state) {
                                    'paid' => 'success',
                                    'failed' => 'danger',
                                    default => 'warning'
                                }),
                            Infolists\Components\TextEntry::make('payment_gateway')->label('Gateway'),
                            Infolists\Components\TextEntry::make('transaction_id')->label('Transaction ID'),
                            Infolists\Components\TextEntry::make('paid_at')
                                ->label('Paid At')
                                ->dateTime('M d, Y H:i'),
                        ]),
                    ]),
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
            'index' => Pages\ListEventBookings::route('/'),
            'view' => Pages\ViewEventBooking::route('/{record}'),
        ];
    }
}
