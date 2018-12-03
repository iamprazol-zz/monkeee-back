<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $fillable = [
        'id',
        'country_id',
        'zone_id',
        'name'
    ];

    public function country(){

        return $this->belongsTo('App\country');

    }

    public function zone(){

        return $this->belongsTo('App\zone');

    }

    public function suburb(){

        $this->hasMany('App\Suburb');

    }
}
