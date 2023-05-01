<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleEwaybillMaster extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function ewaybills(){
        return $this->belongsTo(ewaybill::class,'eid');
    }
}
