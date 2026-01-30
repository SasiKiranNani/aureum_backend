<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsroomResource\Pages;
use App\Filament\Resources\NewsroomResource\RelationManagers;
use App\Models\Newsroom;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Kahusoftware\FilamentCkeditorField\CKEditor;

class NewsroomResource extends Resource
{
    protected static ?string $model = Newsroom::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('newsroom'),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                CKEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')->label('Status'),
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
            'index' => Pages\ListNewsrooms::route('/'),
            'create' => Pages\CreateNewsroom::route('/create'),
            'edit' => Pages\EditNewsroom::route('/{record}/edit'),
        ];
    }
}
