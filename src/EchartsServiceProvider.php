<?php

namespace Codebarista\LaravelEcharts;

use Codebarista\LaravelEcharts\Console\Commands\NodeEcharts;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

class EchartsServiceProvider extends ServiceProvider
{
    private const string CONFIG = __DIR__.'/../config/echarts.php';

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(self::CONFIG, 'echarts');

        $this->commands([
            NodeEcharts::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                self::CONFIG => $this->app->configPath('echarts.php'),
            ], 'config');
        }

        $this->macros();
    }

    /**
     * Register the package's macros
     */
    protected function macros(): void
    {
        Arr::macro('toJson', static function (array $value, bool $pretty = false): string {
            $flags = JSON_THROW_ON_ERROR
                | JSON_UNESCAPED_SLASHES
                | JSON_NUMERIC_CHECK;

            if ($pretty === true) {
                $flags |= JSON_PRETTY_PRINT;
            }

            return json_encode($value, $flags);
        });
    }
}
