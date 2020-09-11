<?php

namespace App\Http\Controllers\Admin;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::latest()->paginate(10);
        $search = "";
        return view('admin.cities.index' , compact('cities', 'search'))->with('i', (request()->input('page', 1)-1)*10);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|unique:cities'
        ]);

        $city = City::create($request->all());
        return redirect()->route('admin.cities.index')
            ->with('success', 'City successfuly created!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $cities = City::where('name', "LIKE", '%' . $search . '%')->latest()->paginate(5);
        return view('admin.cities.index' , compact('cities', 'search'))->with('i', (request()->input('page', 1)-1)*5);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $validator = $request->validate([
            'name' => 'required'
        ]);

        $city->update($request->all());
        return redirect()->route('admin.cities.index')
        ->with('success', 'City successfuly updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('admin.cities.index');
    }
}
