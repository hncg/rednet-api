<?php

namespace App\Models;

use DB;

class City
{

    private static $table = "city";

    public static function getMap()
    {
        $citys = DB::table(self::$table)->get();
        $cityMap = [];
        foreach ($citys as $city) {
            $cityMap[$city->id] = $city;
        }
        return $cityMap;
    }
}