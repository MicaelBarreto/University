<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'menu', 'students_amount',
    ];

    public function course()
    {
        return $this->hasMany('App\Enrollment');
    }
}
