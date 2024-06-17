<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'cafe_id' => 1,
                'recommend' => 5,
                'price' => 500,
                'noisy' => 0,
                'time' => '3:00:00',
                'body' => 'Great coffee and ambiance!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'cafe_id' => 2,
                'recommend' => 4,
                'price' => 600,
                'noisy' => 1,
                'time' => '2:00:00',
                'body' => 'Perfect place to relax and work.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
