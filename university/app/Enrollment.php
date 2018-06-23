<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'id_student', 'id_course',
    ];

    public function enrollStudent()
    {
        return $this->hasMany('App\Student');
    }

    public function enrollCourse()
    {
        return $this->hasMany('App\Course');
    }

    
}
