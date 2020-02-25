<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function sessions()
    {
        return $this->hasMany('App\Session');
    }
}
