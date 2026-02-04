<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EvaluationCriterionResource\Pages;
use App\Filament\Resources\EvaluationCriterionResource\RelationManagers;
use App\Models\EvaluationCriterion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EvaluationCriterionResource extends Resource
{
    protected static ?string $model = EvaluationCriterion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('phase')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(6)
                    ->label('Phase (1-6)'),
                Forms\Components\Select::make('grade_letter')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                    ])
                    ->required()
                    ->label('Grade Letter'),
                Forms\Components\TextInput::make('label')
                    ->required()
                    ->maxLength(255)
                    ->label('Label (e.g., Foundational)'),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('min_score')
                    ->numeric()
                    ->step(0.01)
                    ->label('Min Score'),
                Forms\Components\TextInput::make('max_score')
                    ->numeric()
                    ->step(0.01)
                    ->label('Max Score'),
                Forms\Components\Toggle::make('is_rejection')
                    ->label('Is Rejection Criteria?')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('phase')
                    ->sortable(),
                Tables\Columns\TextColumn::make('grade_letter')
                    ->badge()
                    ->colors([
                        'success' => 'A',
                        'info' => 'B',
                        'warning' => 'C',
                        'danger' => 'D',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('label')
                    ->searchable(),
                Tables\Columns\TextColumn::make('min_score')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_score')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_rejection')
                    ->boolean()
                    ->label('Rejection?'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('phase')
                    ->options([
                        1 => 'Phase 1',
                        2 => 'Phase 2',
                        3 => 'Phase 3',
                        4 => 'Phase 4',
                        5 => 'Phase 5',
                        6 => 'Phase 6',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('phase', 'asc');
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
            'index' => Pages\ListEvaluationCriteria::route('/'),
            'create' => Pages\CreateEvaluationCriterion::route('/create'),
            'edit' => Pages\EditEvaluationCriterion::route('/{record}/edit'),
        ];
    }
}
