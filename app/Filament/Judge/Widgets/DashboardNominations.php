<?php

namespace App\Filament\Judge\Widgets;

use App\Filament\Judge\Resources\NominationResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;

class DashboardNominations extends BaseWidget
{
    #[Url]
    public ?string $status = null;

    #[Url]
    public ?int $season = null;

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2; // Below stats

    public function table(Table $table): Table
    {
        return $table
            ->query(
                NominationResource::getEloquentQuery()
            )
            ->modifyQueryUsing(function ($query) {
                $status = $this->status;
                $season = $this->season;

                if ($season) {
                    $query->where('season_id', $season);
                }

                if ($status === 'reviewed') {
                    // User Request: Reviewed = Awarded + Rejected
                    $query->whereIn('status', ['awarded', 'rejected']);
                } elseif ($status === 'pending') {
                    // User Request: Pending = Status Pending
                    $query->where('status', 'pending');
                } elseif ($status === 'awarded') {
                    $query->where('status', 'awarded');
                } elseif ($status === 'rejected') {
                    $query->where('status', 'rejected');
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('application_id')
                    ->label('ID')
                    ->searchable()
                    ->weight('bold')
                    ->color('primary'),
                    
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nominee')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                Tables\Columns\TextColumn::make('award.name')
                    ->label('Award')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'gray' => 'pending', 
                        'warning' => 'processing', 
                        'success' => 'awarded', 
                        'danger' => 'rejected'
                    ]),

                Tables\Columns\IconColumn::make('evaluation_status')
                    ->label('Reviewed?')
                    ->boolean()
                    ->getStateUsing(fn ($record) => $record->evaluation()->exists())
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-clock')
                    ->trueColor('success')
                    ->falseColor('gray'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('Review')
                    ->icon('heroicon-m-eye')
                    ->url(fn ($record) => NominationResource::getUrl('view', ['record' => $record])),
            ])
            ->heading(function () {
                 $status = $this->status ?? 'All';
                 return ucfirst($status) . ' Nominations';
            });
    }
}
