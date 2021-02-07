<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Page;

class PageController extends Controller
{
    public function contacts()
    {	
    	$page_title = "Контакты | Seven";
    	return view('pages.contacts', compact('page_title'));
    }

    public function page(Page $page)
    {
    	return view('pages.page', compact('page'));
    }

    public function __call($method, $parameters)
    {
        return view('pages.in_work');
    }
   
}
