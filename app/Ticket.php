<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
        'user_id', 'event_id', 'status', 'full_name', 'email', 'num'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function event(){
        return $this->belongsTo('App\Evental', 'event_id');
    }
}
