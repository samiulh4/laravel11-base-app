<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaContinentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $continents = [
            [
                'area_name' => 'Africa',
                'area_code' => 'AF',
                'area_latitude' => '-8.7832',
                'area_longitude' => '34.5085',
                'area_type_code' => 'continent',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'area_name' => 'Antarctica',
                'area_code' => 'AN',
                'area_latitude' => '-82.8628',
                'area_longitude' => '135.0000',
                'area_type_code' => 'continent',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'area_name' => 'Asia',
                'area_code' => 'AS',
                'area_latitude' => '34.0479',
                'area_longitude' => '100.6197',
                'area_type_code' => 'continent',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'area_name' => 'Europe',
                'area_code' => 'EU',
                'area_latitude' => '54.5260',
                'area_longitude' => '15.2551',
                'area_type_code' => 'continent',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'area_name' => 'North America',
                'area_code' => 'NA',
                'area_latitude' => '54.5260',
                'area_longitude' => '-105.2551',
                'area_type_code' => 'continent',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'area_name' => 'Oceania',
                'area_code' => 'OC',
                'area_latitude' => '-22.7359',
                'area_longitude' => '140.0188',
                'area_type_code' => 'continent',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'area_name' => 'South America',
                'area_code' => 'SA',
                'area_latitude' => '-8.7832',
                'area_longitude' => '-55.4915',
                'area_type_code' => 'continent',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('areas')->where('area_type_code', 'continent')->delete();
        DB::table('areas')->insert($continents);
    }
}
