<?php

namespace App\Console;

use App\Models\Ckeditor;
use App\Models\Orden;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //Eliminar las imagenes de ckeditor
        $schedule->call(function () {
            $files = Storage::files('ckeditor');
            $images = Ckeditor::pluck('imagen_ruta')->toArray();

            Storage::delete(array_diff($files, $images));
            //})->daily();
        })->everyMinute();

        //Eliminar ordenes que no son pagadas
        $schedule->call(function () {

            $hora = now()->subMinute(10);

            $orders = Orden::where('estado', 1)->whereTime('created_at', '<=', $hora)->get();

            foreach ($orders as $order) {

                $items = json_decode($order->contenido);

                foreach ($items as $item) {
                    anularOrden($item);
                }

                $order->estado = 5;

                $order->save();
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
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
