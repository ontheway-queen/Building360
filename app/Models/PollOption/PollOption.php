<?php

namespace App\Models\PollOption;

use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    protected $table = "poll_options";
    protected $primaryKey = "poll_option_id";
    protected $guarded = [];
}
