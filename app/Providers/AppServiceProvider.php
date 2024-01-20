<?php

namespace App\Providers;

use App\View\Components\Alert;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

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

Blade::component('package-alert', Alert::class);
Paginator::useBootstrapFive();
}
}