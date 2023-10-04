<?php

namespace App\Console\Commands;

use App\Models\Trainer;
use App\Models\User;
use App\Notifications\Trainer as NotificationsTrainer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckTrainer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-trainer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Trainer';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $trainers = Trainer::get();
        
        $user = User::where('email', 'admin@app.com')->first();

        foreach ($trainers as $trainer) {

            if ($trainer->license_expiry == Carbon::now()->addDays(7)) {

                $data = [
                    'title' => $trainer->name,
                    'body' => 'باقي 7 أيام',
                    'type' => $trainer->license_expiration_date,
                ];

                $user->notify(new NotificationsTrainer($data));
            }
            
        }
            
        }
}
