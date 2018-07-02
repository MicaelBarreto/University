<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'CPF', 'RG', 'address', 'cellphone', 'id_user',
    ];
    
    public function enrollment()
    {
        return $this->hasOne('App\Enrollment', 'id_student', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
