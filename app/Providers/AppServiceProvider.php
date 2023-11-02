<?php

namespace App\Providers;

use App\Mail\AccessAuditEmail;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AccessAuditEmail::class, function ($app) {
            logger("entro a ServiceProvider");
            return new AccessAuditEmail(15, Carbon::now());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
