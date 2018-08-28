<?php

namespace App\Console;
use DB;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      $schedule->call(function () {
        $db = DB::table('notifications')->get();
        foreach ($db as $user){
        $noti =  DB::table('notifications')->where('target',$user->target)->orderBy('created_at','desc')->get();
        if($noti->count() > 5){
          foreach ($noti as $uu ) {
            if((time()-strtotime($uu->created_at))>593056){
              DB::table('notifications')->where('id',$uu->id)->delete();
            }
          }

        }
      }

          $db2 = DB::table('users')->get();
          foreach ($db2 as $user) {
            $loc = 'py/rescale.py';
            $filenameUp = $user->imgpath;

                shell_exec("python $loc $filenameUp");
          }
      })->everyMinute();
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
