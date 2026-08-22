<?php

namespace App\Providers;

use App\Services\Transistor;
use App\Services\PodcastParser;
use App\Services\PodcastService;
use Illuminate\Contracts\Foundation\Application;

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VideoController;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

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

        // $service = new Transistor(
        //     new PodcastParser
        // );

        // $this->app->instance(
        //     Transistor::class,
        //     $service
        // );

        // $this->app->bind(
        //     PodcastService::class,
        //     Transistor::class
        // );

        $this->app->when(PhotoController::class)
            ->needs(Filesystem::class)
            ->give(function () {
                return Storage::disk('local');
        });

        $this->app->when([VideoController::class, UploadController::class])
            ->needs(Filesystem::class)
            ->give(function () {
                return Storage::disk('local');
        });
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
