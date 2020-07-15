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
