<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class WebController
{

    public function index()
    {
        return view("Web::pages.index");
    }

    public function generate()
    {
        $filePath = public_path('uploads/areas/countries_001.json');

        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $countriesData = json_decode($jsonContent, true);
            $data = $countriesData[2]['data'];

            $countries = [];

            foreach ($data as $country) {
                $countries[] = [
                    "area_type_code" => 'country',
                    "area_name" => $country['en_short_name'] ?? null,
                    "area_name_local" => $country['en_short_name'] ?? null,
                    "area_parent_id" => null,
                    "area_iso2" => $country['alpha_2_code'] ?? null,
                    "area_iso3" => $country['alpha_3_code'] ?? null,
                    "area_code" => $country['alpha_3_code'] ?? null,
                    "area_latitude" => $country['latitude'] ?? null,
                    "area_longitude" => $country['longitude'] ?? null,
                    "area_image" => null,
                    "is_active" => 1,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ];
            }

            // Manually format the array as a PHP string
            // $output = "<?php\n\n\$countries = array();\n\n";
            // foreach ($countries as $country) {
            //     $output .= "\$countries[] = array(\n";
            //     foreach ($country as $key => $value) {
            //         $value = $value === null ? 'NULL' : (is_numeric($value) ? $value : "'" . addslashes($value) . "'");
            //         $output .= "    \"$key\" => $value,\n";
            //     }
            //     $output .= ");\n\n";
            // }


            //$outputFilePath = public_path('uploads/areas/countries_001.php');
            //file_put_contents($outputFilePath, $output);

            // Encode the $countries array into JSON format
            $jsonOutput = json_encode($countries, JSON_PRETTY_PRINT);

            $outputFilePath = public_path('assets/data/areas/countries.json');
            file_put_contents($outputFilePath, $jsonOutput);

            return "Conversion completed! Output saved to: $outputFilePath";
        } else {
            return "File not found: $filePath";
        }
    }
}
