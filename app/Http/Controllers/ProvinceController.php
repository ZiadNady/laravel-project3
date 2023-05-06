<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Redirect;

class ProvinceController extends Controller
{
    public function index(Request $request)
    {

        $search = null;
        if ($request->exists('search')) {
            $search  = $request->search;
            $provinces = Province::where('province_name', 'LIKE', $search . '%')->paginate(15);
        } else {
            $provinces = Province::orderBy('id', 'asc')->paginate(15);
        }
        return view('layouts.Area.Province', compact('provinces', 'search'));
    }



    public function getProvincesByCountryId($country_id)
    {
        $provinces = Province::where('country_id', $country_id)->get();

        return response()->json($provinces);
    }

    public function create()
    {
        return Redirect()->Route('provinces.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'country_id' =>  "required",
            'province_name' => 'required|max:255',
        ]);
        // return response()->json($request->all());
        if (Country::find($request->country_id))
            Province::create($validatedData);
        //   dd($request);
        //  flash('Province created successfully.')->success();
        return redirect()->route('provinces.index');
    }

    public function edit($id)
    {
        $province = Province::find($id);
        return view('layouts.Area.EditProvince', compact('province'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'country_id' =>  "required",
            'province_name' => 'required|max:255',
        ]);
        // return response()->json($request->all());

        if (Country::find($request->country_id)) {
            $province = Province::find($request->id);
            $province->country_id = $request->country_id;
            $province->province_name = $request->province_name;
            $province->save();
            return redirect()->route('provinces.index')->with('success', 'Province updated successfully.');
        }
    }

    public function destroy($id)
    {
        $province = Province::findOrFail($id);
        $province->delete();
        $search = null;
        return redirect()->route('provinces.index');
    }
}
