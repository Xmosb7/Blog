<?php

namespace Database\Seeders;

use App\Models\Comments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comments::create([
            'body' => 'this is comment 1',
            'user_id' => 1,
            'post_id' => 1,
        ]);
        Comments::create([
            'body' => 'this is comment 1',
            'user_id' => 2,
            'post_id' => 1,
        ]);
        Comments::create([
            'body' => 'this is comment 1',
            'user_id' => 1,
            'post_id' => 1,
        ]);
        Comments::create([
            'body' => 'this is comment 1',
            'user_id' => 2,
            'post_id' => 1,
        ]);
        Comments::create([
            'body' => 'this is comment 2',
            'user_id' => 1,
            'post_id' => 2,
        ]);
        Comments::create([
            'body' => 'this is comment 2',
            'user_id' => 2,
            'post_id' => 2,
        ]);
        Comments::create([
            'body' => 'this is comment 2',
            'user_id' => 1,
            'post_id' => 2,
        ]);
        Comments::create([
            'body' => 'this is comment 2',
            'user_id' => 2,
            'post_id' => 2,
        ]);
    }
}
