<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evental extends Model
{
    //

    protected $table = 'events'; 

    protected $fillable = [
        'title', 'description', 'image', 'start', 'end', 'status', 'venue', 'time', 'user_id', 'num', 'max'
    ];
}
