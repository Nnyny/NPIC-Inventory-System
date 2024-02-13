<?php

namespace Modules\Item\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Item\app\Models\Item;
use Modules\Category\app\Models\Category;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::paginate(10);
        return view('item::index')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->cat_name;
        }
        return view('item::create')->with('categories', $categories);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'item_code' => 'required|max:20|min:3',
            'item_img' => 'required|mimes:jpg,jpeg,png,gif,webp',
            'item_name' => 'required|max:20|min:3',
            'category_id' => 'required|integer',
            'item_qty' => 'required|integer',
            'item_des' => 'required|max:50|min:3',
            
            // 'description' => 'required|max:1000|min:10',
        ]);
         
        if ($validator->fails()) {
            return redirect('item/create')
                ->withInput()
                ->withErrors($validator);
        }
   
        // Create The item
        $image = $request->file('item_img');
        $upload = 'pic/';
        $filename = time().$image->getClientOriginalName();
        move_uploaded_file($image->getPathName(), $upload. $filename);
   
        $item = new Item();
        $item->item_code = $request->item_code;
        $item->item_img = $filename;
        $item->item_name = $request->item_name;
        $item->category_id = $request->category_id;
        $item->item_qty = $request->item_qty;
        $item->item_des = $request->item_des;
        $item->save();
        Session::flash('item_create','New data is created.');
        return redirect('item/create');

    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('item::show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->cat_name;
        }
        $item = Item::findOrFail($id);
        return view('item::edit')->with('item', $item)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'item_code' => 'required|max:20|min:3',
            'item_img' => 'required|mimes:jpg,jpeg,png,gif,webp',
            'item_name' => 'required|max:20|min:3',
            'category_id' => 'required|integer',
            'item_qty' => 'required|integer',
            'item_des' => 'required|max:50|min:3',
        ]);


        if ($validator->fails()) {
            return redirect('item/'.$id.'/edit')
                ->withInput()
                ->withErrors($validator);
        }
        $item = Item::find($id);
        // $image = $request->file('item_img');
        // $filename = time().$image->getClientOriginalName();
        // move_uploaded_file($image->getPathName(), $filename);
        
        // Create The Post
        if($request->file('item_img') != ""){
            $image = $request->file('item_img');
            $upload = 'pic/';
            $filename = time().$image->getClientOriginalName();
            move_uploaded_file($image->getPathName(), $upload . $filename);
        }
       
        $item->item_code = $request->Input('item_code');
        $item->item_name = $request->Input('item_name');
        $item->category_id = $request->Input('category_id');
        $item->item_qty = $request->Input('item_qty');
        // $item->item_img = $filename;
        if(asset($filename)){
            $item->item_img = $filename;
        }
       
        $item->item_des = $request->Input('item_des');
        $item->save();


        Session::flash('item_update','Data is updated');
        return redirect('item/'.$item->id.'/edit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $image_path = 'pic/'.$item->item_img;
        File::delete($image_path);
        $item->delete();
        Session::flash('item_delete','Data is deleted.');
        return redirect('item');

    }

    public function getBySearch(Request $request) {
        $keyword = !empty($request->input('keyword'))?$request->input('keyword'):"";
        $items = Item::all();
        $items = Item::where('item_name', 'LIKE', "%{$keyword}%")
        ->orWhere('item_code', 'LIKE', "%{$keyword}%")
        ->paginate(5);
        
        return view('item::index', compact('items', 'keyword'));


        // if( $keyword != ""){
        //     return view('item::index')
        //         ->with('items', Item::where('item_name' , 'LIKE', '%'.$keyword.'%')->paginate(10))
        //         ->with('keyword', $keyword);
        // } else {
        //     return view('item::index')
        //         ->with('items', Item::paginate(10))
        //         ->with('keyword', $keyword);
        // }
    }

}
