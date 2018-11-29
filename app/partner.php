<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class partner extends Model
{

    protected $fillable = [
        'id',
        'suburb_id',
        'partnercategory_id',
        'name',
        'address',
        'description',
        'cover_photo',
        'mobile',
        'email',
        'facebook',
        'instagram',
        'website',
        'show'
    ];

    public function partnercategory(){

        return $this->belongsTo('App\partnercategory');

    }

    public function suburb(){

        return $this->belongsTo('App\Suburb');

    }


    public function is_shown($id){

        $p = partner::where('id', $id)->first();

        if($p->show == 1){
            return true;
        } else {
            return false;
        }
    }

}
