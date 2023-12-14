<?php

// app/Providers/RepositoryServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Bind your repositories here
        $this->app->bind(
            \App\Repositories\PrescriptionRepositoryInterface::class,
            \App\Repositories\PrescriptionRepository::class
        );

        // Add other repository bindings as needed
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
