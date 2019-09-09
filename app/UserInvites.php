<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uuid;

class UserInvites extends Model
{
    use Uuid;

    protected $fillable = [
        'email','email_sent','email_read','trip_id'
    ];

}
