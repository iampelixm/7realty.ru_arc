<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OptionRequest;
use App\Models\OptionType;
use App\Models\Option;
use App\Models\Type;
use Illuminate\Support\Str;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Option::paginate(20);
        return view('admin.options.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::where('active', 1)->get();
        return view('admin.options.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionRequest $r)
    {
        $optionItem = Option::create([
            'name'            => $r->name,
            'active'          => $r->active ? 1 : 0,
            'method_input'    => $r->method_input,
            'values'          => json_encode($r->value),
            'slug'            => $r->slug ?? Str::slug($r->name), //add slug
        ]);

        $types = $r->types;
        if ($types && is_array($types)) {
            foreach ($types as $itemType) {
                OptionType::create([
                    'option_id'       =>  $optionItem->id,
                    'type_id'   =>  $itemType,
                ]);
            }
        }

        return redirect()->route('admin.options.index')->with('success', trans('admin.option_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        $values = json_decode($option->values);
        $types = Type::where('active', 1)->get();
        $option->load('types');
        $optiontypes = OptionType::where('option_id', $option->id)->pluck('type_id')->toArray();
        return view('admin.options.edit', compact('option', 'values', 'types', 'optiontypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionRequest $r, Option $option)
    {

        $option->name           = $r->name;
        $option->active         = $r->active ? 1 : 0;
        $option->method_input   = $r->method_input;
        $option->values         = json_encode($r->value);
        $option->slug           = $r->slug ?? Str::slug($r->name);
        $option->save();

        OptionType::where('option_id', $option->id)->delete();

        $types = $r->types;

        if ($types && is_array($types)) {
            foreach ($types as $itemType) {
                OptionType::create([
                    'option_id'       =>  $option->id,
                    'type_id'   =>  $itemType,
                ]);
            }
        }

        return redirect()->route('admin.options.index')->with('success', trans('admin.option_edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        try {
            $option->delete();
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

    public function apiGetOption(Request $r)
    {
        $optionSelected = [];
        if ($r->optionSelected) {
            $optionSelected = array_values($r->optionSelected);
            $optionSelected = array_filter($optionSelected, function ($value) {
                return !is_null($value) && $value !== '';
            });
        }


        $typeSelected = $r->typeSelected;
        if ($typeSelected == 0) {
            return ['results' => [], 'pagination' => ['more' => false]];
        }
        //return $optionSelected;
        if (($r->search) && (strlen($r->search) > 2)) {

            $search = $r->search;
            //dd($search);
            $list = Option::whereHas('typesId', function ($query) use ($typeSelected) {
                $query->where('type_id', '=', $typeSelected);
            })->where('name', 'like', '%' . $search . '%')->whereNotIn('id', $optionSelected)->get();
        } else {

            $list = Option::whereNotIn('id', $optionSelected)->whereHas('typesId',  function ($query) use ($typeSelected) {
                $query->where('type_id', '=', $typeSelected);
            })->get();
        }
        $data = array();
        $i = 0;
        foreach ($list as $item) {
            $data[$i]['id'] = $item->id;
            $data[$i]['text'] = $item->name;
            $i++;
        }

        return ['results' => $data, 'pagination' => ['more' => false]];
    }

    public function apiGetOptionType(Request $r)
    {
        $typeSelected = $r->type;

        $list = Option::where('require', '1')->whereHas('typesId',  function ($query) use ($typeSelected) {
            $query->where('type_id', '=', $typeSelected);
        })->get();

        $data = array();
        $i = 0;
        foreach ($list as $item) {
            $data[$i]['id'] = $item->id;
            $data[$i]['text'] = $item->name;
            $i++;
        }

        return response()->json($data);
    }

    public function apiGetOptionValue(Request $r)
    {

        if ($r->option) {
            $data = array();
            $i = 0;
            $option = Option::where('id', $r->option)->first();
            $values = json_decode($option->values);

            if ($values != null) {
                foreach ($values as $key => $item) {
                    $data[$i]['index'] = $key;
                    $data[$i]['name']  = $item;
                    $i++;
                }
            }

            $method_input = $option->method_input ?? 'select';

            return ['type' => $method_input, 'list' => $data];
        }
    }

    public function editStatus(Request $r, Option $option)
    {
        if ($option) {
            $option->active = (int) $r->active;
            $option->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }

    public function editRequire(Request $r, Option $option)
    {
        if ($option) {
            $option->require = (int) $r->active;
            $option->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }
}
