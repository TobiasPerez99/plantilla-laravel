<?php

namespace App\Filament\Resources\ThingResource\Pages;

use App\Filament\Resources\ThingResource;
use App\Models\Thing;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateThing extends CreateRecord
{
    protected static string $resource = ThingResource::class;

    protected function handleRecordCreation(array $data): Thing
    {
        return static::getModel()::create($data);
    }
}
