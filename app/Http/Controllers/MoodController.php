<?php

namespace App\Http\Controllers;

use Response;
use Request;
use Validator;
use App\Models\Mood;

class MoodController extends Controller
{
    public static $feels = ['hayyp', 'good', 'anger', 'sorrow', 'fear', 'evil', 'surprise', 'cps'];

    public function show()
    {
        // return Mood::getFellGroupByCity();
    }

    public function index()
    {
        $result = Mood::getFellGroupByCity();
        return Response::json($result);
    }
}