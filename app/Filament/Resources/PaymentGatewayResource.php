<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentGatewayResource\Pages;
use App\Filament\Resources\PaymentGatewayResource\RelationManagers;
use App\Models\PaymentGateway;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentGatewayResource extends Resource
{
    protected static ?string $model = PaymentGateway::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Gateway Configuration')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General Settings')
                            ->schema([
                                Forms\Components\Grid::make(3)
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Select::make('mode')
                                            ->options(\App\Enums\PaymentGatewayMode::class)
                                            ->required(),
                                        Forms\Components\TextInput::make('currency')
                                            ->required()
                                            ->default('USD'),
                                        Forms\Components\TextInput::make('discount')
                                            ->numeric()
                                            ->prefix('%')
                                            ->default(0),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Credentials')
                            ->schema([
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('key')
                                            ->label('Public Key / Key ID')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('secret')
                                            ->label('Secret Key')
                                            ->password()
                                            ->revealable()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('webhook_id')
                                            ->label('Webhook ID / Secret')
                                            ->maxLength(255)
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mode')
                    ->badge(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Status'),
                Tables\Columns\TextColumn::make('currency')
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount')
                    ->formatStateUsing(fn ($state) => $state . '%')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('has_invoice')
                    ->label('Invoice'),
                Tables\Columns\ToggleColumn::make('has_itr_invoice')
                    ->label('ITR'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('mode')
                    ->options(\App\Enums\PaymentGatewayMode::class),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePaymentGateways::route('/'),
        ];
    }
}
