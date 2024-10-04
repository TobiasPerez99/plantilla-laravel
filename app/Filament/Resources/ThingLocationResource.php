<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ThingLocationResource\Pages;
use App\Filament\Resources\ThingLocationResource\RelationManagers;
use App\Models\ThingLocation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ThingLocationResource extends Resource
{
    protected static ?string $model = ThingLocation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Customize';

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
            'index' => Pages\ListThingLocations::route('/'),
            'create' => Pages\CreateThingLocation::route('/create'),
            'edit' => Pages\EditThingLocation::route('/{record}/edit'),
        ];
    }
}
