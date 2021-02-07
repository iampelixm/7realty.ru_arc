<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\ResCategoryRequest;
use App\Http\Requests\ResCategoryEditRequest;
use App\Models\ResCategory;

class ResCategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = ResCategory::paginate(20);
        return view('admin.rescategory.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rescategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResCategoryRequest $r)
    {
        $item = ResCategory::create($r->validated());

        return redirect()->route('admin.rescategories.index')->with('success', trans('admin.rescategory_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ResCategory $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ResCategory $rescategory)
    {
       
        return view('admin.rescategory.edit', compact('rescategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResCategoryEditRequest $r, ResCategory $rescategory)
    {
       
        $rescategory->update($r->validated()); 

      
        return redirect()->route('admin.rescategories.index')->with('success', trans('admin.rescategory_edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResCategory $rescategory)
    {
        try {
            $rescategory->delete();
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


    public function editStatus(Request $r, ResCategory $rescategory)
    {
        if($rescategory) {
            $rescategory->active = (int) $r->active;
            $rescategory->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }
}
