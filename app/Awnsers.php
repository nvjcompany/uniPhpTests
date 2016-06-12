<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Awnsers extends Model
{
    public function question()
    {
        $this->belongsTo('App/Questions');
    }
}
