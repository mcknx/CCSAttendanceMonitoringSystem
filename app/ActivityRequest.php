<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityRequest extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
