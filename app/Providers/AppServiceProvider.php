<?php

namespace App\Providers;

use App\Services\Transistor;
use App\Services\PodcastParser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Filesystem\Filesystem;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use App\Contracts\EventPusher;
use App\Services\RedisEventPusher;
use App\Services\ReportService;
use App\Services\ReportAnalyzer;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VideoController;
use  App\Reports\CpuReport;
use  App\Reports\DiskReport;
use  App\Reports\MemoryReport;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //  $this->app->bind(Transistor::class, function (Application $app) {
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
        //     return new Transistor($app->make(PodcastParser::class));
        // });
        // $this->app->scoped(Transistor::class, function (Application $app) {
        //     return new Transistor($app->make(PodcastParser::class));
        // });
        // $this->app->scopedIf(Transistor::class, function (Application $app) {
        //     return new Transistor($app->make(PodcastParser::class));
        // });
        // $service = new Transistor(new PodcastParser);
        // $this->app->instance(Transistor::class, $service);           
        // $this->app->bind(EventPusher::class, RedisEventPusher::class);
        // $this->app->when(PhotoController::class)
        //     ->needs(Filesystem::class)
        //     ->give(function () {
        //         return Storage::disk('local');
        //     });

        // $this->app->when([
        //     VideoController::class,
        //     UploadController::class,
        // ])
        //     ->needs(Filesystem::class)
        //     ->give(function () {
        //         return Storage::disk('local');
        //     });
        $this->app->when(ReportService::class)
            ->needs('$limit')
            ->give(100);
        
        $this->app->when(ReportService::class)
            ->needs('$format')
            ->give('pdf');
        
    $this->app->bind(CpuReport::class, function () {
        return new CpuReport();
    });

    $this->app->bind(MemoryReport::class, function () {
        return new MemoryReport();
    });

    $this->app->bind(DiskReport::class, function () {
        return new DiskReport();
    });
    }

    /*
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

        Password::defaults(
            fn(): ?Password => app()->isProduction()
                ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
                : null,
        );
        $this->app->tag(
        [
            CpuReport::class,
            MemoryReport::class,
            DiskReport::class,
        ],
        'reports'
        );
    $this->app->bind(ReportAnalyzer::class, function ($app) {
        return new ReportAnalyzer(
        $app->tagged('reports')
        );
    });
    }
}
