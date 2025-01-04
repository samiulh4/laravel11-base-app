<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AreaDivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = Carbon::now();
        $divisions = [
            [
                'area_type_code' => 'division',
                'area_name' => 'ঢাকা',
                'area_parent_id' => null,
                'area_code' => 'BD-13',
                'area_latitude' => '23.8103',
                'area_longitude' => '90.4125',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'division',
                'area_name' => 'চট্টগ্রাম',
                'area_parent_id' => null,
                'area_code' => 'BD-12',
                'area_latitude' => '22.3569',
                'area_longitude' => '91.7832',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'division',
                'area_name' => 'রাজশাহী',
                'area_parent_id' => null,
                'area_code' => 'BD-14',
                'area_latitude' => '24.3636',
                'area_longitude' => '88.6241',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'division',
                'area_name' => 'খুলনা',
                'area_parent_id' => null,
                'area_code' => 'BD-04',
                'area_latitude' => '22.8456',
                'area_longitude' => '89.5403',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'division',
                'area_name' => 'বরিশাল',
                'area_parent_id' => null,
                'area_code' => 'BD-06',
                'area_latitude' => '22.7010',
                'area_longitude' => '90.3535',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'division',
                'area_name' => 'সিলেট',
                'area_parent_id' => null,
                'area_code' => 'BD-05',
                'area_latitude' => '24.8949',
                'area_longitude' => '91.8687',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'division',
                'area_name' => 'রংপুর',
                'area_parent_id' => null,
                'area_code' => 'BD-16',
                'area_latitude' => '25.7439',
                'area_longitude' => '89.2752',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'division',
                'area_name' => 'ময়মনসিংহ',
                'area_parent_id' => null,
                'area_code' => 'BD-34',
                'area_latitude' => '24.7471',
                'area_longitude' => '90.4203',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ];
        
        DB::table('areas')->where('area_type_code', 'division')->delete();
        DB::table('areas')->insert($divisions);
    }
}
