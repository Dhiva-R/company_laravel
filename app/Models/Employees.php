<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = ['id','FirstName', 'LastName', 'company_id','Email','Phone'];


    public function company()
    {
        return $this->belongsTo('App\Companies');
    }

}

