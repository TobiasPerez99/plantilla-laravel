<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThingStatus extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $table = 'thing_status';
}
