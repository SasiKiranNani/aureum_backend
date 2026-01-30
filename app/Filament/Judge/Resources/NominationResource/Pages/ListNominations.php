<?php

namespace App\Filament\Judge\Resources\NominationResource\Pages;

use App\Filament\Judge\Resources\NominationResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Nomination;

class ListNominations extends ListRecords
{
    protected static string $resource = NominationResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Nominations'),

            'pending' => Tab::make('Pending')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'pending'))
                ->badge(fn() => Nomination::where('judge_id', auth()->id())->where('status', 'pending')->count())
                ->badgeColor('gray'),

            'processing' => Tab::make('Processing')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'processing'))
                ->badge(fn() => Nomination::where('judge_id', auth()->id())->where('status', 'processing')->count())
                ->badgeColor('warning'),

            'awarded' => Tab::make('Awarded')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'awarded'))
                ->badge(fn() => Nomination::where('judge_id', auth()->id())->where('status', 'awarded')->count())
                ->badgeColor('success'),

            'rejected' => Tab::make('Rejected')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'rejected'))
                ->badge(fn() => Nomination::where('judge_id', auth()->id())->where('status', 'rejected')->count())
                ->badgeColor('danger'),
        ];
    }
}
