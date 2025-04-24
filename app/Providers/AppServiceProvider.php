<?php

namespace App\Providers;

use App\Models\Maps;
use App\Models\Selects;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $maps = Maps::all();
        view()->share([
            'maps'=> $maps
        ]);

        $selects = Selects::all();
        view()->share([
            'selects'=> $selects
        ]);
    }
}
