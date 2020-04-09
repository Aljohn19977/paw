<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Traits;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::Class, 10)->create();
    }
}
