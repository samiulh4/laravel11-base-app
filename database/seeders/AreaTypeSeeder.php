<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = now();
        $data = [
            ['area_type_name' => 'Continent', 'area_type_code' => 'continent', 'is_active' => 1, 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['area_type_name' => 'Country', 'area_type_code' => 'country', 'is_active' => 1, 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['area_type_name' => 'Division', 'area_type_code' => 'division', 'is_active' => 1, 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['area_type_name' => 'District', 'area_type_code' => 'district', 'is_active' => 1, 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['area_type_name' => 'Thana', 'area_type_code' => 'thana', 'is_active' => 1, 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['area_type_name' => 'City', 'area_type_code' => 'city', 'is_active' => 1, 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['area_type_name' => 'Village', 'area_type_code' => 'village', 'is_active' => 1, 'created_at' => $timestamp, 'updated_at' => $timestamp],
         ];
        DB::table('areas_type')->truncate();
        DB::table('areas_type')->insert($data);
    }
}
