<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\updateData::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->command('instagram:Update 3')->everyFifteenMinutes();
        $schedule->command('instagram:Update 2')->everyThirtyMinutes();
        $schedule->command('instagram:Update 1')->hourly();

        // $schedule->call(function () {
        //     $res= DB::table('Tags')->findOrFail($id);
        //     if(!empty($res)){
        //         $res['update_internal']=Carbon/Carbon::now();
        //         $res->save();
        //     }
        // })->everyMinute();

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
