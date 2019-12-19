<?php

namespace Alkoumi\LaravelArabicTafqeet;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;


class LaravelArabicTafqeetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
        //create alias 
        //AliasLoader::getInstance()->alias("TransDate", "Alkoumi\CarbonDateTranslator\Translator");
        AliasLoader::getInstance()->alias("Tafqeet", Tafqeet::class);


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
