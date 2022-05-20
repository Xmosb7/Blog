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
            'name'=> 'admin@admin',
            'email'=> 'admin@admin',
            'password'=>  bcrypt('admin@admin'),
            'img'=>'https://www.seekpng.com/png/full/356-3562377_personal-user.png',
            'is_admin' =>'1',
            'plan_id'=>'2',
        ]);
        User::create([
            'name'=> 'user@user',
            'email'=> 'user@user',
            'password'=>  bcrypt('user@user'),
            'img'=>'https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png',
            'is_admin' =>0,
            'plan_id'=>1,
        ]);
    }
}
