<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Subcategories;

class subcategoriesController extends Controller
{
	public function show() {
		$allSubCateg = Subcategories::all();
        return view('allSubCategories', compact('allSubCateg'));
    }
	public function edit(Subcategories $subcateg) {
        return view('subcategories.editSubCateg', compact('subcateg'));
    }
	
	public function update(Request $request, Subcategories $subcateg) {
        $subcateg->update($request->all());
        return redirect()->route('allSubcategories-show');
    }
	
	public function create() {
		$subcategories = Subcategories::all();
    	return view('subcategories.createSubCateg', compact('subcategories'));
    }
	
	public function store(Request $request) {
    	Subcategories::create($request->all());
    	return redirect()->route('allSubcategories-show');
    }
	
	public function delete(Subcategories $subcateg) {
    	$subcateg->delete();
    	return redirect()->route('allSubcategories-show');
    }
}