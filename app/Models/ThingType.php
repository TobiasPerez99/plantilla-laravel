<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThingType extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description'];

    protected $table = 'thing_type';


    public function hasManyThings()
    {
        return $this->hasMany(Thing::class, 'thing_type_id', 'id');
    }
}
