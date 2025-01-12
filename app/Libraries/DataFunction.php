<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class DataFunction
{
    public static function getCountryList()
    {
        try {
            return Cache::remember('cache-country-list', 1440, function () {
                return DB::table('areas')
                    ->select(DB::raw('CONCAT(area_name, "-", area_name_local) as area_name_full'), 'id')
                    ->where('is_active', 1)
                    ->where('area_type_code', 'country')
                    ->pluck('area_name_full', 'id');
            });
        } catch (Exception $e) {
            Log::error('Error occurred : [DAFN-1001]', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            return ["" => "Something went wrong"];
        }
    }

    public static function getLostAndFoundCategoryList()
    {
        try {
            return Cache::remember('cache-lost-and-found-category-list', 1440, function () {
                return DB::table('lost_and_found_categories')
                    ->where('is_active', 1)
                    ->pluck('name', 'id');
            });
        } catch (Exception $e) {
            Log::error('Error occurred : [DAFN-1002]', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            return ["" => "Something went wrong"];
        }
    }
   
}
