<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Http\Requests\TypeEditRequest;
use Illuminate\Support\Str;

use App\Models\Type;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Type::paginate(20);
        return view('admin.types.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $type = Type::create($request->all());
       
        return redirect()->route('admin.type.index')->with('success', trans('admin.type_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeEditRequest $request, Type $type)
    {
        $type->update($request->all());
        
        return redirect()->route('admin.type.index')->with('success', trans('admin.type_edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        try {
            $type->delete();
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

    public function editStatus(Request $r, Type $type)
    {
        if($type) {
            $type->active = (int) $r->active;
            $type->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }

    public function items(Type $type)
    {
        $list = $type->typeItems;
        return view('admin.types.type_items', compact('list'));
    }
}
