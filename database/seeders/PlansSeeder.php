<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;


class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name'=>'Basic',
            'price'=>0,
            'posts_month'=>0
        ]);
        Plan::create([
            'name'=>'Premium',
            'price'=>10,
            'posts_month'=>2
        ]);
    }
}
