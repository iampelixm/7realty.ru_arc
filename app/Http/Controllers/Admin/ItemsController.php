<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\ItemEditRequest;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ItemOption;
use App\Models\Residence;
use App\Models\Category;
use App\Models\Option;
use App\Models\Type;
use App\Models\Area;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        if (Auth::user()->isA('admin', 'moderator')) {
            $list = new Item;
        } elseif (Auth::user()->isA('broker')) {
            $list = Item::where('user_id', Auth::user()->id);
        } else {
            abort(403, 'Вам не дали доступ к объектам');
        }

        if ($r->get('city_id')) {
            $list = $list->join('item_areas', 'items.area_id', '=', 'item_areas.id');
            $list = $list->join('cities', 'item_areas.city_id', '=', 'cities.id');
            $list = $list->where('cities.id', '=', $r->get('city_id'));
        }
        $request_filter = collect($r->query())->except('page', 'city_id', 'active');
        $request_filter = $request_filter->filter(
            function ($value, $key) {
                return $value != null;
            }
        );

        //вонючий костыль
        if ($r->get('active') != '') {
            $list = $list->where('items.active', '=', $r->get('active'));
        }
        //dd(request()->query())->links());
        $list = $list->select('items.*');
        $list = $list->where($request_filter->toArray());
        $list = $list->orderBy('items.id', 'DESC');
        $list = $list->paginate(20)->withQueryString();

        return view('admin.items.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        $types     = Type::all();
        $categorys = Category::all();
        $options   = Option::all();
        $residence = Residence::all();
        $areas     = Area::all();
        $googleMapsKey = config('googlemaps.key');
        $r->residence ? $residence_id = $r->residence : $residence_id = 0;

        return view('admin.items.create', compact('types', 'categorys', 'options', 'residence', 'residence_id', 'areas', 'googleMapsKey'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $r)
    {

        $options = $this->getOption($r->option);
        //dd($options);
        $item = Item::create($r->validated());

        $item->option = json_encode($options);
        $item->slug = Str::slug($r->name);
        $item->save();

        $categories = $r->categories;
        if ($categories && is_array($categories)) {
            foreach ($categories as $itemCategory) {
                ItemCategory::create([
                    'item_id'       =>  $item->id,
                    'category_id'   =>  $itemCategory,
                ]);
            }
        }

        if ($r->photos) {
            $path = 'public/items/' . $item->id;
            $i = 1;
            foreach ($r->photos as $photo) {
                $token = Uuid::uuid4();
                $filename = $token . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs($path, $filename);
                $item->images()->create([
                    'file'          =>  $filename,
                    'token'         =>  $token,
                    'order_number'  => $i
                ]);
                $i++;
            }
        }

        return redirect()->route('admin.items.index')->with('success', trans('admin.item_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $item->load('images', 'categories');
        $types     = Type::all();
        $categorys = Category::all();
        $options   = Option::all();
        $residence = Residence::all();
        $areas     = Area::all();
        $googleMapsKey = config('googlemaps.key');
        $itemoptions = json_decode($item->option);
        //dd($itemoptions);
        $itemcategorys = ItemCategory::where('item_id', $item->id)->pluck('category_id')->toArray();

        return view('admin.items.edit', compact('item', 'itemoptions', 'itemcategorys', 'types', 'categorys', 'options', 'residence', 'areas', 'googleMapsKey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemEditRequest $r, Item $item)
    {
        $item->update($r->validated());

        $options = $this->getOption($r->option);

        $item->option = json_encode($options);
        if ($r->slug_change) {
            $item->slug = Str::slug($r->name);
        }

        $item->save();

        ItemCategory::where('item_id', $item->id)->delete();

        $categories = $r->categories;

        if ($categories && is_array($categories)) {
            foreach ($categories as $itemCategory) {
                ItemCategory::create([
                    'item_id'       =>  $item->id,
                    'category_id'   =>  $itemCategory,
                ]);
            }
        }

        if ($r->photos) {
            $path = 'public/items/' . $item->id;
            $i = $item->images->count() + 1;
            foreach ($r->photos as $photo) {
                $token = Uuid::uuid4();
                $filename = $token . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs($path, $filename);
                $item->images()->create([
                    'file'  =>  $filename,
                    'token' =>  $token,
                    'order_number'  => $i
                ]);
                $i++;
            }
        }
        return redirect()->route('admin.items.index')->with('success', trans('admin.item_edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        try {
            $item->images()->delete();
            $item->delete();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors'  => $e->getMessage(),
            ]);
        }

        return response()->json([
            'success' => true,
        ]);
    }

    public function offerList()
    {
        $list = Item::where('offer_index', '>', 0)->orderBy('offer_index', 'DESC')->paginate(20);
        return view('admin.items.index', compact('list'));
    }

    public function editStatus(Request $r, Item $item)
    {
        if ($item) {
            $item->active = (int) $r->active;
            $item->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }

    public function editOffer(Request $r, Item $item)
    {
        if ($r->active) {
            $item->offer_index = 100;
        } else {
            $item->offer_index = 0;
        }

        $item->save();
        return ['success' => 'Статус изменен'];
    }

    protected function getOption($roption)
    {
        $option = array();
        if ($roption) {
            foreach ($roption as $value) {
                if (isset($value['option'])) {
                    $itemOption['option_id'] = $value['option'];
                    $itemOption['option_title'] = $this->getOptionTitle($value['option']);
                    $itemOption['option_type'] = $this->getOptionType($value['option']);

                    if (isset($value['value'])) {
                        $itemOption['value_id'] = $value['value'];
                        $itemOption['value_title'] = $this->getOptionValue($value['option'], $value['value']);
                    } else {
                        $itemOption['value_id'] = 0;
                        $itemOption['value_title'] = '';
                    }

                    $option[] = $itemOption;
                }
            }
        }

        return $option;
    }

    protected function getOptionTitle($option_id)
    {
        $option = Option::find($option_id);
        if ($option) {
            return $option->name;
        }

        return '';
    }

    protected function getOptionType($option_id)
    {
        $option = Option::find($option_id);
        if ($option) {
            return $option->method_input;
        }

        return '';
    }

    protected function getOptionValue($option_id, $value_id)
    {
        $option = Option::find($option_id);
        if ($option and ($option->method_input == 'select')) {
            $values = json_decode($option->values);
            if ($values != null) {
                foreach ($values as $key => $item) {
                    if ($key == $value_id) {
                        return $item;
                    }
                }
            }
        }

        if ($option and ($option->method_input == 'hand')) {
            return $value_id;
        }

        return '';
    }
}
