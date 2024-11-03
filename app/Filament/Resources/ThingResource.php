<?php

namespace App\Filament\Resources;

use App\Models\Hub;
use Filament\Forms;
use Filament\Tables;
use App\Models\Thing;
use Filament\Forms\Form;
use App\Models\ThingType;
use Filament\Tables\Table;
use App\Models\ThingStatus;
use App\Models\ThingLocation;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use App\Filament\Resources\HubResource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Actions\Action;
use App\Filament\Resources\ThingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ThingResource\RelationManagers;


class ThingResource extends Resource
{
    protected static ?string $model = Thing::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationGroup = 'General Settings';

    public static function canCreate(): bool
    {

        if (Hub::count() > 0) {
            return true;
        }

        Notification::make()
            ->title('Hub no encontrado')
            ->body('No se puede crear un Thing sin tener un Hub existente.')
            ->actions([
                Action::make('Crear Hub')
                    ->url('/admin/hubs/create')
                    ->color('primary')
                    ->icon('heroicon-o-plus-circle'),
            ])
            ->duration('persistent')
            ->warning()
            ->send();

        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                TextInput::make('description')
                    ->required()
                    ->maxLength(150),
                Select::make('location_id')
                    ->label('Ubicación')
                    ->options(ThingLocation::all()->pluck('name', 'id'))
                    ->relationship('location', 'name')
                    ->required(),
                Select::make('thing_type_id')
                    ->label('Tipo de Cosa')
                    ->options(ThingType::all()->pluck('name', 'id'))
                    ->required(),
                Select::make('status_id')
                    ->label('Estado')
                    ->options(ThingStatus::all()->pluck('name', 'id'))
                    ->relationship('status', 'name')
                    ->required(),
                TextInput::make('icon')
                    ->required()
                    ->maxLength(255),
                Select::make('hub')
                    ->label('Hubs Asociados')
                    ->options(Hub::all()->pluck('name', 'id'))
                    ->required()
                    ->relationship('hubs', 'name')
                    ->multiple()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('icon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('status')
                    ->label('Estado')
                    ->query(fn(Builder $query) => $query->where('status_id', ThingStatus::first()->id)),
                Filter::make('type')
                    ->label('Tipo de Cosa')
                    ->query(fn(Builder $query) => $query->where('thing_type_id', ThingType::first()->id)),
                Filter::make('location')
                    ->label('Ubicación')
                    ->query(fn(Builder $query) => $query->where('location_id', ThingLocation::first()->id)),
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
            'index' => Pages\ListThings::route('/'),
            'create' => Pages\CreateThing::route('/create'),
            'edit' => Pages\EditThing::route('/{record}/edit'),
        ];
    }
}
