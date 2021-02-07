<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResidenceImage;
use App\Models\Residence;
use Ramsey\Uuid\Uuid;

class ImageResidenceController extends Controller
{
    public function index(Residence $item)
    {
    	$item->load('images');
    	$images = ResidenceImage::where('residence_id', $item->id)->orderby('order_number')->get();
    	return view('admin.images.residence_index', compact('item', 'images'));
    }

    public function add(Request $r, Residence $item)
    {
        
        if ($r->photos){
            $path = 'public/residences/'.$item->id;
            $i = $item->images->count()+1;
            foreach ($r->photos as $photo) {
                $filename = $photo->getClientOriginalName();
                $photo->storeAs($path, $filename);
                $item->images()->create([
                    'file'          =>  $filename,
                    'token'         =>  Uuid::uuid4(),
                    'order_number'  => $i
                ]);
                $i++;
            }
        }


        return redirect()->route('admin.residences.images.list', ['item' => $item->id]);
    }

    public function delete(Residence $item, ResidenceImage $image)
    {
    	try {
    		$currentNumber 	= $image->order_number;
    		$maxNumber		= $item->images->count();
    		if ($currentNumber < $maxNumber){
    			ResidenceImage::where('residence_id', $item->id)->where('order_number', '>', $currentNumber)->decrement('order_number');
    		}

            $image->delete();
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

    public function editStatus(Residence $item, ResidenceImage $image)
    {
    	if ($image->active) {
    		$image->active = 0;
    		
    	} else {
    		$image->active = 1;
    	} 

    	$image->save();

    	return redirect()->route('admin.residences.images.list', ['item' => $item->id, 'image' => $image->id]);
    }

    public function orderUp(Residence $item, ResidenceImage $image)
    {
    	$currentNumber 	= $image->order_number;

    	if ($currentNumber > 1) {
    		$beforeImage = ResidenceImage::where('residence_id', $item->id)->where('order_number', $currentNumber-1)->first();
    		if ($beforeImage) {
    			$beforeImage->increment('order_number'); 
    			$beforeImage->save();

    			$image->decrement('order_number'); 
    			$image->save();
    		}
    	}

    	return redirect()->route('admin.residences.images.list', ['item' => $item->id]);
    }

    public function orderDown(Residence $item, ResidenceImage $image)
    {
    	$currentNumber 	= $image->order_number;
    	$maxNumber		= $item->images->count();

    	if ($currentNumber < $maxNumber) {
    		$afterImage = ResidenceImage::where('residence_id', $item->id)->where('order_number', $currentNumber+1)->first();
    		if ($afterImage) {
    			$afterImage->decrement('order_number'); 
    			$afterImage->save();

    			$image->increment('order_number'); 
    			$image->save();
    		}
    	}

    	return redirect()->route('admin.residences.images.list', ['item' => $item->id]);
    }
}
