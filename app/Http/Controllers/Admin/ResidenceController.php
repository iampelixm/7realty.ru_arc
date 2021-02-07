<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ResidenceRequest;
use App\Models\Residence;
use App\Models\ResCategory;
use App\Models\ResidenceCategory;
use App\Models\Item;
use App\Models\Area;
use App\Models\ResidenceResidence;
use Ramsey\Uuid\Uuid;

class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Residence::paginate(20);
        return view('admin.residences.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas     = Area::all();
        $categorys = ResCategory::all();
        $googleMapsKey = config('googlemaps.key');
        return view('admin.residences.create', compact('areas', 'categorys', 'googleMapsKey'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResidenceRequest $r)
    {
        $item = Residence::create($r->validated());

        $categories = $r->categories;
        if ($categories && is_array($categories)) {
            foreach ($categories as $itemCategory) {
                ResidenceCategory::create([
                    'residence_id'       =>  $item->id,
                    'category_id'   =>  $itemCategory,
                ]);
            }
        }

        $type = 'residences';
        if ($r->photos){
            $path = 'public/'.$type.'/'.$item->id;
            $i = 1;
            foreach ($r->photos as $photo) {
                $token = Uuid::uuid4();
                $filename = $token.'.'.$photo->getClientOriginalExtension();
                $photo->storeAs($path, $filename);
                $item->images()->create([
                    'file'          =>  $filename,
                    'token'         =>  $token,
                    'order_number'  => $i,
                    'type'          => $type
                ]);
                $i++;
            }
        }

        return redirect()->route('admin.residences.index')->with('success', trans('admin.resience_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Residence $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Residence $residence)
    {
        $areas     = Area::all();
        $categorys = ResCategory::all();
        $googleMapsKey = config('googlemaps.key');
        $itemcategorys = ResidenceCategory::where('residence_id', $residence->id)->pluck('category_id')->toArray();

        return view('admin.residences.edit', compact('residence', 'areas', 'categorys', 'itemcategorys', 'googleMapsKey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResidenceRequest $r, Residence $residence)
    {
       
        $residence->update($r->validated()); 

        ResidenceCategory::where('residence_id', $residence->id)->delete();

        $categories = $r->categories;

        if ($categories && is_array($categories)) {
            foreach ($categories as $itemCategory) {
                ResidenceCategory::create([
                    'residence_id'       =>  $residence->id,
                    'category_id'   =>  $itemCategory,
                ]);
            }
        }  
       
        if ($r->photos){
            $path = 'public/residences/'.$residence->id;
            $i = $residence->images->count()+1;
            foreach ($r->photos as $photo) {
                $token = Uuid::uuid4();
                $filename = $token.'.'.$photo->getClientOriginalExtension();
                $photo->storeAs($path, $filename);
                $residence->images()->create([
                    'file'  =>  $filename,
                    'token' =>  $token,
                    'order_number'  => $i
                ]);
                $i++;
            }
        }
        return redirect()->route('admin.residences.index')->with('success', trans('admin.residence_edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Residence $residence)
    {
        try {
            $residence->images()->delete();
            $residence->delete();
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

    public function itemList(Residence $residence)
    {
        $list = $residence->items;
        return view('admin.residences.items', compact('list', 'residence'));
    }

    public function editStatus(Request $r, Residence $residence)
    {
        if($residence) {
            $residence->active = (int) $r->active;
            $residence->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }
}
