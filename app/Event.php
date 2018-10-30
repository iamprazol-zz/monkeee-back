<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'id',
        'club_id',
        'category_id',
        'date',
        'opening',
        'closing',
        'picture',
        'name',
        'description',
        'price',
        'ticket_link'
    ];

    public function club(){
        return $this->belongsTo('App\Club');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }


}
