<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class categorycontroller extends Controller
{

    public function index()
    {

        $categories = category::paginate(3);
        // App::setLocale($locale);
        // dd(App::isLocale('en'));
        return view('category.index', compact('categories'));
    }



    public function create()
    {
        return view('category.create');
    }



    public function story(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:1000'
        ]);

        category::create([
            'title' => $request->title
        ]);

        return   redirect()->route('category.index');
    }



    public function edit(category $category)
    {
        return view('category.edit', compact('category'));
    }



    public function update(Request $request, category $category)
    {

        $request->validate([
            'title' => 'required|min:5|max:1000'
        ]);

        $category->update([
            'title' => $request->title
        ]);

        return redirect()->route('category.index');
    }



    public function destroy(category $category)
    {

        $category->delete();
        return redirect()->route('category.index');
    }
}
