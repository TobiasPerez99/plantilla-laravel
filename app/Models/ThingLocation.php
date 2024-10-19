<?php

namespace App\Models;

use App\Models\Thing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThingLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];

    protected $table = 'thing_location';

    public function things()
    {
        return $this->hasMany(Thing::class, 'location_id');
    }

}
