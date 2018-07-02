<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'id_student', 'id_course', 'authorization',
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function course()
    {
        return $this->hasOne('App\Course');
    }

    
}
