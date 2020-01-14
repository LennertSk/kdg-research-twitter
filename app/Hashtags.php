<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtags extends Model
{
    protected $fillable = [ 'id', 'name', 'daily', 'wins', ];

    public $timestamps = false;
}



