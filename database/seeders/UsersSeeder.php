<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin@admin',
            'email' => 'admin@admin',
            'password' =>  bcrypt('admin@admin'),
            'is_admin' => '1'
        ]);
        User::create([
            'name'=>'user@user',
            'email'=>'user@user',
            'password'=> bcrypt('user@user'),
            'is_admin'=>'0',
        ]);
    }
}
