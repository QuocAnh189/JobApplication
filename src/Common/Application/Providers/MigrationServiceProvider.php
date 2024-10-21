<?php

namespace Src\Common\Application\Providers;

use Illuminate\Support\ServiceProvider;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom([
            base_path('src/User/Infrastructure/Database/Migrations'),
            base_path('src/Employer/Infrastructure/Database/Migrations'),
            base_path('src/Job/Infrastructure/Database/Migrations'),
            base_path('src/JobApplication/Infrastructure/Database/Migrations'),
        ]);
    }
}
