<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;
    public function professor()
    {
        return $this->belongsTo('App\Professor', 'prof_id');
    }

    public function sessions()
    {
        return $this->hasMany('App\Session');
    }
}
