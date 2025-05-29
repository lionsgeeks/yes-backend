<?php

namespace App\Providers;

use App\Models\Academique;
use App\Models\Agence;
use App\Models\Bailleur;
use App\Models\Entreprise;
use App\Models\Maps;
use App\Models\Organization;
use App\Models\Publique;
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
        // $osc = Organization::all();
        // view()->share([
        //     'osc' => $osc
        // ]);
        // $bailleur = Bailleur::all();
        // view()->share([
        //     'bailleur' => $bailleur
        // ]);
        // $agence = Agence::all();
        // view()->share([
        //     'agence' => $agence
        // ]);
        // $entreprise = Entreprise::all();
        // view()->share([
        //     'entreprise' => $entreprise
        // ]);

        // $publique = Publique::all();
        // view()->share([
        //     'publique' => $publique
        // ]);

        // $academique = Academique::all();
        // view()->share([
        //     'academique' => $academique
        // ]);
    }
}
