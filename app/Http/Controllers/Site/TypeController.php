<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Area;
use App\Models\Item;
use Cookie;

class TypeController extends Controller
{
    public function list(Request $r, Type $type)
    {
    	$type->load('typeItems');
    	$typeId = $type->id;

    	$current_city = Cookie::get('current_city');
        if (!$current_city) {
            $current_city = 2;
        }
        $filter = $r->all();
        
    	$areas = Area::where('city_id', $current_city)->pluck('id')->toArray();
    	$itemsArr = $type->typeItems->pluck('id')->toArray();

		$queryItem = Item::Main($areas)->whereIn('id', $itemsArr); 

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

        // $queryItem = $queryItem->with(['categories' => function($query) use ($categoryId) {
        // 	$query->where('categories.id', $categoryId); 
        // }]);

        $list = $queryItem->paginate(13);
        $minRooms = $queryItem->min('all_rooms');
        $maxRooms = $queryItem->max('all_rooms');
		
    		

        $areasSelect = Area::where('city_id', $current_city)->get();
    	
        // Meta tag - data-backend
        $filterArr = array_filter($filter, function($value) {
                  return !is_null($value) && $value !== ''; 
            });
        $filterArr['city_id'] = $current_city;
        $filterArr['type_id'] = $typeId;
        $dataBackendArray = [
            'token' => csrf_token(),
            'filter' => $filterArr,
        ];
        $data_backend   = json_encode($dataBackendArray);
    	
        $page_title = $type->name." | Seven";
        $page_head = $type->name;

    	return view('pages.apartments', compact('list', 'areasSelect', 'filter', 'data_backend', 'page_title', 'page_head', 'minRooms', 'maxRooms'));
    	//return view('pages.category', compact('category'));
    }
}
