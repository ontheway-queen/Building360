<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = "maintenances";
    protected $primaryKey = "maintenance_id";
    protected $guarded = [];
}
