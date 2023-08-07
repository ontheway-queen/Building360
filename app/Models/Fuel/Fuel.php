<?php

namespace App\Models\Fuel;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $table = "fuels";
    protected $primaryKey = 'fuel_id';
    protected $guarded = [];
}
