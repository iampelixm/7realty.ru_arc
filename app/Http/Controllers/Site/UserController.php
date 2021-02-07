<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserFavorite;
use App\Models\Area;
use Auth;
use SmsRu;
use Cookie;

class UserController extends Controller
{
    
    public function register(Request $r)
    {
        
        $phone = $r->phone;
        $name = $r->name;


        if ($phone and $name) {
        	

        	$user = User::where('phone', $r->phone)->first();
        	if ($user){
	    		return [
		            'status' => false,
		            'message' => 'Такой номер телефона уже зарегестрирован!',
		        ];
	    	}

	    	 $user = User::create([
	    	 	'name'	=>	$name,
	    	 	'phone'	=>	$phone,
	    	 	'email'	=>	$phone.'@seven.ru',
	    	 	'password' => $phone
	    	 ]);

	    	$token = config('smsru.token');
        	$sms = new SmsRu($token);
	    	$code = rand(1000, 9999);
	    	$user->code = $code;
	    	$user->save();
	    	$sms->sendSMS($phone, $code);

        } else {
        	return [
	            'status' => false,
	            'message' => 'Не указан номер телефона',
	        ];
        }

        return [
            'status' => true,
            'phone' => $phone,
        ];
    }

    public function sendSms(Request $r)
    {
        
        $phone = $r->phone;

        if ($phone) {
        	$token = config('smsru.token');
        	$sms = new SmsRu($token);

        	$user = User::where('phone', $r->phone)->first();
        	if (!$user){
	    		return [
		            'status' => false,
		            'message' => 'Номер телефона не найден!',
		        ];
	    	}

	    	$code = rand(1000, 9999);
	    	$user->code = $code;
	    	$user->save();
	    	$sms->sendSMS($phone, $code);

        } else {
        	return [
	            'status' => false,
	            'message' => 'Не указан номер телефона',
	        ];
        }

        return [
            'status' => true,
            'phone' => $phone,
        ];
    }

    public function verificationCode(Request $r)
    {
    	if(!$r->code or ($r->code == '')){
    		return [
	            'status' => false,
	            'message' => 'Укажите код',
	        ];
    	}

    	if(!$r->phone or ($r->phone == '')){
    		return [
	            'status' => false,
	            'message' => 'Укажите телефон',
	        ];
    	}

    	$user = User::where('phone', $r->phone)->first();
    	if (!$user){
    		return [
	            'status' => false,
	            'message' => 'Номер телефона не найден!',
	        ];
    	}

    	if ($user->code != $r->code) {
    		return [
	            'status' => false,
	            'message' => 'Указан неверный код!',
	        ];
    	} else {
    		$user->code = null;
    		$user->save();
    		Auth::login($user);
    	}


    	return [
            'status' => true,
            //'phone' => $phone,
        ];
    }

    public function setfavorites(Request $r)
    {
    	if(!$r->id or ($r->id == '')){
    		return [
	            'status' => false,
	            'message' => 'Укажите обєкт',
	        ];
    	}

    	
    	$user = auth()->user();
    	if (!$user){
    		return [
	            'status' => false,
                'code' => '403',
	            'message' => 'Пользователь не найден!',
	        ];
    	}

    	$favorites = UserFavorite::where('user_id', $user->id)->where('item_id', $r->id)->first();
    	if ($favorites) {
    		$favorites->delete();
    	} else {
    		UserFavorite::create([
				'user_id'	=> $user->id,
				'item_id'	=> $r->id
			]);
    	}

		    	


    	return [
            'status' => true,
            //'phone' => $phone,
        ];
    }

    public function favorites()
    {
    	if (!auth()->user()){
    		return abort(404);
    	}
    	$current_city = Cookie::get('current_city');
        if (!$current_city) {
            $current_city = 1;
        }
        $areas = Area::where('city_id', $current_city)->pluck('id')->toArray();

        $areasSelect = Area::where('city_id', $current_city)->get();

    	//dd($similarItem);
    	$user = Auth::user();
    	$user->load('favorites');

    	$list = $user->favorites;

        $page_title = "Избраное | Seven";

    	return view('pages.favorites', compact('list', 'areasSelect', 'page_title'));
    }
}
