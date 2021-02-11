<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Log;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\Models\User;

class UserController extends Controller
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
        $users = User::whereIs('admin', 'moderator', 'broker')->get();
        return view('admin.users.list', compact('users'));
    }

    public function clients()
    {
        $users = User::where('role', '==', 'user')->get();
        return view('admin.users.list', compact('users'));
    }

    public function new()
    {
        return view('admin.users.new');
    }

    public function post_new(Request $r)
    {
        $valid =  Validator::make($r->all(), [
            'name'          => 'required|string|max:190',
            'email'         => 'required|email|unique:users',
            'password'      => ['required', 'string', 'min:8'],
            'role'          => 'required',
        ]);
        if ($valid->fails()) {
            $msgs = '';
            foreach ($valid->errors()->all() as $message) {
                $msgs = $msgs . $message . ' ';
            }
            return redirect()->back()->withErrors($valid)->with('error', $msgs);;
        }

        if ($r->hasFile('avatar')) {
            $image = $r->file('avatar');
            $extension = $image->getClientOriginalExtension();
            Storage::putFileAs('public/avatar', $image, $r->email . "." . $extension);
            Storage::delete('public/avatar', $image, $r->email . "." . $extension);
            Image::make('storage/avatar/' . $r->email . "." . $extension)->fit(300)->encode('jpg')->save('storage/avatar/' . $r->email . ".jpg");
            Storage::delete('public/avatar', $image, $r->email . "." . $extension);
        }

        $user = User::create(
            array_merge(
                $r->except('password'),
                [
                    'password' => Hash::make($r->password),
                    'phone'    => ''
                ]
            )
        );
        $user->assign($r->role);

        return redirect()->route('admin.settings.users.list')->with('success', 'Пользователь создан');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.settings.users.list')->with('error', 'Пользователь не найден!');
        }
        return view('admin.users.edit', compact('user'));
    }

    public function post_edit(Request $r, $id)
    {
        $valid =  Validator::make($r->all(), [
            'name'          => 'string|max:190',
            'email'         => 'email',
            'role'          => 'required',
        ]);
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.users.list')->with('error', 'Пользователь не найден!');
        }
        if ($valid->fails()) {
            $msgs = '';
            foreach ($valid->errors()->all() as $message) {
                $msgs = $msgs . $message . ' ';
            }
            return redirect()->back()->withErrors($valid)->with('error', $msgs);
        }
        $other_user = User::where('email', $r->email)->where('id', '!=', $id)->first();
        if ($other_user) {
            return redirect()->back()->with('error', 'E-mail занят');
        }
        $user_data = $r->except('password');
        $user->update($user_data);

        if ($r->hasFile('avatar')) {
            $image = $r->file('avatar');

            $extension = $image->getClientOriginalExtension();

            if (Storage::exists('public/avatar/' . $r->email . ".jpg"))
                Storage::delete('public/avatar' . $r->email . ".jpg");

            Storage::putFileAs('public/avatar', $image, $r->email . "." . $extension);
            Storage::delete('public/avatar', $image, $r->email . "." . $extension);
            Image::make('storage/avatar/' . $r->email . "." . $extension)->fit(300)->encode('jpg')->save('storage/avatar/' . $r->email . ".jpg");
            Storage::delete('public/avatar', $image, $r->email . "." . $extension);
        }

        if ($r->password != '') {
            $validate_password = $r->validate(
                [
                    'password' => 'string|min:8'
                ]
            );
            if (!$validate_password)
                return redirect()->back()->withErrors($validate_password);
            $user->password = Hash::make($r->password);
            $user->save();
        }

        $user->roles()->detach();
        $user->assign($r->role);

        return redirect()->route('admin.settings.users.list')->with('success', 'Пользователь обновлен!');
    }


    public function post_delete(Request $r, $id)
    {
        $user = User::find($id);
        if ($user) {
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
