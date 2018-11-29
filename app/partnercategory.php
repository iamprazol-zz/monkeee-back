<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class partnercategory extends Model
{

    protected $fillable = [
        'id',
        'name'
    ];

    public function partner(){

        return $this->hasMany('App\partner');

    }
}
