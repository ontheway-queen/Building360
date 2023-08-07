<?php

namespace App\Models\Fleet;

use Illuminate\Database\Eloquent\Model;

class FleetExpense extends Model
{
    protected $table = "fleet_expense";
    protected $primaryKey = 'fleet_expense_id';
    protected $guarded = [];
}
