<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class Pro_TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            ['name' => 'House - 住宅'],
            ['name' => 'Apartment - アパート'],
            ['name' => 'Condominium - コンドミニアム'],
            ['name' => 'Townhouse - タウンハウス'],
            ['name' => 'Villa - 別荘'],
            ['name' => 'Duplex - デュプレックス'],
            ['name' => 'Studio - スタジオ'],
            ['name' => 'Loft - ロフト'],
            ['name' => 'Penthouse - ペントハウス'],
            ['name' => 'Land - 土地'],
            ['name' => 'Commercial Building - 商業ビル'],
            ['name' => 'Office Space - オフィススペース'],
            ['name' => 'Retail Space - 小売スペース'],
            ['name' => 'Warehouse - 倉庫'],
            ['name' => 'Industrial Property - 工業用地'],
            ['name' => 'Farm or Agricultural Land - 農地'],
            ['name' => 'Vacation Rental - バケーションレンタル'],
            ['name' => 'Mobile Home - モービルホーム'],
            ['name' => 'Garage or Parking Space - ガレージまたは駐車場'],
            ['name' => 'Other - その他'],
        ];

        DB::table('pro_types')->insert($records);
    }
}
