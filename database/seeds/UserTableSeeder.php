<?php

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
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Mckeen Asma',
            'username' => 'masma',
            // 'email'    => 'chris@scotch.io',
            'password' => Hash::make('password'),
        ));
    }
}
