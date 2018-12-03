<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class zone extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    public function city(){

        return $this->hasMany('App\city');

    }
}
