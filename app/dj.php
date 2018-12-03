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
        'picture',
        'show'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function is_shown($id){

        $dj = dj::where('id', $id)->first();

        if($dj->show == 1){
            return true;
        } else {
            return false;
        }
    }
}
