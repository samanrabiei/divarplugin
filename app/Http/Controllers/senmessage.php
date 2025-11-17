<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Mail\mailsender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Cache;

class senmessage extends Controller
{
    public function index(Request $request)
    {
        // $send = Mail::raw('hello world', function ($message) {
        //     $message->to('samanrabiei1371@gmail.com')->subject('test email');
        // });
        // $send =  Mail::send(new mailsender('2024'));
        SendMail::dispatch();
        return 'done';
        // $data = session()->all();
        // dd($data);
    }
    public function seesion(Request $request)
    {
        // ست کردن یک سیشن
        // session()->put('name', 'saman');
        // ست کردن یک سیشن با آرایه
        // session()->put(['name' => 'saman', 'family' => 'rabiei']);
        // حذف یک سیشن خاص
        // session()->forget('name');
        // حذف مجموعه ای از سیشن ها با آرایه
        // session()->forget(['name', 'family']);
        // حذف کل سیشن ها
        // session()->flush();
        // ست کردن یک سیشن با زمان انقضا
        session()->flash('message', 'پیام ارسال شد');
        // ست کردن پیام با ریداریکت
        return   redirect()->route('blog.index')->with('message', 'پیام ارسال شد');
        // return   redirect()->route('blog.index');
    }

    public function date()
    {
        // مشاهده کل سیشن ها
        $date = session()->all();
        dd($date);
    }

    public function cashe_set()
    {
        // Cache::put('key', 'code-market', 10);
        // Cache::remember('name', '600', function () {
        //     return 'saman rabiei';
        // });
        return redirect()->route('payment.send', [
            'amount'   => '2000',
            'order_id' => '123456',
        ]);
    }
    public function cashe_get()
    {
        // $data = Cache::get('name');
        // چک کردن آیا کش هست یا نه
        // $data = cache::has('name');
        $data = cache::forget('name');
        dd($data);
    }
}
