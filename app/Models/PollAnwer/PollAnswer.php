<?php

namespace App\Models\PollAnwer;

use Illuminate\Database\Eloquent\Model;

class PollAnswer extends Model
{
    protected $table = "poll_ans";
    protected $primaryKey = "poll_ans_id";
    protected $guarded = [];
}
