<?php

namespace App\Filament\Resources\ThingLocationResource\Pages;

use App\Filament\Resources\ThingLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThingLocation extends EditRecord
{
    protected static string $resource = ThingLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
