<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Cookie;

class CityController extends Controller
{
    public function changeCity(City $city)
    {
    	$minutes = 15;
        Cookie::queue('current_city', $city->id, $minutes);
        Cookie::queue('current_city_title', $city->name, $minutes);
    	return redirect()->back();
    }
}
