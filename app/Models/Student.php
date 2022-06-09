<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'names', 'status', 'lastnames',
        'brithday', 'address', 'email',
        'phone', 'city_id'
    ];
}
