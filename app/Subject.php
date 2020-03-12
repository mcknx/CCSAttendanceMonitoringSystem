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

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function sessions()
    {
        return $this->hasMany('App\Session');
    }

    public function activity_requests()
    {
        return $this->hasMany('App\ActivityRequest');
    }
}
