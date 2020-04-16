<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Maam Darlyn',
            'username' => 'mdarlyn',
            'password' => Hash::make('uicmdarlyn2020'),
            'role' => '1'
        ]);
        // DB::table('users')->insert([
        //     'name' => 'Mckeen Asma',
        //     'username' => 'masma',
        //     'password' => Hash::make('uicmasma2020'),
        //     'role' => '1'
        // ]);
    }
}
