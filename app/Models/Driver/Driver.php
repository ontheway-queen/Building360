<?php

namespace App\Models\Driver;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = "driver";
    protected $primaryKey = 'driver_id';
    protected $guarded = [];
}
