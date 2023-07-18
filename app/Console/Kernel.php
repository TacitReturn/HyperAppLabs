<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('backup:clean')->monthlyOn(5, "01:00")
            ->onFailure(fn() => info("Website backup:clean failed."))
            ->onSuccess(fn() => info("Website backed:clean successfully."));

        $schedule->command('backup:run')->monthlyOn(5, "01:30")
            ->onFailure(fn() => info("Website backup:run failed."))
            ->onSuccess(fn() => info("Website backed:run successfully."));
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
