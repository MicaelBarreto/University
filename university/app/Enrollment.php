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
        return $this->belongsTo('App\Student', 'id_student', 'id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'id_course', 'id');
    }

    
}
