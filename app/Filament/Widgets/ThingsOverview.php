<?php

namespace App\Filament\Widgets;

use App\Models\Hub;
use App\Models\Thing;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ThingsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Things', Thing::count())
                ->color('success')
                ->icon('heroicon-o-light-bulb'),


            Stat::make('Total Hubs', Hub::count())
                ->color('warning')
                ->icon('heroicon-o-home'),

            Stat::make('Total Devices', '+15')
                ->color('danger')
                ->icon('heroicon-o-device-phone-mobile'),
        ];
    }
}
