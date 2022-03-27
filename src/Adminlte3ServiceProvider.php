<?php

namespace Dattrink\Adminlte3;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Dattrink\Adminlte3\View\SampleCard;
use Dattrink\Adminlte3\View\SampleBreadcrumb;

class Adminlte3ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Define view location
        $this->loadViewsFrom(__DIR__. '/Resources/views', 'adminlte3');

        // Define view components
        $this->bootComponents();

        // Define commands
        $this->bootCommands();

        // Define routes
        $this->bootRoutes();

        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Console\InstallCommand::class];
    }

    /**
     * Register view components
     * @return void
     * @author ttdat
     * @version 1.0
     */
    protected function bootComponents()
    {
        $this->loadViewComponentsAs('adminlte3', [
            'sample-card' => SampleCard::class,
            'sample-breadcrumb' => SampleBreadcrumb::class
        ]);
    }

    /**
     * Register view Commands
     * @return void
     * @author ttdat
     * @version 1.0
     */
    protected function bootCommands()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Console\InstallCommand::class,
        ]);
    }

    /**
     * Boot Routes
     * @return void
     * @author ttdat
     * @version 1.0
     */
    protected function bootRoutes()
    {
        if (env('APP_ENV') != 'local') {
            return;
        }

        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
    }
}
