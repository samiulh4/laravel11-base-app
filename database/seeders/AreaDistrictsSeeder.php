<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = $this->getDistricts();
        $this->deleteExistingDistricts();
        $this->insertDistricts($districts);
    }

    /**
     * Delete existing district entries.
     */
    private function deleteExistingDistricts(): void
    {
        DB::table('areas')->where('area_type_code', 'district')->delete();
    }

    /**
     * Insert district entries.
     */
    private function insertDistricts(array $districts): void
    {
        DB::table('areas')->insert($districts);
    }

    /**
     * Get districts data.
     */
    private function getDistricts(): array
    {
        $timestamp = now();
        return [
            [
                'area_type_code' => 'district',
                'area_name' => 'Bagerhat',
                'area_parent_id' => null,
                'area_code' => 'BD-01',
                'area_latitude' => '22.65157',
                'area_longitude' => '89.78594',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Bandarban',
                'area_parent_id' => null,
                'area_code' => 'BD-02',
                'area_latitude' => '22.1956',
                'area_longitude' => '92.2196',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Barguna',
                'area_parent_id' => null,
                'area_code' => 'BD-03',
                'area_latitude' => '22.0906',
                'area_longitude' => '90.0736',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Barisal',
                'area_parent_id' => null,
                'area_code' => 'BD-04',
                'area_latitude' => '22.7010',
                'area_longitude' => '90.3535',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Bhola',
                'area_parent_id' => null,
                'area_code' => 'BD-05',
                'area_latitude' => '22.9396',
                'area_longitude' => '90.6611',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Bogra',
                'area_parent_id' => null,
                'area_code' => 'BD-06',
                'area_latitude' => '24.8470',
                'area_longitude' => '89.3730',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Brahmanbaria',
                'area_parent_id' => null,
                'area_code' => 'BD-07',
                'area_latitude' => '23.0000',
                'area_longitude' => '91.1000',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Chandpur',
                'area_parent_id' => null,
                'area_code' => 'BD-08',
                'area_latitude' => '23.2290',
                'area_longitude' => '90.6690',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Chattogram',
                'area_parent_id' => null,
                'area_code' => 'BD-09',
                'area_latitude' => '22.3569',
                'area_longitude' => '91.7832',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Chuadanga',
                'area_parent_id' => null,
                'area_code' => 'BD-10',
                'area_latitude' => '23.6340',
                'area_longitude' => '88.5440',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Comilla',
                'area_parent_id' => null,
                'area_code' => 'BD-11',
                'area_latitude' => '23.4620',
                'area_longitude' => '91.1810',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Cox\'s Bazar',
                'area_parent_id' => null,
                'area_code' => 'BD-12',
                'area_latitude' => '21.4500',
                'area_longitude' => '92.0190',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Cumilla',
                'area_parent_id' => null,
                'area_code' => 'BD-13',
                'area_latitude' => '23.4620',
                'area_longitude' => '91.1810',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Dhaka',
                'area_parent_id' => null,
                'area_code' => 'BD-14',
                'area_latitude' => '23.8103',
                'area_longitude' => '90.4125',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'area_type_code' => 'district',
                'area_name' => 'Dinajpur',
                'area_parent_id' => null,
                'area_code' => 'BD-15',
                'area_latitude' => '25.4620',
                'area_longitude' => '88.6260',
                'is_active' => 1,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ];
    }
}
