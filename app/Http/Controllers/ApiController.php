<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Area as AreaResource;
use App\Models\Item;
use App\Models\Area;
use App\Models\Residence;
use App\Models\ResCategory;
use App\Models\Category;
use DB; 


class ApiController extends Controller
{
	// Instruction
	/* 
		roomsfrom
		roomsto
		squarefrom
		squerato
		pricefrom
		priceto
		area
		city_id
		category_id
		type_id
	*/
    public function searchItems(Request $r)
    {
    	$areas = array(); $areasRes = [];
    	if (isset($r->area)) {

    		$areas = [$r->area];
    		$areasRes =  new AreaResource(Area::find($r->area));
    	} else if (isset($r->city_id)){

    		//$areas = Area::where('city_id', $r->city_id)->pluck('id')->toArray();
    		$areas = Area::where('city_id', $r->city_id);
            $areasRes =  AreaResource::collection($areas->get());
            $areas = Area::where('city_id', $r->city_id)->pluck('id')->toArray();
    	} 
		$items = [];
		if(isset($r->type_object) && (($r->type_object == 'item') or ($r->type_object == 'special'))){
			if (isset($r->category_id)) {

				$category = Category::where('id', $r->category_id)->with('children')->first();
				//dd($category);
				$sub_cat = $category->children->pluck('id')->toArray();
				$cat_id_array = array_merge($sub_cat, [$category->id]);
				if ($r->type_object == 'special'){
					$cat_id_array = [$category->id];
				}
				
				$itemsArr = Item::WhereHas('categories',  function ($query) use ($cat_id_array) {
						$query = $query->whereIn('categories.id', $cat_id_array);
					})->select('id')->groupBy('id')->pluck('id')->toArray();

				//$querySearch = Item::query();
				$querySearch = Item::where('active', 1)->whereIn('id', $itemsArr); 

				if (isset($r->pricefrom)) {
					$querySearch = $querySearch->where('price', '>=', $r->pricefrom);
				}

				if (isset($r->priceto)) {
					$querySearch = $querySearch->where('price', '<=', $r->priceto);
				}

				if (isset($r->type_id)) {
					$querySearch = $querySearch->where('type_id', '=', $r->type_id);
				}

				if (isset($r->area)) {
					$querySearch = $querySearch->where('area_id', '=', $r->area);
				} else if(isset($r->city_id)) {
					$querySearch = $querySearch->whereIn('area_id', $areas);
				}

				if (isset($r->roomsfrom)) {
					$querySearch = $querySearch->where('all_rooms', '>=', $r->roomsfrom);
				}

				if (isset($r->roomsto)) {
					$querySearch = $querySearch->where('all_rooms', '<=', $r->roomsto);
				}

				if (isset($r->squarefrom)) {
					$querySearch = $querySearch->where('square', '>=', $r->squarefrom);
				}

				if (isset($r->squareto)) {
					$querySearch = $querySearch->where('square', '<=', $r->squareto);
				}

				if ($r->type_object == 'special') {
					$querySearch = $querySearch->where('offer_index', '>', 0);
				}

				$items = $querySearch->get();
				$items->append('imagesApi');	
				
			} else {
				$querySearch = Item::query();

				if (isset($r->pricefrom)) {
					$querySearch = $querySearch->where('price', '>=', $r->pricefrom);
				}

				if (isset($r->priceto)) {
					$querySearch = $querySearch->where('price', '<=', $r->priceto);
				}

				if (isset($r->type_id)) {
					$querySearch = $querySearch->where('type_id', '=', $r->type_id);
				}

				if (isset($r->area)) {
					$querySearch = $querySearch->where('area_id', '=', $r->area);
				} else if(isset($r->city_id)) {
					$querySearch = $querySearch->whereIn('area_id', $areas);
				}

				if (isset($r->roomsfrom)) {
					$querySearch = $querySearch->where('all_rooms', '>=', $r->roomsfrom);
				}

				if (isset($r->roomsto)) {
					$querySearch = $querySearch->where('all_rooms', '<=', $r->roomsto);
				}

				if (isset($r->squarefrom)) {
					$querySearch = $querySearch->where('square', '>=', $r->squarefrom);
				}

				if (isset($r->squareto)) {
					$querySearch = $querySearch->where('square', '<=', $r->squareto);
				}

				
				
				$items = $querySearch->get();
				$items->append('imagesApi');
				//dd($items);
				
			}
		}

    	$zhks = [];
		if((isset($r->type_object) && $r->type_object == 'residence')){
			if (isset($r->category_id)) {
				$category = ResCategory::where('id', $r->category_id)->first();
				$residenceArr = $category->areaResidence->pluck('id')->toArray();
	            $queryItem = Residence::Main($areas)->whereIn('id', $residenceArr);
	            $zhks = $queryItem->get();
	                
			} elseif (isset($r->area)){
				$zhks = Residence::where('area_id', '=', $r->area)->get();
			} elseif (isset($r->city_id) and isset($areas)){
				$zhks = Residence::whereIn('area_id', $areas)->get();
			}

			$zhks->append('imagesApi');
			$zhks->append('minPrice');
			$zhks->append('maxPrice');
			$zhks->append('minSquare');
			$zhks->append('maxSquare');
			$zhks->append('ItemsCount');
		}
		
    	$data = [
    		'areas' => $areasRes,
    		'objects' => $items,
    		'zhks'	=> $zhks
    	];

    	return response()->json($data);
    }
}



