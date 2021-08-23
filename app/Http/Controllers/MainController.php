<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Area;
use Validator;
use Storage;
// use Cookie;
use Illuminate\Support\Facades\Cookie;

class MainController extends Controller
{
    public function index()
    {
    	$current_city = Cookie::get('current_city');
        if (!$current_city) {
            $current_city = 2;
        }
        $areas = Area::where('city_id', $current_city)->pluck('id')->toArray();


    	$list = Category::offers()->with(['offerItems' => function ($query) use ($areas) {
		    $query->whereIn('area_id', $areas);
		}])->get();

        // dd($list);
        $specialItemCount = 0;
        foreach($list as $category){
            $specialItemCount += $category->offerItems->count();
        }

    	return view('pages.index', compact('list', 'specialItemCount'));
    }


    public function contacts()
    {
        return view('pages.contacts');
    }


}
