<?php

namespace App\Filament\Resources\ThingStatusResource\Pages;

use App\Filament\Resources\ThingStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThingStatuses extends ListRecords
{
    protected static string $resource = ThingStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
