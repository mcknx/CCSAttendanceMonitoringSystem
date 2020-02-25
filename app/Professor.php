<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject', 'prof_id');
    }
}
