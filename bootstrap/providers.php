<?php

use Src\Common\Application\Providers\AppServiceProvider;
use Src\Common\Application\Providers\MigrationServiceProvider;
use Src\Common\Application\Providers\RouteServiceProvider;

return [
    AppServiceProvider::class,
    RouteServiceProvider::class,
    MigrationServiceProvider::class
];
