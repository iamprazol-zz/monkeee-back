<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suburb extends Model
{
    protected $fillable =[
        'id', 'name' , 'postalcode'
    ];

    public function clubs(){
        return $this->hasMany('App\Club');
    }
}
