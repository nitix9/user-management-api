<?php

namespace App\Filament\Resources;

use App\Containers\UserSection\User\Models\User;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $pluralLabel = 'Пользователи';
    protected static ?string $breadcrumb = 'Пользователи';

    protected static ?string $label = 'Пользователь';

    protected static ?string $navigationGroup = 'Управление';

    protected static ?string $navigationLabel = 'Пользователи';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя'),
                Tables\Columns\TextColumn::make('last_name')
                    ->label('Фамилия'),
                Tables\Columns\TextColumn::make('patronymic')
                    ->label('Отчество'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('role.name')
                    ->label('Роль'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Номер телефона'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
