<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "event_management";
    protected $primaryKey = 'event_id';
    protected $guarded = [];
}
