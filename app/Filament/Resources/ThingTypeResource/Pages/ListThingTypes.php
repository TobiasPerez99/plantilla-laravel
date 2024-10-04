<?php

namespace App\Filament\Resources\ThingTypeResource\Pages;

use App\Filament\Resources\ThingTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThingTypes extends ListRecords
{
    protected static string $resource = ThingTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
