<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;
use FFMpeg;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        date_default_timezone_set('Australia/Sydney');

        /** video duration validation  'video:25' */
        Validator::extend('video_length', function($attribute, $value, $parameters, $validator) {

            // validate the file extension
            if(!empty($value->getClientOriginalExtension()) && ($value->getClientOriginalExtension() == 'mp4')){

                $ffprobe = FFMpeg\FFProbe::create();
                $duration = $ffprobe
                    ->format($value->getRealPath()) // extracts file information
                    ->get('duration');
                return(round($duration) > $parameters[0]) ?false:true;
            }else{
                return false;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
