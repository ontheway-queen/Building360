<?php

namespace App\Models\Notice;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = "notices";
    protected $primaryKey = "id";
    protected $guarded = [];
}
