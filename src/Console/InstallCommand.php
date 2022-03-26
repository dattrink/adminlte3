<?php

namespace Dattrink\Adminlte3\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adminlte3:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Adminlte layouts';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->installAdminlte3();
    }

    /**
     * Install function
     * @return void
     * @author ttdat
     * @version 1.0
     */
    protected function installAdminlte3()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                "@tailwindcss/forms" => "^0.4.0",
                "alpinejs" => "^3.4.2",
                "autoprefixer" => "^10.4.2",
                "axios" => "^0.25",
                "laravel-mix" => "^6.0.6",
                "lodash" => "^4.17.19",
                "postcss" => "^8.4.6",
                "postcss-import" => "^14.0.2",
                "resolve-url-loader" => "^5.0.0",
                "sass" => "^1.49.9",
                "sass-loader" => "^12.1.0",
                "tailwindcss"=> "^3.0.18",
                "@fortawesome/fontawesome-free" => "^5.15.4",
                "bootstrap" => "^4.6.1",
                "jquery" => "3.6",
                "popper.js" => "^1.16.1",
                "icheck-bootstrap" => "^3.0.1",
            ] + $packages;
        });

        (new Filesystem)->ensureDirectoryExists(resource_path('css'));
        copy(__DIR__.'/../../stubs/default/resources/css/app.scss', resource_path('css/app.scss'));

        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        copy(__DIR__.'/../../stubs/default/resources/js/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/../../stubs/default/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));

        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/layouts/adminlte3', resource_path('views/layouts/adminlte3'));
        copy(__DIR__.'/../../stubs/default/resources/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));
        copy(__DIR__.'/../../stubs/default/resources/views/layouts/guest.blade.php', resource_path('views/layouts/guest.blade.php'));
        
        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/plugins', resource_path('plugins'));

        (new Filesystem)->ensureDirectoryExists(storage_path('app/public'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/images', storage_path('app/public/images'));

        copy(__DIR__.'/../../stubs/default/webpack.mix.js', base_path('webpack.mix.js'));

        $this->installAdminlte3Breeze();

        $this->info('AdminLTE 3 scaffolding installed successfully.');
        $this->comment('Don\'t forget execute the "php artisan storage:link" command to create the symbolic link.');
        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
    }

    protected function installAdminlte3Breeze()
    {
        /**
         * Layouts
         */
        copy(__DIR__.'/../../stubs/default/resources/views/auth/login.blade.php', resource_path('views/auth/login.blade.php'));
        copy(__DIR__.'/../../stubs/default/resources/views/auth/forgot-password.blade.php', resource_path('views/auth/forgot-password.blade.php'));
        copy(__DIR__.'/../../stubs/default/resources/views/auth/confirm-password.blade.php', resource_path('views/auth/confirm-password.blade.php'));
        copy(__DIR__.'/../../stubs/default/resources/views/auth/register.blade.php', resource_path('views/auth/register.blade.php'));
        copy(__DIR__.'/../../stubs/default/resources/views/auth/reset-password.blade.php', resource_path('views/auth/reset-password.blade.php'));
        copy(__DIR__.'/../../stubs/default/resources/views/auth/verify-email.blade.php', resource_path('views/auth/verify-email.blade.php'));

        (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/resources/views/components', resource_path('views/components'));

        /**
         * Controllers
         */
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers/Auth'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/app/Controllers/Auth', app_path('Http/Controllers/Auth'));

        /**
         * Routes
         */
        (new Filesystem)->ensureDirectoryExists(base_path('routes'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/routes', base_path('routes'));

        /**
         * FormRequests
         */
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/app/Requests', app_path('Http/Requests'));

        /**
         * Language
         */
        (new Filesystem)->ensureDirectoryExists(lang_path('vi'));
        copy(__DIR__.'/../../stubs/default/lang/vi/auth.php', lang_path('vi/auth.php'));
        copy(__DIR__.'/../../stubs/default/lang/vi/passwords.php', lang_path('vi/passwords.php'));

        (new Filesystem)->ensureDirectoryExists(lang_path('en'));
        copy(__DIR__.'/../../stubs/default/lang/en/auth.php', lang_path('en/auth.php'));
        copy(__DIR__.'/../../stubs/default/lang/en/passwords.php', lang_path('en/passwords.php'));
    }

    /**
     * Update the "package.json" file.
     *
     * @param  callable  $callback
     * @param  bool  $dev
     * @return void
     */
    protected static function updateNodePackages(callable $callback, $dev = true)
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }
}
