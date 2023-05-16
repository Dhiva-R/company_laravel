<?php

namespace App\Models;

use App\Models\Companies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employees extends Model
{
    protected $fillable = ['id','FirstName', 'LastName', 'company_id','Email','Phone'];


    public function company()
    {
        return $this->belongsTo(Companies::class);
    }

}

