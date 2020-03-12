<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
}
