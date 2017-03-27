<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
class Account extends Model
{
    //
    use Billable;
    protected $guarded = [];
}
