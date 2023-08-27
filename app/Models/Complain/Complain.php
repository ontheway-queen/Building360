<?php

namespace App\Models\Complain;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $table = "complain_managment";
    protected $primaryKey = "complain_id";
    protected $guarded = [];
}
