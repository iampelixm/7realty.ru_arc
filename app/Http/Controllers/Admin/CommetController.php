<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Residence;
use App\Models\Area;
use App\Models\Item;

class CommetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type, $id)
    {
        //dd($id);
        $list = Comment::where('type', $type)->where('obj_id', $id)->paginate(20);
        if ($type == 'residences') {
            $object = Residence::findOrFail($id);
        }else if ($type == 'areas') {
            $object = Area::findOrFail($id);
        } else if ($type == 'items') {
            $object = Item::findOrFail($id);
        } else {

            return abort(404);
        }
        return view('admin.comments.index', compact('list', 'type', 'object'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {
        if ($type == 'residences') {
            $object = Residence::findOrFail($id);
        } else if ($type == 'areas') {
            $object = Area::findOrFail($id);
        } else if ($type == 'items') {
            $object = Item::findOrFail($id);
        } else {
            return abort(404);
        }

        return view('admin.comments.create', compact('type', 'object'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($type, $id, CommentRequest $r)
    {
        if ($type == 'residences') {
            $object = Residence::findOrFail($id);
        } else if ($type == 'areas') {
            $object = Area::findOrFail($id);
        } else if ($type == 'items') {
            $object = Item::findOrFail($id);
        } else {
            return abort(404);
        }

        Comment::create([
            'name'  =>  $r->name,
            'comments'  =>  $r->comments,
            'obj_id'    =>  $id,
            'active'    =>  $r->active ? 1 : 0,
            'type'      =>  $type
        ]);

        return redirect()->route('admin.comments.list', ['type' => $type, 'id'=>$id])->with('success', trans('admin.comments_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type, $id, Comment $comment)
    {
        return view('admin.comments.edit', compact('type', 'comment', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($type, $id, Comment $comment, CommentRequest $r)
    {
        //dd($r->all());
        $comment->name     = $r->name;
        $comment->comments = $r->comments;
        $comment->active   = $r->active ? 1: 0;
        $comment->save();

        return redirect()->route('admin.comments.list', ['type' => $type, 'id'=>$id])->with('success', trans('admin.comments_edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type, $id, Comment $comment)
    {
        
        try {
            $comment->delete();
        } catch (\Exception $e) {
            return redirect()->route('admin.comments.list', ['type' => $type, 'id'=>$id])->with('success', trans('admin.comments_deleted_error'));
        }


        return redirect()->route('admin.comments.list', ['type' => $type, 'id'=>$id])->with('success', trans('admin.comments_deleted'));
    }

    public function editStatus(Request $r, Comment $comment)
    {
        if($comment) {
            $comment->active = (int) $r->active;
            $comment->save();
            return ['success' => 'Статус изменен'];
        } else {
            return ['error' => 'Не найдено'];
        }
    }
}
