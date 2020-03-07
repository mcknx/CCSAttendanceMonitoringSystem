<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'Prof_fname', 'Prof_lname', 'Prof_mname', 'Prof_code', 'Prof_gender',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject', 'prof_id');
    }
}
