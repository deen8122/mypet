<?php

namespace App\Console\Commands\UserStaff;

use App\Models\Customer;
use App\Services\Notification\NotificationService;
use Illuminate\Console\Command;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendNotifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = Customer::whereEmail('deen812@mail.ru')->first();

        NotificationService::send('CustomerRegister', $user, [
            'LINK' => env('APP_FRONT_URL') . '?action=confirm&hash=' . sha1(
                    $user->email
                ) . '&customerId=' . $user->customer_id
        ]);
    }
}
