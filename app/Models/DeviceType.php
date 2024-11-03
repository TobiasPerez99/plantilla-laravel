<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceType extends Model
{
    use HasFactory;

    protected $table = 'device_type';

    protected $fillable = ['name', 'description']; 

    public function hasManyDevices()
    {
        return $this->hasMany(Device::class, 'device_type_id', 'id');
    }
}
