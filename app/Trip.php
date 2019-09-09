<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uuid;

class Trip extends Model
{
    use Uuid;

    protected $fillable = [
        'name', 'created_by','trip_date','total_expense',
    ];


    
}
