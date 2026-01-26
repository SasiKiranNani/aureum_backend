<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use Spatie\Permission\Models\Role;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    protected static ?string $navigationGroup = 'User & Roles Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Role Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\Select::make('guard_name')
                            ->options([
                                'web' => 'Web',
                                'api' => 'API',
                            ])
                            ->default('web')
                            ->required(),
                    ])->columns(2),

                Forms\Components\Tabs::make('Permissions Grouped')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Resources')
                            ->badge(function () {
                                return \Spatie\Permission\Models\Permission::where(function ($query) {
                                    $resources = ['user', 'role', 'permission', 'season', 'category', 'award', 'badge', 'admin::fee'];
                                    foreach ($resources as $resource) {
                                        $query->orWhere('name', 'like', "%_{$resource}");
                                    }
                                })->count();
                            })
                            ->icon('heroicon-o-lock-closed')
                            ->schema([
                                Forms\Components\Grid::make([
                                    'default' => 1,
                                    'sm' => 2,
                                    'lg' => 2,
                                ])
                                ->schema([
                                    static::getResourcePermissionSection('User', 'user'),
                                    static::getResourcePermissionSection('Role', 'role'),
                                    static::getResourcePermissionSection('Permission', 'permission'),
                                    static::getResourcePermissionSection('Season', 'season'),
                                    static::getResourcePermissionSection('Category', 'category'),
                                    static::getResourcePermissionSection('Award', 'award'),
                                    static::getResourcePermissionSection('Badge', 'badge'),
                                    static::getResourcePermissionSection('Admin Fee', 'admin::fee'),
                                ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('Pages')
                            ->badge(fn() => \Spatie\Permission\Models\Permission::where('name', 'like', 'view_page_%')->count())
                            ->schema([
                                Forms\Components\CheckboxList::make('permissions')
                                    ->relationship('permissions', 'name', modifyQueryUsing: fn($query) => $query->where('name', 'like', 'view_page_%'))
                                    ->getOptionLabelFromRecordUsing(fn($record) => ucwords(str_replace(['view_page_', '_'], ['', ' '], $record->name)))
                                    ->columns(2),
                            ]),
                        Forms\Components\Tabs\Tab::make('Widgets')
                            ->badge(fn() => \Spatie\Permission\Models\Permission::where('name', 'like', 'view_widget_%')->count())
                            ->schema([
                                Forms\Components\CheckboxList::make('permissions')
                                    ->relationship('permissions', 'name', modifyQueryUsing: fn($query) => $query->where('name', 'like', 'view_widget_%'))
                                    ->getOptionLabelFromRecordUsing(fn($record) => ucwords(str_replace(['view_widget_', '_'], ['', ' '], $record->name)))
                                    ->columns(2),
                            ]),
                        Forms\Components\Tabs\Tab::make('Custom Permissions')
                            ->badge(function () {
                                $resources = ['user', 'role', 'permission', 'season', 'category', 'award', 'badge', 'admin::fee'];
                                return \Spatie\Permission\Models\Permission::where('name', 'not like', 'view_page_%')
                                    ->where('name', 'not like', 'view_widget_%')
                                    ->where(function ($query) use ($resources) {
                                        foreach ($resources as $resource) {
                                            $query->where('name', 'not like', "%_{$resource}");
                                        }
                                    })->count();
                            })
                            ->schema([
                                Forms\Components\CheckboxList::make('permissions')
                                    ->relationship('permissions', 'name', modifyQueryUsing: function ($query) {
                                        $resources = ['user', 'role', 'permission', 'season', 'category', 'award', 'badge', 'admin::fee'];
                                        $query->where('name', 'not like', 'view_page_%')
                                            ->where('name', 'not like', 'view_widget_%');
                                        foreach ($resources as $resource) {
                                            $query->where('name', 'not like', "%_{$resource}");
                                        }
                                    })
                                    ->columns(2),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    protected static function getResourcePermissionSection(string $label, string $resourceName): Forms\Components\Section
    {
        return Forms\Components\Section::make($label)
            ->compact()
            ->extraAttributes(['class' => 'permission-card'])
            ->schema([
                Forms\Components\Actions::make([
                    Forms\Components\Actions\Action::make('select_all')
                        ->label('Select all')
                        ->color('warning')
                        ->extraAttributes(['class' => 'p-0 text-sm font-bold'])
                        ->action(function (Forms\Set $set, $state) use ($resourceName) {
                            $permissions = \Spatie\Permission\Models\Permission::where('name', 'like', "%_{$resourceName}")
                                ->pluck('name')
                                ->toArray();
                            $set('permissions', array_unique(array_merge($state ?? [], $permissions)));
                        }),
                    Forms\Components\Actions\Action::make('deselect_all')
                        ->label('Deselect all')
                        ->color('gray')
                        ->extraAttributes(['class' => 'p-0 text-sm font-bold'])
                        ->action(function (Forms\Set $set, $state) use ($resourceName) {
                            $permissions = \Spatie\Permission\Models\Permission::where('name', 'like', "%_{$resourceName}")
                                ->pluck('name')
                                ->toArray();
                            $set('permissions', array_values(array_diff($state ?? [], $permissions)));
                        }),
                ])->alignEnd(),
                Forms\Components\CheckboxList::make('permissions')
                    ->label('')
                    ->relationship('permissions', 'name', modifyQueryUsing: function ($query) use ($resourceName) {
                        return $query->where('name', 'like', "%_{$resourceName}");
                    })
                    ->getOptionLabelFromRecordUsing(fn($record) => ucwords(str_replace(["_{$resourceName}", '_'], ['', ' '], $record->name)))
                    ->columns(2),
            ])
            ->columnSpan(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('guard_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('permissions_count')
                    ->counts('permissions')
                    ->label('Permissions'),
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
