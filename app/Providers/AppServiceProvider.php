<?php

namespace App\Providers;

use App\Models\Project;
use Illuminate\Support\Facades\View;
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
        $projects = Project::all();
        if($projects){
            View::share("projects", $projects);
        }
        $seconds = $this->formatSeconds(60); // Örneğin, 60 saniye için fonksiyonu çağırabilirsiniz.

        
    }

    public function formatSeconds($seconds)
    {
        return $seconds;
    }
}
