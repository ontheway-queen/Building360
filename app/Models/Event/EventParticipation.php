<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;

class EventParticipation extends Model
{
    protected $table = "event_info";
    protected $primaryKey = 'event_info_id';
    protected $guarded = [];
}
