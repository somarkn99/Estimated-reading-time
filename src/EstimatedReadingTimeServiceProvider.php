<?php

namespace Somarkn99\EstimatedReadingTime;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class EstimatedReadingTimeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/estimatedreadingtime.php', 'estimatedreadingtime');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'estimatedreadingtime');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'estimatedreadingtime');

        $this->publishes([
            __DIR__.'/../config/estimatedreadingtime.php' => config_path('estimatedreadingtime.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/estimatedreadingtime'),
        ], 'lang');

        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        // Register Blade directive
        Blade::directive('readingtime', function ($expression) {
            return "<?php echo \\Somarkn99\\EstimatedReadingTime\\EstimatedReadingTime::calculate($expression); ?>";
        });
    }
}
