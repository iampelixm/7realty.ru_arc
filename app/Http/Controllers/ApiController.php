<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Area as AreaResource;
use App\Models\Item;
use App\Models\Area;
use App\Models\Residence;
use App\Models\ResCategory;
use App\Models\Category;
use App\Models\City;
use App\Models\ItemCategory;
use App\Models\ItemOption;
use App\Models\Option;
use App\Models\Type;
use App\Models\User;
use Carbon\Carbon;
use Rodenastyle\StreamParser\StreamParser;
use DB;
use Illuminate\Support\Str;
use Storage;

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
    public $errors;
    public $load_counter;
    public function searchItems(Request $r)
    {
        $areas = array();
        $areasRes = [];
        if (isset($r->area)) {

            $areas = [$r->area];
            $areasRes =  new AreaResource(Area::find($r->area));
        } else if (isset($r->city_id)) {

            //$areas = Area::where('city_id', $r->city_id)->pluck('id')->toArray();
            $areas = Area::where('city_id', $r->city_id);
            $areasRes =  AreaResource::collection($areas->get());
            $areas = Area::where('city_id', $r->city_id)->pluck('id')->toArray();
        }
        $items = [];
        if (isset($r->type_object) && (($r->type_object == 'item') or ($r->type_object == 'special'))) {
            if (isset($r->category_id)) {

                $category = Category::where('id', $r->category_id)->with('children')->first();
                //dd($category);
                $sub_cat = $category->children->pluck('id')->toArray();
                $cat_id_array = array_merge($sub_cat, [$category->id]);
                if ($r->type_object == 'special') {
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
                } else if (isset($r->city_id)) {
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
                } else if (isset($r->city_id)) {
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
        if ((isset($r->type_object) && $r->type_object == 'residence')) {
            if (isset($r->category_id)) {
                $category = ResCategory::where('id', $r->category_id)->first();
                $residenceArr = $category->areaResidence->pluck('id')->toArray();
                $queryItem = Residence::Main($areas)->whereIn('id', $residenceArr);
                $zhks = $queryItem->get();
            } elseif (isset($r->area)) {
                $zhks = Residence::where('area_id', '=', $r->area)->get();
            } elseif (isset($r->city_id) and isset($areas)) {
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
            'zhks'    => $zhks
        ];

        return response()->json($data);
    }

    public function parse7realtyFeed(Request $request)
    {
        StreamParser::xml('ourfeed.xml')->each(function ($rec) {
            if (gettype($rec) == 'object') {
                // dd($rec);
                // if (!$this->load_counter) $this->load_counter = 0;
                // $this->load_counter++;
                // if ($this->load_counter > 5) {
                // 	return '';
                // }
                $item = [];
                $xml_agent = $rec->get('agent')->collapse();
                $agent = [];
                $agent['phone'] = $xml_agent->get('phone') ?? '';
                $agent['name'] = $xml_agent->get('name') ?? '';
                $agent['email'] = $xml_agent->get('email') ?? '';
                $agent['category'] = $xml_agent->get('category') ?? '';
                $agent['description'] = $xml_agent->get('description') ?? '';
                $agent['position'] = $xml_agent->get('organization') ?? '';

                $item['agent'] = $agent;

                $item['price'] = $rec->get('price')->get('price');
                $item['currency'] = $rec->get('price')->get('currency') ?? 'RUR';
                $item['ext_id'] = $rec->get('internal-id');
                $item['order_type'] = $rec->get('order_type');
                $item['category'] = explode('/', $rec->get('category-path'));
                $item['id'] = $rec->get('internal-id');
                $item['updated'] = Carbon::parse($rec->get('last-update-date'));
                $item['link'] = $rec->get('link');

                $item['mainpage_slider'] = $rec->get('mainpage_slider');
                $item['mainpage_special'] = $rec->get('mainpage_special');
                $item['mainpage_hot'] = $rec->get('mainpage_hot');
                $item['invest_hidden'] = $rec->get('invest_hidden');
                $item['invest_construction'] = $rec->get('invest_construction');
                $item['invest_rental'] = $rec->get('invest_rental');

                $item['title'] = $rec->get('title');

                $item['region'] = $rec->get('region');
                // dd($item);
                $item['city'] = $rec->get('city');
                $item['city_area'] = $rec->get('city_area');
                $item['street'] = $rec->get('street');
                $item['house_num'] = $rec->get('house_num');

                $item['ned_type'] = $rec->get('ned_type');

                $item['latitude'] = $rec->get('lattitude');
                $item['longitude'] = $rec->get('longtitude');

                $item['description'] = $rec->get('description');
                if ($rec->get('youtube_video_link')) {
                    $item['youtube_video_link'] = $rec->get('youtube_video_link');
                } else {
                    $item['youtube_video_link'] = '';
                }

                // images
                $item['images'] = [];
                foreach ($rec->get('images') as $recimage) {
                    $item['images'][] = $recimage->toArray();
                    // [
                    //     'url'=> $recimage->get('url'),
                    //     'md5' => $recimage->get('md5')
                    // ];
                    // dd($recimage);
                }
                // dd($item['images']);
                // options
                $item['options'] = [];
                foreach ($rec->get('options') as $recoption) {
                    $item['options'][] = $recoption->toArray();
                }

                // dd($item);
                //if($item['updated']->greaterThan($ned->updated_at))
                //var_dump($item['updated']);
                //dd($rec);

                $result = ''; // отличный от пустого результат - наличие ошибки, запишется в массив ошибок
                $result = $this->updateOrCreateItemFromFeed($item);
                // echo $result;
                // echo $rec->get('property-type')."\n";
                //echo $item['category']."\n";
                //dd($item);
                if ($result) {
                    $this->errors['' . $item['id']] = $result;
                }
            }
        });
        echo 'ERRORS:';
        dd($this->errors);
    }

    public function getYandexFeed(Request $request)
    {

        $this->parse7realtyFeed($request);
        return '';

        $errors = [];
        echo '<pre>';
        StreamParser::xml('feed.xml')->each(function ($rec) {
            if (gettype($rec) == 'object') {
                $item = [];
                $xml_agent = $rec->get('agent')->collapse();
                $agent = [];
                $agent['phone'] = $xml_agent->get('phone') ?? '';
                $agent['name'] = $xml_agent->get('name') ?? '';
                $agent['email'] = $xml_agent->get('email') ?? '';
                $agent['category'] = $xml_agent->get('category') ?? '';
                $agent['description'] = $xml_agent->get('description') ?? '';
                $agent['organization'] = $xml_agent->get('organization') ?? '';
                $item['agent'] = $agent;

                $item['price'] = $rec->get('price')->toArray();
                dd($rec->get('price'));
                $item['ext_id'] = $rec->get('internal-id');
                $item['order_type'] = $rec->get('order_type');
                $item['category'] = $rec->get('category');
                $item['id'] = $rec->get('internal-id');
                $item['updated'] = Carbon::parse($rec->get('last-update-date'));
                // dd($rec);
                // dd($item);
                //if($item['updated']->greaterThan($ned->updated_at))
                //var_dump($item['updated']);
                //dd($rec);
                $object = Item::where('extid', $item['ext_id'])->first();
                $result = '';
                if ($object) {
                    if ($item['updated']->greaterThan($object['updated_at'])) {
                        $result = $this->updateOrCreateItemFromFeed($item, $object);
                    }
                    //echo "\n no object with id: ".$item['ext_id'];
                } else {
                    $result = $this->updateOrCreateItemFromFeed($item, null);
                }
                // echo $rec->get('property-type')."\n";
                //echo $item['category']."\n";
                //dd($item);
                if ($result) {
                    $errors['' . $item['id']] = $result;
                }
            }
        });
        echo '</pre>';
        dd($errors);
    }

    /*
		$item - parsed feed data
		$object - items table model to update or null to create new
	*/
    public function updateOrCreateItemFromFeed($item)
    {
        // dd(Option::all());
        // dd(Item::find(190)->option);
        // dd($item);
        $object = Item::where('extid', $item['ext_id'])->first();
        if ($object) {
            if ($object['updated_at']->greaterThan($item['updated'])) {
                echo 'OBJECT EXISTS';
                return '';
            }
        }

        if (!$object) {
            $object = new Item();
        }
        $user = User::where('email', $item['agent']['email'])->first();
        if (!$user) {
            $user = new User();
            $user->name = $item['agent']['name'];
            $user->email = $item['agent']['email'];
            $user->phone = $item['agent']['phone'];
            $user->position = 'broker';
            $user->password = 'nopass';
            if (!$user->save()) {
                echo 'USERERR';
                return 'Не могу создать такого пользователя: ' . print_r($item['agent'], true);
            }
        }

        $type = Type::where('name', $item['ned_type'])->first();
        if (!$type) {
            $type = new Type();
            $type->name = $item['ned_type'];
            $type->active = 1;
            $type->slug = Str::slug($item['ned_type']);
            $type->save();
        }
        // dd($type);
        // "type_id" => 7
        $object->type_id = $type->id;

        foreach ($item['category'] as $xml_category) {
            $category = Category::where('name', $xml_category)->first();
            if (!$category)
                $category = new Category();
            $category->name = $xml_category;
            $category->slug = Str::slug($xml_category);
            $category->active = 1;
            $category->main = 0;
            $category->save();

            if (!$object->categories->firstWhere('id', $category->id)) {
                $category_link = new ItemCategory();
                $category_link->item_id = $object->id;
                $category_link->category_id = $category->id;
                $category_link->save();
            }
            // dd($object->categories);
        }

        $all_options = Option::all();
        // dd(Item::find(190)->option);
        $options = [];
        foreach ($item['options'] as $xml_option) {
            // dd($xml_option);
            $option = $all_options->firstWhere('name', $xml_option['title']);
            // dd($option);
            if (!$option) {
                $option = new Option();
                $option->name = $xml_option['title'];
                $option->slug = Str::slug($xml_option['title']);
                $option->method_input = "string";
                $option->active = 1;
                $option->require = 0;
                $option->values = '';
                $option->save();
            }

            $item_option = [];
            $item_option['value_id'] = $xml_option['option'];
            $item_option['option_id'] = $option->id;
            $item_option['option_type'] = $option->method_input;
            $item_option['value_title'] = $xml_option['option'];
            $item_option['option_title'] = $xml_option['title'];
            $options[] = $item_option;
        }
        $object->option = json_encode($options, JSON_UNESCAPED_UNICODE);

        //IMAGES
        if (is_array($item['images']) && sizeof($item['images']) > 0) {
            //перед сохранением изображений нужно получить ИД объекта
            //а для еще не сохраненного объекта ИД отсутствует, поэтому сохраним что бы получить ИД
            if (!$object->id) {
                $object->save();
            }
            //Удаляем все записи о картинках
            //Вообще нужно бдует сравнивать по хэшу и заменять кратинки если они изменились
            //ну и удалять отсутствующие. А пока так.
            foreach($object->images as $image)
            {
                $image->delete();
                // var_dump($image);
                // echo '<hr>';
            }
            foreach ($item['images'] as $xml_image_i => $xml_image) {
                $url = $xml_image['url'];
                $info = pathinfo($url);
                echo "$url <br>";
                $contents = file_get_contents($url);
                //$token = Uuid::uuid4();
                // dd($info);
                $path = 'public/items/' . $object->id . '/' . $info['basename'];
                $storeres = Storage::put($path, $contents);
                $object->images()->create(
                    [
                        'file' => $info['basename'],
                        'token' => $info['filename'],
                        'order_number' => $xml_image_i
                    ]
                );
                // echo $object->id;
                // dd($storeres);
            }
            // dd($item['images']);
            // dd('array');
        } else {
            dd('not array');
        }
        $object->square = 0;

        $object->special = 0;
        // "square" => 145.0
        // "special" => 0
        $object->special = ($item['mainpage_special'] == 'true' ? 1 : 0);
        // "name" => "Коттеджный посёлок "БЛАГОДАТНЫЙ""
        $object->name = $item['title'];
        // "slug" => "kottedznyi-posyolok-blagodatnyi"
        $object->slug = Str::slug($item['title']);
        // "address" => "Сочи ул. Курортный проспект"
        // dd($item);
        $object->address = $item['street'];
        // "all_rooms" => 1
        $object->all_rooms = 0;

        // "bed_rooms" => 1
        $object->bed_rooms = 0;
        // "bath_rooms" => 1
        $object->bath_rooms = 0;
        // "description" =>
        $object->description = $item['description'];
        // "video_url" => null
        if (preg_match('/^http/', $item['youtube_video_link'])) {
            $object->video_url = $item['youtube_video_link'];
        } else {
            $object->video_url = '';
        }
        // "option" => "[{"value_id": "2", "option_id": "2", "option_type": "hand", "value_title": "2", "option_title": "Этажность"}, {"value_id": "1", "option_id": "5", "option_type": ▶"
        // "longitude" => "39.778221"
        $object->longitude = $item['longitude'];
        // "latitude" => "43.559096"
        $object->latitude = $item['latitude'];
        // "residence_id" => null
        $object->residence_id = null;
        // "area_id" => 3
        $city = City::where('name', $item['city'])->first();
        if (!$city) {
            $city = new City();
            $city->name = $item['city'];
            $city->save();
        }
        // dd($city);
        $area = Area::where('city_id', $city->id)->where('name', $item['city_area'])->first();
        if (!$area) {
            $area = new Area();
            $area->name = $item['city_area'];
            $area->slug = Str::slug($item['city_area']);
            $area->active = 1;
            $area->city_id = $city->id;
            $area->save();
        }
        // dd($area);
        $object->area_id = $area->id;
        // "offer_index" => 13
        // "active" => 1
        $object->active = 1;
        // "added_at" => null
        // "created_at" => "2020-11-25 10:19:45"
        // "updated_at" => "2021-03-29 09:39:27"
        // "user_id" => 24
        $object->user_id = $user->id;
        // "remark" => null
        $object->remark = $item['link'];
        // "extid" => null
        $object->extid = $item['ext_id'];
        $object->price = $item['price'];
        // "type_order" => "sale"
        if (strtolower($item['order_type']) == 'продажа' || strtolower($item['order_type']) == 'sale') {
            $object->type_order = 'sale';
        } elseif (strtolower($item['order_type']) == 'аренда' || strtolower($item['order_type']) == 'rent') {
            $object->type_order = 'rent';
        } else {
            return 'Неизвестный вид сделки: ' . $item['order_type'];
        }

        if ($object->save()) {
            return '';
        } else {
            return 'Не могу записать объект';
        }
        // dd($res);
        // dd($item);
        // dd($object);
        // $object->name='';
        // return 'asd';
    }

    public function makeFeed()
    {
        // dd(Item::find(33)->area);
        $xml = view('feed', ['items' => Item::all()]);
        header('Content-type: text/plain');
        file_put_contents('ourfeed.xml', $xml);
        return $xml;
    }
}
