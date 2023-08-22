<?php

namespace App\Models\Poll;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table = "poll_question";
    protected $primaryKey = "poll_id";
    protected $guarded = [];
}
