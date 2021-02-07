<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Area;
use App\Models\Residence;
use App\Models\Category;
use App\Models\ResCategory;
use Cookie;

class ResidenceController extends Controller
{
    public function residences(Request $r, $type)
    {
    	
        $current_city = Cookie::get('current_city');
        if (!$current_city) {
            $current_city = 2;
        }
        $areas = Area::where('city_id', $current_city)->pluck('id')->toArray();

        $areasSelect = Area::where('city_id', $current_city)->get();

        $areasId = Area::where('city_id', $current_city)->pluck('id')->toArray();

        $filter = $r->all();
        $filter['type_object'] = "residence";
        
    	switch ($type) {
    		case 'all':
    			$queryItem = Residence::Main($areasId);
                if (!empty($filter)) {
                    $queryItem = $queryItem->when(isset($filter['roomsfrom']), function ($query) use ($filter){
                        return $query->where('all_flats', '>=', $filter['roomsfrom']);  
                    })->when(isset($filter['roomsto']), function ($query) use ($filter){
                        return $query->where('all_flats', '<=', $filter['roomsto']);  
                    })->when(isset($filter['area']), function ($query) use ($filter){
                        return $query->where('area_id', '=', $filter['area']);  
                    });
                }


                $list = $queryItem->paginate(13);

    			break;
    		
    		default:
                $category = ResCategory::where('slug', $type)->first();
                if ($category){
                    $residenceArr = $category->areaResidence->pluck('id')->toArray();
                    $queryItem = Residence::Main($areasId)->whereIn('id', $residenceArr);
                    if (!empty($filter)) {
                        $queryItem = $queryItem->when(isset($filter['roomsfrom']), function ($query) use ($filter){
                            return $query->where('all_flats', '>=', $filter['roomsfrom']);  
                        })->when(isset($filter['roomsto']), function ($query) use ($filter){
                            return $query->where('all_flats', '<=', $filter['roomsto']);  
                        })->when(isset($filter['area']), function ($query) use ($filter){
                            return $query->where('area_id', '=', $filter['area']);  
                        });
                    }
                    $filter['category_id'] = $category->id;
                    $list = $queryItem->paginate(13);
                    $category_name = "ЖК ".$category->name;

                } else {
                    return abort(404);
                }
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

        $page_title = "Жилые комплексы  | Seven";
        $page_head = $category_name ?? "Жилые комплексы";

    	return view('pages.residences', compact('list', 'areasSelect', 'filter', 'data_backend', 'page_title', 'page_head'));
    }

    public function residenceItem(Request $r, Residence $residence)
    {
     
        
        $current_city = Cookie::get('current_city');
        if (!$current_city) {
            $current_city = 2;
        }

        $meta_lon = $residence->longitude;
        $meta_lat = $residence->latitude;

        $areas = Area::where('city_id', $current_city)->pluck('id')->toArray();

        $areasSelect = Area::where('city_id', $current_city)->get();

        $areasId = Area::where('city_id', $current_city)->pluck('id')->toArray();

        $filter = $r->all();
        
       
        $queryItem = Item::where('residence_id', $residence->id);
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
              
        $page_title = $residence->name." | Seven";

        return view('pages.residence_item', compact('residence', 'list', 'filter', 'areasSelect', 'page_title', 'meta_lon', 'meta_lat'));
    }

   
}
