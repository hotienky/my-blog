<?php

namespace App\Providers;

use App\Services\Contracts\FirebaseServiceInterface;
use App\Services\FirebaseService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('frontend.*', 'App\Http\View\CategoryComposer');
        View::composer('frontend.*', 'App\Http\View\RandomComposer');
        View::composer('frontend.*', 'App\Http\View\LatestComposer');
        View::composer(['frontend.*', 'layouts.frontend'], 'App\Http\View\SettingComposer');
        
    }
}
