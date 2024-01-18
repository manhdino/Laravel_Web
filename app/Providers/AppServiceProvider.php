<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('hello', function ($expression) {
            return "<?php echo 'Hello '. {$expression} .','; ?>";
        });

        Blade::if('env', function ($environment) {
            if (config('app.env') == $environment) {
                return true;
            }
            return false;
        });
    }
}
