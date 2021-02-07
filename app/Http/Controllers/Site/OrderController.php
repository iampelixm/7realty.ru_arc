<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Mail;
use Bitrix24;

class OrderController extends Controller
{
    public function sendOrderMail(Request $r)
    {
        
        $valid =  Validator::make($r->all(), [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'check'=>'required',
            'type_object'=>'required',
            'price'=>'required',
        ]);
       
        if($valid->fails()) {
            $err = '';
            foreach ($valid->errors()->all() as $e) {
                $err = $err.'<br>'.$e;
            }

            return [
                'status' => false,
                'message'   => 'Не все поля указаны!'
            ];
        }

        $data = ['data' => $r->all()];
        //dd($data['name']);
        $title = "Новая заявка на сайте";
        $to_name = 'Admin';
        $to_email = env('MAIL_ADMIN');


        Mail::send('mails.order_new', $data, function($message) use ($to_name, $to_email, $title) {
            $message->to($to_email, $to_name)->subject($title);
            $message->from('mail@webcheck.site','SEVEN');
        });

        $data = $r->all();
        $text = view('pages.comment_bitrix', compact('data'))->render();
        
        $r->merge(['text' => $text]);
        $this->createBitrixLead($r->all(), $title);

        return [
            'status' => true,
        ];
    }

    public function sendOrderShowMail(Request $r)
    {
        
        $valid =  Validator::make($r->all(), [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'type'=>'required',
        ]);
       
        if($valid->fails()) {
            $err = '';
            foreach ($valid->errors()->all() as $e) {
                $err = $err.'<br>'.$e;
            }

            return [
                'status' => false,
                'message'   => 'Не все поля указаны!'
            ];
        }

        $data = ['data' => $r->all()];
        //dd($data['name']);
        $title = "Новая заявка Узнать подробнее";
        $to_name = 'Admin';
        $to_email = env('MAIL_ADMIN');

        Mail::send('mails.order_send_new', $data, function($message) use ($to_name, $to_email, $title) {
            $message->to($to_email, $to_name)->subject($title);
            $message->from('mail@webcheck.site','SEVEN');
        });

        $lot = $r->item ?? '';
        $type = $r->type ?? '';
        $title = $title." Лот №".$lot." - ".$type;

        $this->createBitrixLead($r->all(), $title);

        return [
            'status' => true,
        ];
    }

    public function sendOrderShowMailBuy(Request $r)
    {
        
        $valid =  Validator::make($r->all(), [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);
       
        if($valid->fails()) {
            $err = '';
            foreach ($valid->errors()->all() as $e) {
                $err = $err.'<br>'.$e;
            }

            return [
                'status' => false,
                'message'   => 'Не все поля указаны!'
            ];
        }

        $data = ['data' => $r->all()];
        //dd($data['name']);
        $title = "Новая заявка Купить/Продать на сайте";
        $to_name = 'Admin';
        $to_email = env('MAIL_ADMIN');


        Mail::send('mails.order_send_new_buy', $data, function($message) use ($to_name, $to_email, $title) {
            $message->to($to_email, $to_name)->subject($title);
            $message->from('mail@webcheck.site','SEVEN');
        });

        $this->createBitrixLead($r->all(), $title);

        return [
            'status' => true,
        ];
    }

    public function sendOrderShowMailOrenda(Request $r)
    {
        
        $valid =  Validator::make($r->all(), [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);
       
        if($valid->fails()) {
            $err = '';
            foreach ($valid->errors()->all() as $e) {
                $err = $err.'<br>'.$e;
            }

            return [
                'status' => false,
                'message'   => 'Не все поля указаны!'
            ];
        }

        $data = ['data' => $r->all()];
        //dd($data['name']);
        $title = "Новая заявка Сдать/Арендовать на сайте";
        $to_name = 'Admin';
        $to_email = env('MAIL_ADMIN');

        Mail::send('mails.order_send_new_orenda', $data, function($message) use ($to_name, $to_email, $title) {
            $message->to($to_email, $to_name)->subject($title);
            $message->from('mail@webcheck.site','SEVEN');
        });

        $this->createBitrixLead($r->all(), $title);

        return [
            'status' => true,
        ];
    }

    protected function createBitrixLead($data, $title)
    { 

        $acccountName   = config('bitrix24.acccountName');
        $userId         = config('bitrix24.userId');
        $secretCode     = config('bitrix24.secretCode');

        $bitrix24 = new Bitrix24($acccountName, $userId, $secretCode);
        $bitrix24->crmLeadAdd($data, $title);
        return true;
    }
}
