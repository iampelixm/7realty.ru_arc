<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Areas;

class areaController extends Controller
{
	public function show() {
		$allAreas = Areas::all();
        return view('allAreas', compact('allAreas'));
    }
	public function edit(Areas $areas) {
        return view('areas.editArea', compact('areas'));
    }
	
	public function update(Request $request, Areas $areas) {
        $areas->update($request->all());
        return redirect()->route('allArea-show');
    }
	
	public function create() {
		$area = Areas::all();
    	return view('areas.createArea', compact('area'));
    }
	
	public function store(Request $request) {
    	Areas::create($request->all());
    	return redirect()->route('allArea-show');
    }
	
	public function delete(Areas $areas) {
    	$areas->delete();
    	return redirect()->route('allArea-show');
    }
}