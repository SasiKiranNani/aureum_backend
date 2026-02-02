<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JudgeApplicationResource\Pages;
use App\Models\JudgeApplication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class JudgeApplicationResource extends Resource
{
    protected static ?string $model = JudgeApplication::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Review Details')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                            ])
                            ->required(),
                        Forms\Components\Textarea::make('remarks')
                            ->placeholder('Enter rejection remarks if any...')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_pic')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('approve')
                    ->action(function ($record) {
                        $record->update(['status' => 'approved']);

                        $user = \App\Models\User::firstOrCreate(
                            ['email' => $record->email],
                            [
                                'name' => $record->name,
                                'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(10)),
                            ]
                        );

                        // Check if role exists before assigning
                        if (\Spatie\Permission\Models\Role::where('name', 'judge')->exists()) {
                            $user->assignRole('judge');
                        }

                        \Filament\Notifications\Notification::make()
                            ->title('Application Approved')
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn ($record) => $record->status === 'pending'),
                Tables\Actions\Action::make('reject')
                    ->form([
                        Forms\Components\Textarea::make('remarks')
                            ->required(),
                    ])
                    ->action(function ($record, array $data) {
                        $record->update([
                            'status' => 'rejected',
                            'remarks' => $data['remarks'],
                        ]);

                        \Filament\Notifications\Notification::make()
                            ->title('Application Rejected')
                            ->danger()
                            ->send();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->visible(fn ($record) => $record->status === 'pending'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('Profile Information')
                    ->headerActions([
                        \Filament\Infolists\Components\Actions\Action::make('status')
                            ->label(fn ($record) => strtoupper($record->status))
                            ->badge()
                            ->color(fn ($record) => match ($record->status) {
                                'pending' => 'warning',
                                'approved' => 'success',
                                'rejected' => 'danger',
                            }),
                    ])
                    ->schema([
                        \Filament\Infolists\Components\Split::make([
                            \Filament\Infolists\Components\Grid::make(2)
                                ->schema([
                                    \Filament\Infolists\Components\Group::make([
                                        \Filament\Infolists\Components\TextEntry::make('name')
                                            ->weight(\Filament\Support\Enums\FontWeight::Bold)
                                            ->size(\Filament\Infolists\Components\TextEntry\TextEntrySize::Large),
                                        \Filament\Infolists\Components\TextEntry::make('email')
                                            ->icon('heroicon-m-envelope'),
                                        \Filament\Infolists\Components\TextEntry::make('phone')
                                            ->icon('heroicon-m-phone'),
                                        \Filament\Infolists\Components\TextEntry::make('linkedin')
                                            ->label('LinkedIn Profile')
                                            ->url(fn ($record) => $record->linkedin)
                                            ->openUrlInNewTab()
                                            ->icon('heroicon-m-link')
                                            ->color('primary'),
                                    ]),
                                    \Filament\Infolists\Components\Group::make([
                                        \Filament\Infolists\Components\TextEntry::make('present_designation')
                                            ->label('Current Designation'),
                                        \Filament\Infolists\Components\TextEntry::make('working_company_name')
                                            ->label('Company'),
                                        \Filament\Infolists\Components\TextEntry::make('years_of_experience')
                                            ->label('Experience')
                                            ->suffix(' Years'),
                                        \Filament\Infolists\Components\TextEntry::make('category.name')
                                            ->label('Applying for Category')
                                            ->badge(),
                                    ]),
                                ]),
                            \Filament\Infolists\Components\ImageEntry::make('profile_pic')
                                ->hiddenLabel()
                                ->circular()
                                ->grow(false)
                                ->width(150),
                        ])->from('lg'),
                    ]),

                \Filament\Infolists\Components\Grid::make(3)
                    ->schema([
                        \Filament\Infolists\Components\Section::make('Address Details')
                            ->schema([
                                \Filament\Infolists\Components\TextEntry::make('address'),
                                \Filament\Infolists\Components\TextEntry::make('city'),
                                \Filament\Infolists\Components\TextEntry::make('state'),
                                \Filament\Infolists\Components\TextEntry::make('country'),
                                \Filament\Infolists\Components\TextEntry::make('postal'),
                            ])->columns(2)->columnSpan(2),
                        \Filament\Infolists\Components\Section::make('Bio')
                            ->schema([
                                \Filament\Infolists\Components\TextEntry::make('bio')
                                    ->markdown(),
                            ])->columnSpan(1),
                    ]),

                \Filament\Infolists\Components\Section::make('Category Specific Answers')
                    ->schema([
                        \Filament\Infolists\Components\RepeatableEntry::make('judgeAnswers')
                            ->schema([
                                \Filament\Infolists\Components\TextEntry::make('categoryJudgeQuestion.question_text')
                                    ->label('Question')
                                    ->weight(\Filament\Support\Enums\FontWeight::Bold),
                                \Filament\Infolists\Components\TextEntry::make('answer')
                                    ->prose(),
                            ])->columns(1),
                    ])->visible(fn ($record) => $record->judgeAnswers()->exists()),

                \Filament\Infolists\Components\Section::make('Uploaded Documents')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(2)
                            ->schema([
                                \Filament\Infolists\Components\RepeatableEntry::make('documents')
                                    ->label('Files')
                                    ->schema([
                                        \Filament\Infolists\Components\TextEntry::make('file')
                                            ->label('Filename')
                                            ->icon('heroicon-m-document-text')
                                            ->url(fn ($state) => asset('storage/'.$state))
                                            ->openUrlInNewTab()
                                            ->color('primary'),
                                    ])->columns(1),
                                \Filament\Infolists\Components\RepeatableEntry::make('document_urls')
                                    ->label('External URLs')
                                    ->schema([
                                        \Filament\Infolists\Components\TextEntry::make('url')
                                            ->label('Link')
                                            ->icon('heroicon-m-globe-alt')
                                            ->url(fn ($state) => $state)
                                            ->openUrlInNewTab()
                                            ->color('primary'),
                                    ])->columns(1),
                            ]),
                    ]),

                \Filament\Infolists\Components\Section::make('Admin Remarks')
                    ->visible(fn ($record) => $record->status === 'rejected')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('remarks')
                            ->color('danger'),
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJudgeApplications::route('/'),
            'create' => Pages\CreateJudgeApplication::route('/create'),
            'view' => Pages\ViewJudgeApplication::route('/{record}'),
            'edit' => Pages\EditJudgeApplication::route('/{record}/edit'),
        ];
    }
}
