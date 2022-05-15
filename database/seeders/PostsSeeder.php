<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Posts::create([
            'title'=> 'Test',
            'body'=> "this is post 1" ,
            'visits'=>10,
            'pinned' =>true,
            'user_id'=>1
        ]);
        Posts::create([
            'title'=> 'Test',
            'body'=> "this is post 2" ,
            'visits'=>2,
            'pinned' =>false,
            'user_id'=>2

        ]);
    }
}
