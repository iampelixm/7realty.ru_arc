<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Log;
use Auth;
use Validator;

use App\Models\User;

class ClientController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function list()
    {
        $users = User::where('role', '=', 'user')->orWhere('role', '=', 'block')->paginate(20);
        return view('admin.clients.list', compact('users'));
    }


    public function new()
    {
        return view('admin.clients.new');
    }

    public function post_new(Request $r)
    {
        $valid =  Validator::make($r->all(), [
            'name'          => 'required|string|max:190',
            'email'         => 'required|email|unique:users',
            'phone'         => 'required|unique:users',
            'role'          => 'required',
        ]);
        if($valid->fails()){
            $msgs = '';
            foreach ($valid->errors()->all() as $message) {
                $msgs = $msgs.$message.' ';
            }
            return redirect()->back()->withErrors($valid)->withInput()->with('error', $msgs);;
        }

        $user = User::create(
           array_merge(
                $r->except('password'),
                ['password' => Hash::make($r->phone),
                 ]
            )
        );
        return redirect()->route('admin.settings.clients.list')->with('success', 'Клиент создан');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.settings.clients.list')->with('error', 'Клиент не найден!');
        }
        return view('admin.clients.edit', compact('user'));
    }

    public function post_edit(Request $r, $id)
    {
        $valid =  Validator::make($r->all(), [
            'name'          => 'string|max:190',
            'email'         => 'email',
            'phone'         => 'required',
            'role'          => 'required',
        ]);
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.clients.list')->with('error', 'Клиент не найден!');
        }
        if($valid->fails()){
            $msgs = '';
            foreach ($valid->errors()->all() as $message) {
                $msgs = $msgs.$message.' ';
            }
            return redirect()->back()->withErrors($valid)->with('error', $msgs);
        }
        $other_user = User::where('email', $r->email)->where('id', '!=', $id)->first();
        if($other_user){
            return redirect()->back()->with('error','E-mail занят');
        }
        $user->update(array_merge(
                $r->except('password'),
                ['password' => Hash::make($r->password)]
            ));
        return redirect()->route('admin.settings.clients.list')->with('success', 'Клиент обновлен!'); 
    }


    public function post_delete(Request $r, $id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
             return ['success' => 'Успешно удалено'];
        } else {
           return ['error' => 'Записи не найдено'];
        }

    }

    public function __call($method, $parameters)
    {
        return view('admin.in_work')->with(['success' => 'In work']);
    }
}
