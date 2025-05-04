<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Visit;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        // Clean up old visitor records (older than 6 months)
        $schedule->call(function () {
            Visit::where('created_at', '<', now()->subMonths(6))->delete();
        })->daily();

        // Generate daily visitor reports
        $schedule->command('visitors:daily-report')
                 ->dailyAt('23:59');

        // Backup visitor database weekly
        $schedule->command('db:backup --only-tables=visits')
                 ->weekly();

        // Cache visitor counts hourly for better performance
        $schedule->call(function () {
            cache()->rememberForever('total_visitors', function () {
                return Visit::distinct('session_id')->count();
            });

            cache()->remember('today_visitors', now()->endOfDay(), function () {
                return Visit::whereDate('created_at', today())
                            ->distinct('session_id')
                            ->count();
            });
        })->hourly();

        // Optional: use model pruning for old visit records
        $schedule->command('model:prune', [
            '--model' => Visit::class,
        ])->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }

    /**
     * Get the timezone that should be used by default for scheduled events.
     */
    protected function scheduleTimezone()
    {
        return config('app.timezone');
    }
    protected $middlewareGroups = [
        'web' => [
            // other middleware...
            \App\Http\Middleware\TrackVisits::class,
        ],
    ];
    protected $routeMiddleware = [
        // other middleware...
        'track.visits' => \App\Http\Middleware\TrackVisits::class,
    ];    
}
