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

    //не знаю как передать конкретный параметры через роут в метод контроллера, обойдемся обертками
    public function sectionNews(Request $request)
    {
        $section_title='Новости';
        $filter=[];
        $filter['active']=1;
        $filter['section']='news';
        $category=$request->query('category');
        if($category)
        {
            $filter['params->category']=$category;
        }
        $pages = Page::where($filter)->paginate(7)->withQueryString();
        return view('pages.section_news', compact('pages', 'section_title'));
    }

    public function sectionAnalytics()
    {
        $section_title = 'Аналитика';
        $pages = Page::where('section', 'analytics')->paginate(20)->withQueryString();
        return view('pages.section_analytics', compact('pages', 'section_title'));
    }

    public function sectionWebinars()
    {
        $section_title = 'Вебинары';
        $pages = Page::where('section', 'webinars')->paginate(20)->withQueryString();
        return view('pages.section_webinars', compact('pages', 'section_title'));
    }

    public function __call($method, $parameters)
    {
        return view('pages.in_work');
    }

}
