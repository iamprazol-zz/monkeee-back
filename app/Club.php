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
        'open',
        'facebook',
        'instagram',
        'show'
    ];

    public function suburb() {
        return $this->belongsTo('App\Suburb');
    }

    public function event() {
        return $this->hasMany('App\Event');
    }

    public function club_gallery(){
        return $this->hasMany('App\Club_gallery');
    }

    public function is_shown($id){

        $c = Club::where('id', $id)->first();

        if($c->show == 1){
            return true;
        } else {
            return false;
        }
    }
}
