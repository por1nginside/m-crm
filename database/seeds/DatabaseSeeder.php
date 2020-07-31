<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Employee::class, 10000)->create();
        factory(User::class, 1)->create();
    }
}
