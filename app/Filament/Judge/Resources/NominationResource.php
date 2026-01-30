<?php

namespace App\Filament\Judge\Resources;

use App\Filament\Judge\Resources\NominationResource\Pages;
use App\Models\Nomination;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Builder;

class NominationResource extends Resource
{
    protected static ?string $model = Nomination::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?string $navigationLabel = 'My Nominations';

    protected static ?string $modelLabel = 'Nomination';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('judge_id', auth()->id());
    }

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('application_id')->label('ID')->searchable()->sortable()->weight('bold')->color('primary'),
                Tables\Columns\TextColumn::make('full_name')->label('Nominee')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.name')->label('Category')->badge()->color('info'),
                Tables\Columns\TextColumn::make('award.name')->label('Award'),
                Tables\Columns\BadgeColumn::make('status')->label('Status')
                    ->colors(['gray' => 'pending', 'warning' => 'processing', 'success' => 'awarded', 'danger' => 'rejected']),
                Tables\Columns\TextColumn::make('created_at')->label('Submitted')->dateTime('M d, Y'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('download_pdf')->label('PDF')->icon('heroicon-o-arrow-down-tray')->url(fn(Nomination $record) => route('nomination.pdf', $record->application_id))->openUrlInNewTab(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema(\App\Filament\Resources\NominationResource::getInfolistSchema());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNominations::route('/'),
            'view' => Pages\ViewNomination::route('/{record}'),
        ];
    }
}
