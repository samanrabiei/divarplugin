<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\test;
use App\Models\User;
use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Test as UtilTest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class TestController extends Controller
{
    public function index()
    {
        // get
        // $data =  Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        // foreach ($data as $item) {
        //     echo $item['title'] . '<br>';
        // }
        // dd($data->ok());
        //post
        // $data =  Http::post('https://jsonplaceholder.typicode.com/posts', [
        //     'userID' => 2,
        //     'title' => 'عنوان',
        //     'body' => 'متن عنوان'
        // ])->json();
        // همراه هدر
        // $data =  Http::withHeader([
        //     'token' => 'token'
        // ])->post('https://jsonplaceholder.typicode.com/posts', [
        //     'userID' => 2,
        //     'title' => 'عنوان',
        //     'body' => 'متن عنوان'
        // ])->json();
        // درخواست با دفعات تکرار و زمان 
        // $data =  Http::retry(3, 500)->get('https://jsonplaceholder.typicode.com/posts')->json();
        // dd($data);
        Log::info('test');
        return 'test';
    }

    public function quiry()
    {
        // دریافت تمامی پست ها
        // $data = DB::table('blogs')->get();
        // پیدا کردن آی دی 3
        // $data = DB::table('blogs')->find(3);
        // foreach ($data as $dat) {
        //     echo $dat->title . '</br>';
        // }
        // $data = DB::table('blogs')->where('status', '=', 1)->value('status');
        // DB::table('blogs')->where('status', '=', 0)->orderBy('id')->chunk(3, function (Collection $blogs) {
        //     foreach ($blogs as $blog) {
        //         echo $blog->title . '<br>';
        //     }
        // });
        // $data =  DB::table('blogs')->where('status', '3')->doesntExist();
        // $data = DB::table('categories')->insert([
        //     ['title' => 'دسته بندی اول'],
        //     ['title' => 'دسته بندی دوم']
        // ]);
        // $data = DB::table('categories')->insertOrIgnore([
        //     ['id' => '4', 'title' => 'دسته بندی اول'],
        //     ['id' => '8', 'title' => 'دسته بندی دوم']
        // ]);
        // $data = DB::table('categories')->insertGetId([
        //     'title' => 'دسته بندی اول',
        // ]);
        // $data = DB::table('categories')
        //     ->where('id', 3)
        //     ->update(
        //         ['title' => 'دسته بندی اول',]
        //     );
        // $data = DB::table('categories')
        //     ->where('id', 13)
        //     ->delete();
        $data = DB::table('categories')
            ->delete(9);
        dd($data);
    }
    public function eloquent()
    {
        $data = test::find(3);
        // return view('test.test', compact('data'));
        // $data =  test::findOrFail('1');
        // $data =  test::findOrFail('1');
        // dd($data);
        return view('test.test', compact('data'));
    }

    public function eloquent_insert()
    {
        $blog = new test;
        $blog->title = 'TTTTT';
        $blog->body = 'این توضیحات مقاله است';
        $blog->image = '1744270282_carttocart.png';
        $blog->category_id = '1';
        $blog->save();
        dd($blog);
    }
    public function eloquent_update()
    {
        $blog = test::find('1');
        $blog->title = 'پست جدید ای دی 2';
        $blog->save();
    }
    public function eloquent_delete()
    {
        // $blog = test::find('1');
        // $blog->delete();
        $blog = test::findOrFail('4');
        $blog->delete();
        dd($blog);
    }
    public function MassAssignment()
    {
        // $blog = blog::create([
        //     'title' => 'fadfa',
        //     'body' => 'this is test sid',
        //     'image' => '1744270282_carttocart.png',
        //     'category_id' => '1',
        // ]);
        // dd($blog);
        $blog = test::find('5')->update(
            [
                'title' => 'fadfa',
                'body' => 'this is test sid',
                'image' => '1744270282_carttocart.png',
                'category_id' => '1',
            ]
        );
        dd($blog);
    }
    public function scope_global()
    {
        $test = test::status(0)->where('id', '>', 2)->get();
        dd($test);
    }

    public function route_model_binding(test $id)
    {
        dd($id);
    }

    public function post()
    {
        $blog = blog::find(13);
        foreach ($blog->comments->where('status', 1) as $comment) {
            echo $comment->comment . '<br>';
        }
    }

    public function comment()
    {

        $comment = comments::find(1);
        dd($comment->post);
    }

    public function wallet()
    {
        $user = User::find(5);
        $user->deposit(500000);  // واریز
        // $user->withdraw(900); // برداشت
        dd($user->balance); // نمایش موجودی کیف پول
    }
}
