<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Area;
use Cookie;
use Storage;
use PDF;
use View;
use Redirect;
use Image;


class ItemController extends Controller
{
    public function item(Item $item)
    {
    	$item->load('area', 'residence', 'type', 'imagesActive', 'commentsActive');
    	$itemoptions = json_decode($item->option);
        $meta_lon = $item->longitude;
        $meta_lat = $item->latitude;

        $areaId = $item->area->id ?? 0;
        $categoryArr = $item->category()->pluck('category_id')->toArray();
        
        $similarItems = Item::where('area_id', $areaId)->with(['category' => function ($query) use ($categoryArr) {
            $query->whereIn('category_id', $categoryArr);
        }])->get();

        $newItems = Item::where('area_id', $areaId)->with(['category' => function ($query) use ($categoryArr) {
            $query->whereIn('category_id', $categoryArr);
        }])->latest()->take(4)->get();
        //dd($similarItem);
        $page_title = $item->name." | Seven";

    	return view('pages.item', compact('item', 'itemoptions', 'similarItems', 'newItems', 'meta_lon', 'meta_lat', 'page_title'));
    }

    public function apartments(Request $r, $type)
    {
    	

        $current_city = Cookie::get('current_city');
        if (!$current_city) {
            $current_city = 2;
        }
        $areas = Area::where('city_id', $current_city)->pluck('id')->toArray();

        $areasSelect = Area::where('city_id', $current_city)->get();

        $areasId = Area::where('city_id', $current_city)->pluck('id')->toArray();

        $filter = $r->all();
        
    	switch ($type) {
    		case 'all':
    			$queryItem = Item::Main($areasId);
                if (!empty($filter)) {
                    $queryItem = $queryItem->when(isset($filter['pricefrom']), function ($query) use ($filter){
                        return $query->where('price', '>=', $filter['pricefrom']);  
                    })->when(isset($filter['priceto']), function ($query) use ($filter){
                        return $query->where('price', '<=', $filter['priceto']);  
                    })->when(isset($filter['roomsfrom']), function ($query) use ($filter){
                        return $query->where('all_rooms', '>=', $filter['roomsfrom']);  
                    })->when(isset($filter['roomsto']), function ($query) use ($filter){
                        return $query->where('all_rooms', '<=', $filter['roomsto']);  
                    })->when(isset($filter['squarefrom']), function ($query) use ($filter){
                        return $query->where('square', '>=', $filter['squarefrom']);  
                    })->when(isset($filter['squareto']), function ($query) use ($filter){
                        return $query->where('square', '<=', $filter['squareto']);  
                    })->when(isset($filter['area']), function ($query) use ($filter){
                        return $query->where('area_id', '=', $filter['area']);  
                    });
                }

                if (isset($filter['orderprice']) && ($filter['orderprice']== 'asc')){
                    $queryItem->orderBy('price', 'ASC');
                }

                if (isset($filter['orderprice']) && ($filter['orderprice']== 'desc')){
                    $queryItem->orderBy('price', 'DESC');
                }

                $list = $queryItem->paginate(13);
                $minRooms = $queryItem->min('all_rooms');
                $maxRooms = $queryItem->max('all_rooms');
    			break;
    		
    		default:
    			return abort(404);
    	}

        // Meta tag - data-backend
        $filterArr = array_filter($filter, function($value) {
                  return !is_null($value) && $value !== ''; 
            });
        $filterArr['city_id'] = $current_city;
        $dataBackendArray = [
            'token' => csrf_token(),
            'filter' => $filterArr,
        ];
        $data_backend   = json_encode($dataBackendArray);

        $page_title = "Квартиры | Seven";
        //return view('pages.test_react', compact('list', 'areasSelect', 'filter', 'data_backend', 'page_title'));
    	return view('pages.apartments', compact('list', 'areasSelect', 'filter', 'data_backend', 'page_title', 'minRooms', 'maxRooms'));
    }

