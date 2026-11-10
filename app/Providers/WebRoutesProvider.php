<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\ExampleController;
use App\Http\FormController;
use App\Http\HomeController;
use App\Http\NotFoundController;
use Sahil\Http\Route;
use Sahil\Http\Router;

/**
 * Registers the HTTP surface and wires the kernel with this application's
 * debug mode and global middleware.
 */
final class WebRoutesProvider extends \Sahil\Foundation\ServiceProvider
{
    public function register(): void
    {
        $router = $this->routeTable();

        $this->app()->container()->singleton(
            \Sahil\Http\Router::class,
            static fn (): Router => $router,
        );

        $this->app()->container()->singleton(
            \Sahil\Http\Kernel::class,
            static function (\Sahil\Container\Container $container): \Sahil\Http\Kernel {
                $application = $container->make(\Sahil\Contracts\Foundation\ApplicationContract::class);

                return (new \Sahil\Http\Kernel($container->make(\Sahil\Http\Router::class), $container, $application))
                    ->useDebugMode($application->config()->get('app.debug') === true)
                    ->using(new \Sahil\Http\Middleware\RequestIdMiddleware())
                    ->using(new \Sahil\Http\Middleware\SecurityHeaders());
            },
        );
    }

    private function routeTable(): \Sahil\Http\Router
    {
        $router = new \Sahil\Http\Router();
        $file = dirname(__DIR__, 2).'/routes/web.php';

        if (!is_file($file)) {
            throw new RuntimeException(sprintf('routes/web.php is missing; expected it at [%s].', $file));
        }

        /** @var mixed $definitions */
        $definitions = require $file;

        if (!is_array($definitions)) {
            throw new RuntimeException('routes/web.php must return an array of Sahil\Http\Route objects.');
        }

        foreach ($definitions as $definition) {
            if (!$definition instanceof \Sahil\Http\Route) {
                throw new RuntimeException(sprintf(
                    'routes/web.php must return Sahil\Http\Route entries, got %s.', get_debug_type($definition),
                ));
            }

            $router->register($definition);
        }

        return $router;
    }
}