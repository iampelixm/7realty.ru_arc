<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Categories;

class categoriesController extends Controller
{
	public function show() {
		$allCateg = Categories::all();
        return view('allCategories', compact('allCateg'));
    }
	public function edit(Categories $categ) {
        return view('categories.editCateg', compact('categ'));
    }
	
	public function update(Request $request, Categories $categ) {
        $categ->update($request->all());
        return redirect()->route('allCategories-show');
    }
	
	public function create() {
		$categories = Categories::all();
    	return view('categories.createCateg', compact('categories'));
    }
	
	public function store(Request $request) {
    	Categories::create($request->all());
    	return redirect()->route('allCategories-show');
    }
	
	public function delete(Categories $categ) {
    	$categ->delete();
    	return redirect()->route('allCategories-show');
    }
}