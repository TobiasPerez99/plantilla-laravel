<?php

namespace App\Filament\Resources;

use App\Models\Hub;
use Filament\Forms;
use TextInput\Mask;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\HubResource\Pages;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HubResource\RelationManagers;

class HubResource extends Resource
{
    protected static ?string $model = Hub::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'General Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Section::make('General Settings')
                        ->schema([
                            TextInput::make('name')
                                ->required()
                                ->placeholder('Enter the name of the hub')
                                ->label('Name'),

                        ]),
                    Section::make('Advanced Settings')
                        ->schema([
                            TextInput::make('ipv4_address')
                                ->placeholder('Enter the IPv4 address of the hub')
                                ->required()
                                ->mask('999.999.9.999'),
                            TextInput::make('mac_address')
                                ->placeholder('Enter the MAC address of the hub')
                                ->required()
                                ->mask('99:99:99:99:99:99'),
                            TextInput::make('mqtt_address')
                                ->placeholder('Enter the MQTT address of the hub')
                                ->required(),
                            TextInput::make('mqtt_port')
                                ->placeholder('Enter the MQTT port of the hub')
                                ->required(),
                            TextInput::make('ipv4_external_address')
                                ->placeholder('Enter the external IPv4 address of the hub')
                                ->required()
                                ->mask('999.999.9.999'),

                        ]),

                    Section::make('Credentials Settings')
                        ->schema([])

                ],


            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('ipv4_address'),
                TextColumn::make('mac_address'),
                TextColumn::make('mqtt_address'),
                TextColumn::make('mqtt_port'),
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
            'index' => Pages\ListHubs::route('/'),
            'create' => Pages\CreateHub::route('/create'),
            'edit' => Pages\EditHub::route('/{record}/edit'),
        ];
    }
}
