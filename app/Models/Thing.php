<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'Thing';

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


    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    public function scopeOfUser($query, $user)
    {
        return $query->where('user_id', $user->id);
    }

    public function scopeOfLocation($query, $location)
    {
        return $query->where('location_id', $location->id);
    }
}
