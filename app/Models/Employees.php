<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';
    protected $fillable = ['company','first_name','last_name','email','phone','address','created_at','updated_at'];
    protected $primaryKey = 'employees_id';
    public $timestamps = true;

    public function companies(){
        return $this->hasOne('App\Models\Companies','companies_id','company');
    }


}
