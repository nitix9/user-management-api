<?php

namespace App\Filament\Resources;

use App\Containers\UniversalStoreSection\Address\Models\Address;
use App\Filament\Resources\AddressResource\Pages;
use App\Filament\Resources\AddressResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $pluralLabel = 'Адреса';
    protected static ?string $breadcrumb = 'Адреса';

    protected static ?string $label = 'Адрес';

    protected static ?string $navigationGroup = 'Управление';

    protected static ?string $navigationLabel = 'Адреса';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('г.Москва, ул. Ленина, д.21, кв.21')
                    ->label('Адрес'),
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->relationship('user', 'email')
                    ->label('Пользователь'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('address')
                    ->label('Адрес'),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Пользователь')
                    ->url(fn($record):string => route('filament.admin.resources.users.edit', ['record' => $record->user->id])),

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
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}
