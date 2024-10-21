<?php

namespace Src\Common\Infrastructure\Kernel;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Http extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            // \Src\Common\Infrastructure\Laravel\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [];
}
