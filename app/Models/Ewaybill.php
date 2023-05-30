<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ewaybill extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function ewbList()
    {
        return $this->belongsTo(\App\Models\Ewbmasters::class);
    }

    public function vehiclegroup(){
        return $this->hasManyThrough(vewbgroup::class,VehicleEwaybillMaster::class,'eId','vewbId','id','id');
    }
}

