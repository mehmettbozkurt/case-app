<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('developers')->insert([
            [
                "name" => "Developer 1",
                "difficulty" => 1
            ],
            [
                "name" => "Developer 2",
                "difficulty" => 2
            ],
            [
                "name" => "Developer 3",
                "difficulty" => 3
            ],
            [
                "name" => "Developer 4",
                "difficulty" => 4
            ],
            [
                "name" => "Developer 5",
                "difficulty" => 5
            ],

        ]);
    }
}
