<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AreaCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $filePath = public_path('assets/data/areas/countries.json');
        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $countriesData = json_decode($jsonContent, true);

            $countries = [];
            foreach ($countriesData as $country) {
                $countries[] = [
                    "area_type_code" => 'country',
                    "area_name" => $country['area_name'] ?? null,
                    "area_name_local" => $country['area_name_local'] ?? null,
                    "area_parent_id" => $country['area_parent_id'] ?? null,
                    "area_iso2" => $country['area_iso2'] ?? null,
                    "area_iso3" => $country['area_iso3'] ?? null,
                    "area_code" => $country['area_code'] ?? null,
                    "area_latitude" => $country['area_latitude'] ?? null,
                    "area_longitude" => $country['area_longitude'] ?? null,
                    "area_image" => $country['area_image'] ?? null,
                    "is_active" => 1,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ];
            }

            DB::table('areas')->where('area_type_code', 'country')->delete();
            DB::table('areas')->insert($countries);
        }
    }
}
