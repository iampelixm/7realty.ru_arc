<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;
use App\Models\CategoryType;
use App\Models\Category;
use App\Models\Type;
use App\Models\CategoryToCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::with('parent')->paginate(20);
        return view('admin.category.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        $types = Type::where('active', 1)->get();
        return view('admin.category.create', compact('categorys', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $r)
    {
        $itemCategory = Category::create($r->validated());

        if (!$r->main) {
            $mainCategories = $r->maincategories;
            foreach ($mainCategories as $item) {
                CategoryToCategory::create([
                    'main_id'       =>  $item,
                    'category_id'   =>  $itemCategory->id,
                ]);
            }
        }

        $itemCategory->slug = Str::slug($r->name);
        $itemCategory->save();

        $types = $r->types;
        if ($types && is_array($types)) {
            foreach ($types as $itemType) {
                CategoryType::create([
                    'category_id'       =>  $itemCategory->id,
                    'type_id'   =>  $itemType,
                ]);
            }
        }

        return redirect()->route('admin.categories.index')->with('success', trans('admin.category_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categorys = Category::all();
        $maincategories = CategoryToCategory::where('category_id', $category->id)->pluck('main_id')->toArray();

        $types = Type::where('active', 1)->get();
        $category->load('types');
        $optiontypes = CategoryType::where('category_id', $category->id)->pluck('type_id')->toArray();

        return view('admin.category.edit', compact('category', 'categorys', 'maincategories', 'types', 'optiontypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $r, Category $category)
    {

        $category->update($r->validated());

        if ($r->slug) {
            $category->slug = Str::slug($r->name);
            $category->save();
        }

        CategoryToCategory::where('category_id', $category->id)->delete();

        if (!$r->main) {
            $mainCategories = $r->maincategories;
            if (!empty($mainCategories)) {
                foreach ($mainCategories as $item) {
                    CategoryToCategory::create([
                        'main_id'       =>  $item,
                        'category_id'   =>  $category->id,
                    ]);
                }
            }
        }

        CategoryType::where('category_id', $category->id)->delete();
        $types = $r->types;
        if ($types && is_array($types)) {
            foreach ($types as $itemType) {
                CategoryType::create([
                    'category_id'       =>  $category->id,
                    'type_id'   =>  $itemType,
                ]);
            }
        }

        return redirect()->route('admin.categories.index')->with('success', trans('admin.category_edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
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

    public function editStatus(Request $r, Category $category)
    {
        if ($category) {
            $category->active = (int) $r->active;
            $category->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }

    public function editOffer(Request $r, Category $category)
    {
        if ($r->active) {
            $category->offer_index = 100;
        } else {
            $category->offer_index = 0;
        }

        $category->save();
        return ['success' => 'Статус изменен'];
    }

    public function editShowMain(Request $r, Category $category)
    {
        if ($category) {
            $category->show_main = (int) $r->active;
            $category->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }

    public function editShowMenu(Request $r, Category $category)
    {
        if ($category) {
            $category->menu_active = (int) $r->active;
            $category->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }

    public function offerList()
    {
        $list = Category::where('offer_index', '>', 0)->with('parent')->orderBy('offer_index', 'DESC')->paginate(20);
        return view('admin.category.index', compact('list'));
    }

    public function items(Category $category)
    {
        $category->load('items');
        $list = $category->items;
        return view('admin.category.category_item', compact('list'));
    }

    public function apiGetCategory(Request $r)
    {


        $typeSelected = $r->type;
        if ($typeSelected == 0) {
            return ['results' => [], 'pagination' => ['more' => false]];
        }

        $list = Category::whereHas('typesId',  function ($query) use ($typeSelected) {
            $query->where('type_id', '=', $typeSelected);
        })->get();

        $data = array();
        $i = 0;
        foreach ($list as $item) {
            $data[$i]['id'] = $item->id;
            $data[$i]['text'] = $item->name;
            $i++;
        }

        return ['status' => 'true', 'list' => $data];
    }

    public function updateImage(Request $request, Category $category)
    {
        if ($request->image) {
            $path = 'categories/' . $category->id;
            $photo = $request->image;
            $uploaded_path = 'storage/' . $photo->store($path, 'public');
            $category->clearMediaCollection('image');
            $category->addMedia($uploaded_path)
                ->withResponsiveImages()
                ->toMediaCollection('image');
        }
    }
}
