<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dj extends Model
{

    protected $fillable = [
        'id',
        'category_id',
        'resident',
        'name',
        'label',
        'mobile',
        'email',
        'bio',
        'facebook',
        'instagram',
        'show'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
