<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

        protected $table = 'devices';

        // Relación muchos-a-muchos con las cosas
        public function things()
        {
            return $this->belongsToMany(Thing::class, 'things_devices', 'device_id', 'thing_id');
        }

        //un device puede tener solo un tipo
        public function type()
        {
            return $this->belongsTo(DeviceType::class, 'device_type_id', 'id');
        }

}
