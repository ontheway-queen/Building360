<?php

namespace App\Models\Announcement;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = "announcement";
    protected $primaryKey = "announcement_id";
    protected $guarded = [];
}
