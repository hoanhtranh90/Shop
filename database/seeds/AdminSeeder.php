<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'khac sang',
            'email' => 'nguyenkhacsang100@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('longsangBn1'),
        ]);
    }
}