<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Thing extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'thing';

    public function location()
    {
        return $this->hasOne(ThingLocation::class, 'id', 'location_id');
    }

    public function type()
    {
        return $this->belongsTo(ThingType::class, 'thing_type_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(ThingStatus::class, 'status_id', 'id');
    }

    // public function devices()
    // {
    //     return $this->belongsToMany(Device::class, 'things_devices', 'thing_id', 'device_id');
    // }

    public function device()
    {
        return $this->belongsToMany(Device::class, 'device_hub', 'thing_id', 'device_id');
    }

    // un thing puede tener solo un hub
    // public function hub()
    // {
    //     return $this->belongsTo(Hub::class, 'hub_id', 'id');
    // }

    /* pivot table */
    public function users()
    {
        return $this->belongsToMany(ThingStatus::class, 'thing_status', 'thing_id', '')
            ->withPivot('active')
            ->withTimestamps();
    }

    public function hubs()
    {
        return $this->belongsToMany(Hub::class, 'thing_hub', 'thing_id', 'hub_id');
    }
}
