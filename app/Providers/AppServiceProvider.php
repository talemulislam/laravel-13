<?php

namespace App\Providers;

use App\Services\Transistor;
use App\Services\PodcastParser;
use Illuminate\Contracts\Foundation\Application;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(Transistor::class, function (Application $app) {
        //     return new Transistor(
        //         $app->make(PodcastParser::class)
        //     );
        // });

        // $this->app->bindIf(Transistor::class, function (Application $app) {
        //     return new Transistor(
        //         $app->make(PodcastParser::class)
        //     );
        // });

        // $this->app->singleton(Transistor::class, function (Application $app) {
        //     return new Transistor(
        //         $app->make(PodcastParser::class)
        //     );
        // });

        // $this->app->scoped(Transistor::class, function (Application $app) {
        //     return new Transistor(
        //         $app->make(PodcastParser::class)
        //     );
        // });

        $service = new Transistor(
            new PodcastParser
        );

        $this->app->instance(
            Transistor::class,
            $service
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}
