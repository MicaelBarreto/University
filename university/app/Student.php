<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'CPF', 'RG', 'address', 'cellphone', 'id_user',
    ];
    
    public function student_enrollment()
    {
        return $this->hasMany('App\Enrollment');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id');
    }
}
