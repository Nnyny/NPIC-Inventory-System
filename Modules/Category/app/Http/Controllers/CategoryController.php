<?php

namespace Modules\Category\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\app\Models\Category;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category::index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'cat_name' => 'required|max:20',
            'cat_des' => 'required|max:50',
        ]);
        // Create The Category
        $category = new Category;
        $category->cat_name = $request->cat_name;
        $category->cat_des = $request->cat_des;
        $category->save();
        Session::flash('category_create','Category is created.');
        return redirect('/category/create');

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('category::show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category::edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'cat_name' => 'required|max:20|min:3',
            'cat_des' => 'required|max:50|min:3',
        ]);
        if ($validator->fails()) {
            return redirect('category/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);
        }
        // Create The Category
        $category = Category::find($id);
        $category->cat_name = $request->Input('cat_name');
        $category->cat_des = $request->Input('cat_des');
        $category->save();
        Session::flash('category_update','Category is updated.');
        return redirect('category/' . $id . '/edit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('category_delete','Category is deleted.');
        return redirect('category');
    }
}
