<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Residentialcomplex;

class residentialComplexController extends Controller
{
	public function show() {
		$allResComplex = Residentialcomplex::all();
        return view('allResidentialComplex', compact('allResComplex'));
    }
	public function edit(Residentialcomplex $rc) {
        return view('residentialComplex.editRC', compact('rc'));
    }
	
	public function update(Request $request, Residentialcomplex $rc) {
        $rc->update($request->all());
        return redirect()->route('AllresidentialComplex-show');
    }
	
	public function create() {
		$resComplex = Residentialcomplex::all();
    	return view('residentialComplex.createRC', compact('resComplex'));
    }
	
	public function store(Request $request) {
    	Residentialcomplex::create($request->all());
    	return redirect()->route('AllresidentialComplex-show');
    }
	
	public function delete(Residentialcomplex $rc) {
    	$rc->delete();
    	return redirect()->route('AllresidentialComplex-show');
    }
}