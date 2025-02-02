<?php

namespace App\Console\Commands\UserStaff;

use App\Models\Cinema\CinemaObject;
use App\Models\Role\Role;
use App\Models\Role\RoleUserStaff;
use App\Models\UserStaff;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateTestUserStaff extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateTestUserStaff';

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
        DB::transaction(function () {
            UserStaff::forceCreate([
                'first_name' => "Менеджер",
                'middle_name' => "Менеджерович",
                'last_name' => "Тестов",
                'email' => 'manager@test.com',
                'phone' => fake()->unique()->phoneNumber(),
                'email_verified_at' => now(),
                'password' => Hash::make('test'),
                'remember_token' => Str::random(10),
            ]);
            UserStaff::forceCreate([
                'first_name' => "Менеджер2",
                'middle_name' => "Менеджерович2",
                'last_name' => "Тестов2",
                'email' => 'manager2@test.com',
                'phone' => fake()->unique()->phoneNumber(),
                'email_verified_at' => now(),
                'password' => Hash::make('test'),
                'remember_token' => Str::random(10),
            ]);

            $role = Role::whereCode('manager')->first();
            $co = CinemaObject::first();

            $us = UserStaff::whereEmail('manager@test.com')->first();

            RoleUserStaff::create([
                'role_id' => $role->getId(),
                'user_staff_id' => $us->getId(),
                'cinema_object_id' => $co->getId(),
            ]);

            $co = CinemaObject::latest()->first();
            $us = UserStaff::whereEmail('manager2@test.com')->first();
            RoleUserStaff::create([
                'role_id' => $role->getId(),
                'user_staff_id' => $us->getId(),
                'cinema_object_id' => $co->getId(),
            ]);
        });
    }
}
