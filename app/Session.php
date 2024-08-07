<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $timestamps = false;
    public function record()
    {
        return $this->belongsTo('App\Record');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
    
}
