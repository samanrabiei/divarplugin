<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->get();
        return view('admin.pages.page', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        Page::create([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'content' => $request->content,
            'status'  => $request->status ?? 1,
        ]);
        session()->flash('toast', [
            'type' => 'success', // success, error, info, warning
            'title' => 'موفقیت آمیز!',
            'message' => 'برگه  با موفقیت ایجاد شد',
            'time' => '5000'
        ]);
        return redirect()->route('pages.index');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        $page->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->slug ?? $request->title),
            'content' => $request->content,
            'status'  => $request->status,
        ]);

        session()->flash('toast', [
            'type' => 'success', // success, error, info, warning
            'title' => 'موفقیت آمیز!',
            'message' => 'برگه  با موفقیت  به روزرسانی شد',
            'time' => '5000'
        ]);

        return redirect()->route('pages.index');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        session()->flash('toast', [
            'type' => 'error', // success, error, info, warning
            'title' => 'موفقیت آمیز!',
            'message' => 'برگه  با موفقیت  حذف شد',
            'time' => '5000'
        ]);
        return back();
    }
}
