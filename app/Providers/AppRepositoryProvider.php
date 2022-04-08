<?php namespace App\Providers;

use App\Services\AbTracts\FirebaseServiceInterface;
use App\Services\FirebaseService;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider {

    public function boot() {}

    public function register() {
        // $models = array(
        //     'CustomModel'
        // );

        // foreach ($models as $idx => $model) {
        //     $this->app->bind("App\Contracts\\{$model}Interface", "App\Repositories\\{$model}Repository");
        // }
        $this->app->bind(FirebaseServiceInterface::class, FirebaseService::class);
        $this->app->bind('Requirement', function($app){
          return new \App\Classes\Requirement();
        });
    }
}