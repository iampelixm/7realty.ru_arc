<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Models\Area;
use App\Models\City;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Area::paginate(20);
        return view('admin.areas.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.areas.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $r)
    {
        $itemArea = Area::create($r->validated());
        $itemArea->slug = Str::slug($r->name);
        $itemArea->save();
        return redirect()->route('admin.areas.index')->with('success', trans('admin.areas_created'));
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
    public function edit(Area $area)
    {

        $cities = City::all();
        return view('admin.areas.edit', compact('area', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $r, Area $area)
    {
    
        $area->update($r->validated());
        if ($r->slug) {
            $area->slug = Str::slug($r->name);
            $area->save();
        }
        return redirect()->route('admin.areas.index')->with('success', trans('admin.areas_edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        try {
            $area->delete();
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

    public function editStatus(Request $r, Area $area)
    {
        if($area) {
            $area->active = (int) $r->active;
            $area->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }

    public function items(Area $area)
    {
        $list_items = $area->items;
        $list_residence = $area->residence;
        return view('admin.areas.area_items', compact('list_items', 'list_residence'));
    }
}
