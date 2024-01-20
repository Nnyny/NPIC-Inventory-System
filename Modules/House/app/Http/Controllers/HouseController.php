<?php

namespace Modules\House\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Response;
use Modules\House\app\Models\House;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Facades\DB;




class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses = House::all();
        return view('house::index')->with('houses',$houses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('house::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'house_num' => 'required|max:255',
            'street' => 'required|max:255',
            'country' => 'required|max:255',
        ]);
        // Create The Category
        $house = new House;
        $house->house_num = $request->house_num;
        $house->street = $request->street;
        $house->country = $request->country;
        $house->save();
        Session::flash('house_create','House is created.');
        return redirect('/house/create');
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $house = House::find($id);
        return view('house::show')->with('house',$house);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $house = House::find($id);
        return view('house::edit')->with('house', $house);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
			'house_num' => 'required|max:20',
            'street' => 'required|max:20',
            'country' => 'required|max:20',
		]);
		if ($validator->fails()) {
			return redirect('house/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);
		}
		// Create The Category
		$house = House::find($id);
		$house->house_num = $request->Input('house_num');
        $house->street = $request->Input('street');
        $house->country = $request->Input('country');
		$house->save();
		Session::flash('house_update','House is updated.');
		return redirect('house/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $house = House::find($id);
        $house->delete();
        Session::flash('house_delete','House is deleted.');
        return redirect('house');
    }

    public function getBySearch(Request $request) {
        $keyword = $request->input('keyword', '');

        $houses = QueryBuilder::for(House::class)
            ->allowedFilters(['house_num', 'street', 'country'])
            ->defaultSort('created_at') // You can change this to the default sorting you want
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('house_num', 'like', '%' . $keyword . '%')
                      ->orWhere('street', 'like', '%' . $keyword . '%')
                      ->orWhere('country', 'like', '%' . $keyword . '%');
            })
            ->paginate(10);

        return view('house::index', compact('houses', 'keyword'));
    }
}
