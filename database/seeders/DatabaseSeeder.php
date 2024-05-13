<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'root';
        $user->password = bcrypt('password');
        $user->email = 'prova@prova.it';
        $user->save();
    }
}
