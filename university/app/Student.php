<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'CPF', 'RG', 'address', 'cellphone',
    ];
    
    public function student()
    {
        return $this->belongsTo('App\Enrollment');
    }
}
