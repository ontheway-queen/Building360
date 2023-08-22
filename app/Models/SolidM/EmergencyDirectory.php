<?php

namespace App\Models\SolidM;

use Illuminate\Database\Eloquent\Model;

class EmergencyDirectory extends Model
{
    protected $table = "emergency_directory";
    protected $primaryKey = "em_dir_id";
    protected $guarded = [];
}
