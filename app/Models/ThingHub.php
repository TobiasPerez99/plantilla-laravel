<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ThingHub extends Pivot
{
    public static function booted()
    {
        static::creating(function ($record) {
            dd($record);
        });
    }
}
