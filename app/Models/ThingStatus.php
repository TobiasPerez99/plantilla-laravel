<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThingStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    protected $table = 'thing_status';

    public function hasManyThings()
    {
        return $this->hasMany(Thing::class, 'status_id', 'id');
    }
}
