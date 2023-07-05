<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class Ad_TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            ['name' => 'Sell - 売り'],
            ['name' => 'Rent - 賃貸'],
            ['name' => 'Sell or Rent - 売りまたは賃貸'],
        ];

        DB::table('ad_types')->insert($records);
    }
}
