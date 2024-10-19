<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'hub';

    /* Un Hub puede tener muchos Thing */
    public function devices()
    {
        return $this->hasMany(Thing::class , 'hub_id', 'id');
    }

    public function things()
    {
        return $this->belongsToMany(Thing::class, 'hub_thing', 'hub_id', 'thing_id');
    }

}
