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
            'body' => 'this is comment',
            'user_id' => 1,
            'Post_id' => 1,
        ]);
        Comments::create([
            'body' => 'this is comment',
            'user_id' => 2,
            'Post_id' => 1,
            ]);
    }
}
