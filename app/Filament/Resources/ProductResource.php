<?php

namespace App\Filament\Resources;

use App\Containers\UniversalStoreSection\Product\Models\Product;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $pluralLabel = 'Продукты';
    protected static ?string $breadcrumb = 'Продукты';

    protected static ?string $label = 'Продукт';

    protected static ?string $navigationGroup = 'Управление';

    protected static ?string $navigationLabel = 'Продукты';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->label('Наименование')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('shop_id')
                    ->label('Магазин')
                    ->relationship('shop', 'name')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->label('Категория')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Цена')
                    ->numeric()
                    ->maxLength(10)
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Описание')
                    ->maxLength(2000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->label('Наименование'),
                Tables\Columns\TextColumn::make('price')
                    ->label('Цена'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Описание')
                    ->limit(40),
                Tables\Columns\TextColumn::make('shop.name')
                    ->label('Магазин'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
