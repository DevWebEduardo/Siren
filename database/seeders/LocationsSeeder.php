<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            ['name' => 'Naha - 那覇市'],
            ['name' => 'Ginowan - 宜野湾市'],
            ['name' => 'Urasoe - 浦添市'],
            ['name' => 'Ishigaki - 石垣市'],
            ['name' => 'Itoman - 糸満市'],
            ['name' => 'Uruma - うるま市'],
            ['name' => 'Nago - 名護市'],
            ['name' => 'Tomigusuku - 豊見城市'],
            ['name' => 'Nanjo - 南城市'],
            ['name' => 'Miyakojima - 宮古島市'],
            ['name' => 'Yonabaru - 与那原町'],
            ['name' => 'Yaese - 八重瀬町'],
            ['name' => 'Chatan - 北谷町'],
            ['name' => 'Nakagusuku - 中城村'],
            ['name' => 'Okinawa - 沖縄市'],
            ['name' => 'Ginoza - 宜野座村'],
            ['name' => 'Kin - 金武町'],
            ['name' => 'Kitanakagusuku - 北中城村'],
            ['name' => 'Haebaru - 南風原町'],
            ['name' => 'Onna - 恩納村'],
            ['name' => 'Motobu - 本部町'],
            ['name' => 'Taketomi - 竹富町'],
            ['name' => 'Zamami - 座間味村'],
            ['name' => 'Iheya - 伊平屋村'],
            ['name' => 'Aguni - 粟国村'],
            ['name' => 'Izena - 伊是名村'],
            ['name' => 'Ie - 伊江村'],
            ['name' => 'Tonaki - 渡名喜村'],
            ['name' => 'Taketomi - 竹富町'],
            ['name' => 'Yonaguni - 与那国町'],
            ['name' => 'Yomitanzan - 読谷山村'],
        ];

        DB::table('locations')->insert($records);
    }
}
