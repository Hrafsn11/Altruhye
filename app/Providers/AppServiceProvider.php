<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Observers\DonationObserver;
use App\Models\Donation;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


    public function boot()
    {
        Paginator::useTailwind();
        Donation::observe(DonationObserver::class);

    }

    /**
     * Bootstrap any application services.
     */
  
}
