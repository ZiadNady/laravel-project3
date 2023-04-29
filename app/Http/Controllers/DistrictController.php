<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $search = null;
        if ($request->exists('search')) {
            $search  = $request->search;
            $districts = District::where('district_name', 'LIKE', $search . '%')->paginate(15);
        } else {
            $districts = District::orderBy('id', 'asc')->paginate(15);
        }
        return view('layouts.Area.District', compact('districts', 'search'));
    }

    public function getDistrictsByCountryId($province_id)
    {
        $districts = District::where('province_id', $province_id)->get();

        return response()->json($districts);
    }

    public function create()
    {
        return redirect()->route('districts.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'province_id' => 'required',
            'district_name' => 'required|max:255',
        ]);
        if (Province::find($request->province_id))
            District::create($validatedData);
        // return response()->json($request->province_id);
        //   dd($request);
        //  flash('District created successfully.')->success();
        //   return response()->json($request->all());
        return redirect()->route('districts.index');
    }

    public function edit($id)
    {
        $district = District::find($id);
        return view('layouts.Area.EditDistrict', compact('district'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'province_id' => 'required',
            'district_name' => 'required|max:255',
        ]);
        //   return response()->json($request);

        if (Province::find($request->province_id)) {
            $district = District::find($request->id);
            $district->province_id = $request->province_id;
            $district->district_name = $request->district_name;
            $district->save();
            return redirect()->route('districts.index')->with('success', 'District updated successfully.');
        }
    }

    public function destroy($id)
    {
        $district = District::findOrFail($id);
        $district->delete();
        $search = null;
        return redirect()->route('districts.index');
    }
}
