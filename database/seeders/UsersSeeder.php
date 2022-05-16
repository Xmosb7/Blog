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
            'img'=>'https://scontent.fcai19-1.fna.fbcdn.net/v/t1.18169-9/13151980_1310806328948339_6133123822329758872_n.jpg?_nc_cat=100&ccb=1-6&_nc_sid=09cbfe&_nc_ohc=ADlJwB_0QrAAX_D1LBh&_nc_ht=scontent.fcai19-1.fna&oh=00_AT-GUMVsiIq81bfBSIz2hdTukAzCGaZeHAByYgjrsO70Bg&oe=62A5B26A',
            'is_admin' =>'1',
            'plan_id'=>'2',
        ]);
        User::create([
            'name'=> 'user@user',
            'email'=> 'user@user',
            'password'=>  bcrypt('user@user'),
            'img'=>'https://pbs.twimg.com/media/DhAcqQcW0AAL8CG.jpg',
            'is_admin' =>0,
            'plan_id'=>1,
        ]);
    }
}
