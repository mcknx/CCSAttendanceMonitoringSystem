<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public $timestamps = false;
    public function sessions()
    {
        return $this->hasMany('App\Session');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }
}
