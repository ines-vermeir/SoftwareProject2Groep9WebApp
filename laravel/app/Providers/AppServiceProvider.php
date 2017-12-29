<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('nameNotFromCompany', function($attribute, $value, $parameters, $validator){
            if(!empty($value)){
                if (strpos($value, 'unknownName') !== false) {
                    return true;
                }
            }
            return false;
        });
        
        Validator::extend('not_contains', function($attribute, $value, $parameters)
        {
            // Banned words
            $words = array('test', 'easteregg');
            foreach ($words as $word)
            {
                if (stripos($value, $word) !== false) return false;
            }
            return true;
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
