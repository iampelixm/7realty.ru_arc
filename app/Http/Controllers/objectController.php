<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\Type;

class objectController extends Controller
{
	public function show() {
		$allObject = Item::all();
        return view('allObjects', compact('allObject'));
    }
    
    public function create() {
        $object = Item::all();
        $types = Type::get();
        return view('objects.create', compact('object', 'types'));
    }

    public function store(Request $request) {
        Item::create($request->all());
        return redirect()->route('allobjects-show');
    }

	public function edit(Item $objects) {
        $types = Type::get();
        return view('objects.edit', compact('objects', 'types'));
    }
	
	public function update(Request $request, Item $objects) {
        $objects->update($request->all());
        return redirect()->route('allobjects-show');
    }
	
	
	
	
	
	public function delete(Item $objects) {
    	$objects->delete();
    	return redirect()->route('allobjects-show');
    }
}
