<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';
    protected $fillable = ['name','address','email','logo','website','created_at','updated_at'];
    protected $primaryKey = 'companies_id';
    public $timestamps = true;

    public function employees(){
     	return	$this->hasMany('App\Models\Employees','company','companies_id');
    }
}
