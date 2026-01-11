<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeasonResource\Pages;
use App\Filament\Resources\SeasonResource\RelationManagers;
use App\Models\Season;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeasonResource extends Resource
{
    protected static ?string $model = Season::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Season Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Season Details')
                    ->description('Manage season duration and application deadlines.')
                    ->icon('heroicon-o-calendar')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->placeholder('e.g., Summer 2026'),
                        
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\DatePicker::make('opening_date')
                                    ->required()
                                    ->prefixIcon('heroicon-o-calendar-days'),
                                Forms\Components\DatePicker::make('closing_date')
                                    ->required()
                                    ->afterOrEqual('opening_date')
                                    ->prefixIcon('heroicon-o-calendar-days')
                                    ->rule(function ($get, $record) {
                                        return function (string $attribute, $value, \Closure $fail) use ($get, $record) {
                                            $opening = $get('opening_date');
                                            $closing = $value;
                                            if ($opening && $closing) {
                                                $exists = Season::where('id', '!=', $record?->id)
                                                    ->where(function ($query) use ($opening, $closing) {
                                                        $query->whereBetween('opening_date', [$opening, $closing])
                                                            ->orWhereBetween('closing_date', [$opening, $closing])
                                                            ->orWhere(function ($q) use ($opening, $closing) {
                                                                $q->where('opening_date', '<=', $opening)
                                                                    ->where('closing_date', '>=', $closing);
                                                            });
                                                    })->exists();

                                                if ($exists) {
                                                    $fail("The selected date range overlaps with another existing season.");
                                                }
                                            }
                                        };
                                    }),
                            ])->columns(2)->columnSpanFull(),

                        Forms\Components\DatePicker::make('application_deadline_date')
                            ->label('Application Deadline')
                            ->required()
                            ->beforeOrEqual('closing_date')
                            ->prefixIcon('heroicon-o-clock')
                            ->helperText('Applications cannot be submitted after this date.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active')
                    ->sortable()
                    ->disabled(fn (Season $record) => !now()->between($record->opening_date, $record->closing_date)),
                Tables\Columns\TextColumn::make('opening_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('closing_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('application_deadline_date')
                    ->label('Deadline')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeasons::route('/'),
        ];
    }
}
