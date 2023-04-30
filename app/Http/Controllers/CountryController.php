<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $search = null;
        if ($request->exists('search')) {
            $search  = $request->search;
            $countries = Country::where('country_name', 'LIKE', $search . '%')->paginate(15);
        } else {
            $countries = Country::orderBy('id', 'asc')->paginate(15);
        }
        return view('layouts.Area.Country', compact('countries', 'search'));
    }

    public function create()
    {
        return view('layouts.Area.addNewCountry');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'country_name' => 'required|max:255',
        ]);
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required',
        //     'address'=>'required',
        // ]);
        Country::create($validatedData);
        dd($request);
        // return redirect()->route('countries.store');
        // $country = new Country();
        // $country->country_name = $request->country_name;
        // $country->save();
        // return view('welcome');
        return response()->json($request->all());

        // return redirect()->route('countries.index')
        //     ->with('success', 'Country created successfully.');
    }

    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $validatedData = $request->validate([
            'country_name' => 'required|max:255',
        ]);

        $country->country_name = $request->country_name;
        $country->save();

        return redirect()->route('countries.index')
            ->with('success', 'Country updated successfully.');
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')
            ->with('success', 'Country deleted successfully.');
    }
}
