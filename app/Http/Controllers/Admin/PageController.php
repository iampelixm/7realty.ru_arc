<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Http\Requests\PageEditRequest;
use App\Models\Page;
use Ramsey\Uuid\Uuid;
use Storage;
use File;
use Exception;

class PageController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Page::paginate(20);
        return view('admin.pages.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $r)
    {
        $inputArrValidated = $r->validated();
        unset($inputArrValidated['text']);
        $page = Page::create($inputArrValidated);
        $description = $r->input('text');
        try{
            $dom = new \DomDocument();
            $dom->loadHtml('<?xml encoding="utf-8" ?>'.$description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);  
            $images = $dom->getElementsByTagName('img');

            $images_path = '/public/'.Page::STORAGE_PATH.$page->id.'/';

            foreach($images as $key => $img){
                $data = $img->getAttribute('src');
                if($this->is_url($data)) {
                    $image_path = $data;
                } else {
                    //dd($data);
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);
                    
                    $store_path = storage_path().'/app/'.$images_path;
                    $image_name = ($key).'.png';
                    if(!File::isDirectory($store_path)){
                        File::makeDirectory($store_path, 0777, true, true);
                    }
                    $image_path = $store_path.$image_name;
                    file_put_contents($image_path, $data);
                    $image_path = asset('storage'.Page::STORAGE_PATH.$page->id.'/'.$image_name);

                    $img->removeAttribute('data-filename');
                }
                
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_path);
            }

            $description = $dom->saveHTML();
            $description = str_replace('<?xml encoding="utf-8" ?>', '', $description);
            
            if (strlen($description) < 65535){
                $page->text = $description;
                $page->save();
            } else {
                return redirect()->route('admin.pages.index')->with('error', trans('Слишком длинное описание'));
            }
            
        } catch (Exception $e){
           
            return redirect()->route('admin.pages.index')->with('error', trans('Некорректное изображение'));
        }

        return redirect()->route('admin.pages.index')->with('success', trans('admin.pages_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
       
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageEditRequest $r, Page $page)
    {
        $inputArrValidated = $r->validated(); 
        $description = $r->input('text');
         //dd($description);
        try{
            $dom = new \DomDocument();
            $dom->loadHtml('<?xml encoding="utf-8" ?>'.$description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
            $images = $dom->getElementsByTagName('img');

            $images_path = '/public/'.Page::STORAGE_PATH.$page->id.'/';


            foreach($images as $key => $img){
                $data = $img->getAttribute('src');

                if($this->is_url($data)) {
                    $image_path = $data;
                } else {
                    //dd($data);
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);
                    
                    $store_path = storage_path().'/app/'.$images_path;
                    $image_name = ($key).'.png';
                    if(!File::isDirectory($store_path)){
                        File::makeDirectory($store_path, 0777, true, true);
                    }
                    $image_path = $store_path.$image_name;
                    file_put_contents($image_path, $data);
                    $image_path = asset('storage'.Page::STORAGE_PATH.$page->id.'/'.$image_name);

                    $img->removeAttribute('data-filename');
                }
                
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_path);
            }

            $description = $dom->saveHTML();
            $description = str_replace('<?xml encoding="utf-8" ?>', '', $description);
            
            if (strlen($description) < 65535){
                $inputArrValidated['text'] = $description;
              
            } 

            $page->update($inputArrValidated);
            $page->save();
        } catch (Exception $e){
            unset($inputArrValidated['text']);
            $page->update($inputArrValidated);
            return redirect()->route('admin.pages.index')->with('error', trans('Некорректное изображение'));
        }
      
        return redirect()->route('admin.pages.index')->with('success', trans('admin.pages_edited'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        try {
            $page->delete();
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


    public function editStatus(Request $r, Page $page)
    {
        if($page) {
            $page->active = (int) $r->active;
            $page->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }

    protected function is_url($url) {
      return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
    }
}