    public function apartmentsReact(Request $r, $type)
    {
        

        $current_city = Cookie::get('current_city');
        if (!$current_city) {
            $current_city = 2;
        }
        $areas = Area::where('city_id', $current_city)->pluck('id')->toArray();

        $areasSelect = Area::where('city_id', $current_city)->get();

        $areasId = Area::where('city_id', $current_city)->pluck('id')->toArray();

        $filter = $r->all();
        
        switch ($type) {
            case 'all':
                $queryItem = Item::Main($areasId);
                if (!empty($filter)) {
                    $queryItem = $queryItem->when(isset($filter['pricefrom']), function ($query) use ($filter){
                        return $query->where('price', '>=', $filter['pricefrom']);  
                    })->when(isset($filter['priceto']), function ($query) use ($filter){
                        return $query->where('price', '<=', $filter['priceto']);  
                    })->when(isset($filter['roomsfrom']), function ($query) use ($filter){
                        return $query->where('all_rooms', '>=', $filter['roomsfrom']);  
                    })->when(isset($filter['roomsto']), function ($query) use ($filter){
                        return $query->where('all_rooms', '<=', $filter['roomsto']);  
                    })->when(isset($filter['squarefrom']), function ($query) use ($filter){
                        return $query->where('square', '>=', $filter['squarefrom']);  
                    })->when(isset($filter['squareto']), function ($query) use ($filter){
                        return $query->where('square', '<=', $filter['squareto']);  
                    })->when(isset($filter['area']), function ($query) use ($filter){
                        return $query->where('area_id', '=', $filter['area']);  
                    });
                }

                if (isset($filter['orderprice']) && ($filter['orderprice']== 'asc')){
                    $queryItem->orderBy('price', 'ASC');
                }

                if (isset($filter['orderprice']) && ($filter['orderprice']== 'desc')){
                    $queryItem->orderBy('price', 'DESC');
                }

                $list = $queryItem->paginate(13);
                $minRooms = $queryItem->min('all_rooms');
                $maxRooms = $queryItem->max('all_rooms');
                break;
            
            default:
                return abort(404);
        }

        // Meta tag - data-backend
        $filterArr = array_filter($filter, function($value) {
                  return !is_null($value) && $value !== ''; 
            });
        $filterArr['city_id'] = $current_city;
        $dataBackendArray = [
            'token' => csrf_token(),
            'filter' => $filterArr,
        ];
        $data_backend   = json_encode($dataBackendArray);

        $page_title = "Квартиры | Seven";
        return view('pages.test_react', compact('list', 'areasSelect', 'filter', 'data_backend', 'page_title', 'minRooms', 'maxRooms'));
    }

    public function downloadPdf(Item $item)
    {
        $item->load('area', 'residence', 'type', 'imagesActive', 'commentsActive');
        $itemoptions = json_decode($item->option);
        $text = View::make('pages.pdf_text', compact('item', 'itemoptions'))->render();

        

        $pdf_name = 'apartments'.$item->id.'.pdf';
        $path = public_path('/pdf/' . $pdf_name);
        if(!is_dir(public_path('/pdf/'))) {
            mkdir(public_path('/pdf/'), 0777, true);
        }

        if (($item->latitude != '') and ($item->longitude != '') ){
            $url = "https://maps.googleapis.com/maps/api/staticmap?center=".$item->latitude.",".$item->longitude."&zoom=12&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C".$item->latitude.",".$item->longitude."&key=";

            $maps = file_get_contents($url);
            $image_path = public_path('/pdf/map_image'.$item->id.'.png');
            $image = Image::make($maps)->save($image_path);
            //dd($image);
        }
        
       

        $pdf = PDF::loadHtml($text)->save($path);

        return redirect(url('/pdf/' . $pdf_name));
    }

    public function __call($method, $parameters)
    {
        return view('pages.in_work');
    }
   
}
