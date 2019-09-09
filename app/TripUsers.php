<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uuid;
use App\Trip;

class TripUsers extends Model
{
     use Uuid;

    protected $fillable = [
        'user_id','total_spent','trip_id'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

}
