<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    public function awnsers()
    {
        return $this->hasMany('App\Awnsers','question_id','id');
    }
}
