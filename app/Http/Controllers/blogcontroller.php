<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\category;
use App\Events\postpublish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;

class blogcontroller extends Controller
{
    public function index()
    {
        $blogs = blog::all();

        return view('blog.index', compact('blogs'));
    }

    public function show(blog $blog)
    {

        return view('blog.show', compact('blog'));
    }

    public function create()
    {

        // if (Gate::allows('admin_createpost')) {
        if (Gate::allows('create', blog::class)) {
            // if (Gate::authorize('create', blog::class)) {
            $categories = category::all();
            // event(new postpublish());
            return view('blog.create', compact('categories'));
        } else {
            return ' شما مجوز دسترسی به این صفحه را ندارید';
        }
    }


    public function edit(blog $blog)
    {
        $categories = category::all();
        // dd($blog);
        return view('blog.edit', compact('blog', 'categories'));
    }



    public function update(Request $request, blog $blog)
    {
        // dd($blog);
        $request->validate([
            'title' => 'required',
            'body' => 'required|min:5',
            'picture' => 'nullable|max:2000|image',
        ]);
        if ($request->hasFile('picture')) {
            $file_name = time() . '_' . $request->picture->getClientOriginalName();
            $request->picture->storeAs('/images', $file_name);
        }


        $blog->update([
            'title' => $request->title,
            'body' => $request->title,
            'image' => $request->hasFile('picture') ?  $file_name : $blog->image,
            'category_id' => $request->category,
        ]);
        return redirect()->route('blog.index');
    }

    public function story(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required|min:5',
            'picture' => 'required|max:2000|image',
        ]);
        $file_name = time() . '_' . $request->picture->getClientOriginalName();
        $request->picture->storeAs('/images', $file_name);

        blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' =>  $file_name,
            'category_id' => $request->category,
        ]);
        event(new postpublish());
        return redirect()->route('blog.index');
    }


    public function delete(blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index');
    }

    public function nvshte()
    {
        return 'test';
    }
}
