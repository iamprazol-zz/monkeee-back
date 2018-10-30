<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club_gallery extends Model
{
    protected $fillable = [
        'id',
        'club_id',
        'picture',
        'description'
    ];

    public function club(){
        return $this->belongsTo('App\Club');
    }
}
