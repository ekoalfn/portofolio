<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Configs;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            foreach (Configs::all() as $setting) {
                \Illuminate\Support\Facades\Config::set($setting->key, $setting->value);
            }
        } catch (\Exception $e) {
            // \Log::info("Database connection not established");
        }
    }
}
