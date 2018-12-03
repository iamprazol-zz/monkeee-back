<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'id',
        'event_id',
        'video'
    ];

    public function event(){

        return $this->belongsTo('App\Event');

}
}
