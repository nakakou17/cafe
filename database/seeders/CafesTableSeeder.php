<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CafesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cafes')->insert([
            [
                'name' => 'Cafe 1',
                'address' => '123 Main St',
            ],
            [
                'name' => 'Cafe 2',
                'address' => '456 Oak St',
            ],
            [
                'name' => 'Cafe 3',
                'address' => '789 Oak St',
            ],
            [
                'name' => 'Cafe 4',
                'address' => '101112 Oak St',
            ],
        ]);
    }
}
