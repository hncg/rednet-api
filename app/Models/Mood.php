<?php

namespace App\Models;

use DB;
use App\Models\City;

class Mood
{

    private static $table = "mood";

    public static function getFellGroupByCity()
    {
        $timeAt = date("Y-m-d", time());
        $moods = DB::table(self::$table)->where('time_at', '=' , $timeAt)
            ->groupBy('city_id')->get();
        $cityMap = City::getMap();
        foreach ($moods as &$mood) {
            $mood->city = $cityMap[$mood->city_id]->name;
        }
        unset($mood);
        return $moods;
    }
}