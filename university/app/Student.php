<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'CPF', 'RG', 'address', 'cellphone', 'id_User',
    ];
    
    public function student_enrollment()
    {
        return $this->belongsTo('App\Enrollment');
    }

    public function student_user()
    {
        return $this->hasOne('App\User');
    }
}
