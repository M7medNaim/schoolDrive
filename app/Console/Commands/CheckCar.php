<?php

namespace App\Console\Commands;

use App\Models\Car;
use App\Models\User;
use App\Notifications\Car as NotificationsCar;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckCar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-car';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Car';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cars = Car::get();
        
        $user = User::where('email', 'admin@app.com')->first();

        foreach ($cars as $car) {

            if ($car->license_expiry = Carbon::now()->addDays(7)) {

                $data = [
                    'title' => 'انتهاء ترخيص',
                    'body' => 'باقي 7 أيام',
                    'type' => 'License Expiry',
                ];

                $user->notify(new NotificationsCar($data));
            }
            
            if ($car->Insurance_expiry = Carbon::now()->addDays(7)) {

                $data = [
                    'title' => 'انتهاء تأمين',
                    'body' => 'باقي 7 ايام',
                    'type' => 'Insurance Expiry',
                ];

                $user->notify(new NotificationsCar($data));
            }


        }
    }
}
