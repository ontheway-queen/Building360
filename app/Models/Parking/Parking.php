<?php

namespace App\Models\Parking;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $table = "parking";
    protected $primaryKey = 'parking_id';
    protected $guarded = [];
}
