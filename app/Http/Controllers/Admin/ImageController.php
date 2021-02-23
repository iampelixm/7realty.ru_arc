<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Item;
use Ramsey\Uuid\Uuid;

class ImageController extends Controller
{
    public function index(Item $item)
    {
        $item->load('images');
        $images = Image::where('item_id', $item->id)->orderby('order_number')->get();
        return view('admin.images.index', compact('item', 'images'));
    }

    public function add(Request $r, Item $item)
    {

        if ($r->photos) {
            $path = 'public/items/' . $item->id;
            $i = $item->images->count() + 1;
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


        return redirect()->route('admin.items.images.list', ['item' => $item->id]);
    }

    public function delete(Item $item, Image $image)
    {
        try {
            $currentNumber     = $image->order_number;
            $maxNumber        = $item->images->count();
            if ($currentNumber < $maxNumber) {
                Image::where('item_id', $item->id)->where('order_number', '>', $currentNumber)->decrement('order_number');
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

    public function editStatus(Item $item, Image $image)
    {
        if ($image->active) {
            $image->active = 0;
        } else {
            $image->active = 1;
        }

        $image->save();

        return redirect()->route('admin.items.images.list', ['item' => $item->id, 'image' => $image->id]);
    }

    public function orderUp(Item $item, Image $image)
    {
        $currentNumber     = $image->order_number;

        if ($currentNumber > 1) {
            $beforeImage = Image::where('item_id', $item->id)->where('order_number', $currentNumber - 1)->first();
            if ($beforeImage) {
                $beforeImage->increment('order_number');
                $beforeImage->save();

                $image->decrement('order_number');
                $image->save();
            }
        }

        return redirect()->route('admin.items.images.list', ['item' => $item->id]);
    }

    public function orderDown(Item $item, Image $image)
    {
        $currentNumber     = $image->order_number;
        $maxNumber        = $item->images->count();

        if ($currentNumber < $maxNumber) {
            $afterImage = Image::where('item_id', $item->id)->where('order_number', $currentNumber + 1)->first();
            if ($afterImage) {
                $afterImage->decrement('order_number');
                $afterImage->save();

                $image->increment('order_number');
                $image->save();
            }
        }

        return redirect()->route('admin.items.images.list', ['item' => $item->id]);
    }

    public function setOrder(Item $item, Request $request)
    {
        Image::where('item_id', $item->id)->update(['order_number' => 0]);
        $imagelist = $request->input('images');
        foreach ($imagelist as $image_position => $image_id) {
            Image::where(['item_id' => $item->id, 'id' => $image_id])
                ->update(['order_number' => $image_position]);
        }
        return 'ok';
    }
}
