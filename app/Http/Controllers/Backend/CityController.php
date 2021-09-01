<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::latest()->get();

        if($request->has('search')){
          $cities = City::where('name', 'like', "%{$request->search}%")->get();
        }

        return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('city.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {
        if($request->state_id === '--Select--'){
            return redirect()->back()->with('error', 'Please Select a State');
        }

        City::create($request->validated());

        return redirect()->route('cities.index')->with('message', 'City Created Successfully');
    }

   
    public function edit(City $city)
    {
        $states = State::all();
        return view('city.edit', compact(['city', 'states']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->state_id === '--Select--'){
            return back()->with('error', 'Please Select State');
        }

        $request->validate([
            'name' => 'required'
        ]);

       $city = City::find($id);

       $city->state_id = $request->state_id;
       $city->name = $request->name;

       $city->save();

       return redirect()->route('cities.index')->with('message', 'City Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);

        $city->delete();

        return redirect()->route('cities.index')->with('message', 'City Deleted Successfully');
    }
}
