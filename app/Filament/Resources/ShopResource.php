<?php

namespace App\Filament\Resources;

use App\Containers\UniversalStoreSection\Shop\Models\Shop;
use App\Filament\Resources\ShopResource\Pages;
use App\Filament\Resources\ShopResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class ShopResource extends Resource
{
    protected static ?string $model = Shop::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $pluralLabel = 'Магазины';
    protected static ?string $breadcrumb = 'Магазины';

    protected static ?string $label = 'Магазин';

    protected static ?string $navigationGroup = 'Управление';

    protected static ?string $navigationLabel = 'Магазины';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Наименование')
                    ->reactive()
                    ->afterStateUpdated(fn($state, callable $set, Page $livewire) => $livewire instanceof EditRecord ?: $set('custom_domain', Str::slug($state)))
                    ->debounce(900),
                Forms\Components\TextInput::make('custom_domain')
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->label('Уникальная ссылка'),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'email', fn ($query) =>
                    $query->whereHas('role', fn ($q) => $q->where('name', 'Продавец'))
                    )
                    ->required()
                    ->label('Владелец'),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255)
                    ->label('Описание'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->label('Наименование'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Описание'),
                Tables\Columns\TextColumn::make('custom_domain')
                    ->label('Уникальная ссылка'),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Владелец')
                    ->url(fn($record):string => route('filament.admin.resources.users.edit', ['record' => $record->user->id])),
                Tables\Columns\ToggleColumn::make('is_approved')
                    ->label('Одобрен'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListShops::route('/'),
            'create' => Pages\CreateShop::route('/create'),
            'edit' => Pages\EditShop::route('/{record}/edit'),
        ];
    }
}
