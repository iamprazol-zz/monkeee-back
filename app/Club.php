<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'id',
        'name',
        'address',
        'suburb_id',
        'description',
        'cover_photo',
        'order',
        'email',
        'phone',
        'opening_time'
    ];

    public function suburbs() {
        return $this->belongsTo('App\Suburb');
    }

    public function event() {
        return $this->hasMany('App\Event');
    }

    public function club_gallery(){
        return $this->hasMany('App\Club_gallery');
    }

}
