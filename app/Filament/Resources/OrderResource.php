<?php

namespace App\Filament\Resources;

use App\Containers\UniversalStoreSection\Address\Models\Address;
use App\Containers\UniversalStoreSection\Order\Models\Order;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $pluralLabel = 'Заказы';
    protected static ?string $breadcrumb = 'Заказы';

    protected static ?string $label = 'Заказ';

    protected static ?string $navigationGroup = 'Управление';

    protected static ?string $navigationLabel = 'Заказы';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'email',fn ($query) =>
                    $query->whereHas('role', fn ($q) => $q->where('name', 'Покупатель')))
                    ->label('Покупатель')
                    ->reactive()
                    ->required(),
                Forms\Components\Select::make('shop_id')
                    ->relationship('shop', 'name',fn ($query) =>
                    $query->where('is_approved', true))
                    ->label('Магазин')
                    ->required(),
                Forms\Components\Select::make('status_id')
                    ->relationship('status', 'name')
                    ->label('Статус')
                    ->required(),
                Forms\Components\TextInput::make('total_price')
                    ->label('Общая стоимость')
                    ->required(),
                Forms\Components\Select::make('adress_id')
                    ->options(function (callable $get) {
                        $userId = $get('user_id');

                        if (!$userId) {
                            return [];
                        }

                        return Address::where('user_id', $userId)
                            ->pluck('address', 'id')
                            ->toArray();})
                    ->label('Адрес доставки')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Пользователь'),
                Tables\Columns\TextColumn::make('shop.name')
                    ->label('Магазин'),
                Tables\Columns\TextColumn::make('status.name')
                    ->label('Статус'),
                Tables\Columns\TextColumn::make('total_price')
                    ->label('Общая стоимость'),
                Tables\Columns\TextColumn::make('adress.address')
                    ->label('Адрес'),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
