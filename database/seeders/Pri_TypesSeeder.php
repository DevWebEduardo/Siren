<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class Pri_TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            ['name' => 'Day - 日'],
            ['name' => 'Month - 月'],
            ['name' => 'Year - 年'],
        ];

        DB::table('pri_types')->insert($records);
    }
}
