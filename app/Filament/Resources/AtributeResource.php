<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AtributeResource\Pages;
use App\Filament\Resources\AtributeResource\RelationManagers;
use App\Models\Atribute;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AtributeResource extends Resource
{
    protected static ?string $model = Atribute::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Product & Category';
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('products_id')->options(Product::all()->pluck('name','id'))->required()->native(false)->columnSpanFull(),
                Select::make('type')
                ->options([
                    'kadar' => 'kadar',
                    'bahan' => 'bahan',
                ])->required(),
                TextInput::make('name')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                ->searchable(),
                TextColumn::make('name')
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
            'index' => Pages\ListAtributes::route('/'),
            'create' => Pages\CreateAtribute::route('/create'),
            'edit' => Pages\EditAtribute::route('/{record}/edit'),
        ];
    }
}
