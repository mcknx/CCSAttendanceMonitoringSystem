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
    }
}
