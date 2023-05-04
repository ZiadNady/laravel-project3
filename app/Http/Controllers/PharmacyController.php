<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PharmacyController extends Controller
{
    // Get all pharmacies
    public function index(Request $request)
    {
        $search = null;
        if ($request->exists('search')) {
            $search  = $request->search;
            $pharmacies = Pharmacy::where('pharmacy_name', 'LIKE', $search . '%')->paginate(15);
        } else {
            $pharmacies = Pharmacy::orderBy('id', 'asc')->paginate(15);
        }
        return view('layouts.pharmacy.Pharmacy', compact('pharmacies', 'search'));
    }

    public function create()
    {
        return redirect()->route('pharmacy.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pharmacy_name' => 'required|max:255',
            'country_id' => 'required|integer',
            'district_id' => 'required|integer',
            'province_id' => 'required|integer',
        ]);
        // return response()->json($request);
        if (District::find($request->district_id)) {
            Pharmacy::create($validatedData);
            return redirect()->route('pharmacy.index')->with('success', 'District updated successfully.');
        }
    }

    public function edit($id)
    {
        $pharmacy = Pharmacy::find($id);
        return view('layouts.pharmacy.EditPharmacy', compact('pharmacy'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'pharmacy_name' => 'required|max:255',
            'country_id' => 'required|integer',
            'district_id' => 'required|integer',
            'province_id' => 'required|integer',
        ]);
        if (Pharmacy::find($request->id)) {
            $pharmacy = Pharmacy::find($request->id);
            $pharmacy->pharmacy_name = $request->pharmacy_name;
            $pharmacy->country_id = $request->country_id;
            $pharmacy->district_id = $request->district_id;
            $pharmacy->province_id = $request->province_id;
            $pharmacy->save();
            return redirect()->route('pharmacy.index')->with('success', 'Pharmacy updated successfully.');
        }
    }


    public function destroy($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacy->delete();
        $search = null;
        return redirect()->route('pharmacy.index');
    }
}
