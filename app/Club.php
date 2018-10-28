<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'id' ,'name', 'address' , 'suburb_id', 'description' , 'cover_photo'
    ];

    public function suburbs() {
        return $this->belongsTo('App\Suburb');
    }

    public function events() {
        return $this->hasMany('App\Event');
    }

    public function club_gallery(){
        return $this->hasMany('App\Club_gallery');
    }

}
