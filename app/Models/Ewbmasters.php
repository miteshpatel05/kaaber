<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ewbmasters extends Model
{
    use HasFactory;

    public function ewb()
    {
        return $this->hasMany(\App\Models\Ewaybill::class);
    }

    public function getEwb()
    {
        return optional($this->ewbList);
    }
}
