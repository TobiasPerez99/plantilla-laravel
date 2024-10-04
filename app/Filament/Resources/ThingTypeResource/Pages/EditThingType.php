<?php

namespace App\Filament\Resources\ThingTypeResource\Pages;

use App\Filament\Resources\ThingTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThingType extends EditRecord
{
    protected static string $resource = ThingTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
