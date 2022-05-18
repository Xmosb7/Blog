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
            'title'=> 'post 1',
            'description'=> "this is a description for post 1" ,
            'body'=> "this is post 1" ,
            'visits'=>1,
            'pinned' =>true,
            'user_id'=>1
        ]);
        Posts::create([
            'title'=> 'post',
            'description'=> "this is a description for post 2" ,
            'body'=> "this is post 2" ,
            'visits'=>3,
            'pinned' =>false,
            'user_id'=>2
        ]);
        Posts::create([
            'title'=> 'post',
            'description'=> "this is a description for post 3" ,
            'body'=> "this is post 3" ,
            'visits'=>10,
            'pinned' =>true,
            'user_id'=>2
        ]);
        Posts::create([
            'title'=> 'post',
            'description'=> "this is a description for post 4" ,
            'body'=> "this is post 4" ,
            'visits'=>5,
            'pinned' =>false,
            'user_id'=>1
        ]);
        Posts::create([
            'title'=> 'post',
            'description'=> "this is a description for post 4" ,
            'body'=> "this is post 4" ,
            'visits'=>2,
            'pinned' =>false,
            'user_id'=>2

        ]);
    }
}
