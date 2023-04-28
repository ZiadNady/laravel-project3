<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PharmacyController extends Controller
{
    // Get all pharmacies
    public function index()
    {
        $pharmacies = Pharmacy::all();
        return response()->json($pharmacies);
    }

    // Get a specific pharmacy
    public function show($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        return response()->json($pharmacy);
    }

    // Create a new pharmacy
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pharmacy_name' => 'required|max:255',
            'country_id' => 'required|integer',
            'district_id' => 'required|integer',
            'province_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $pharmacy = new Pharmacy;
        $pharmacy->pharmacy_name = $request->pharmacy_name;
        $pharmacy->country_id = $request->country_id;
        $pharmacy->district_id = $request->district_id;
        $pharmacy->province_id = $request->province_id;
        $pharmacy->active = $request->active ?? true;
        $pharmacy->save();

        return response()->json(['message' => 'Pharmacy created successfully']);
    }

    // Update a pharmacy
    public function update(Request $request, $id)
    {
        $pharmacy = Pharmacy::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'pharmacy_name' => 'required|max:255',
            'country_id' => 'required|integer',
            'district_id' => 'required|integer',
            'province_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $pharmacy->pharmacy_name = $request->pharmacy_name;
        $pharmacy->country_id = $request->country_id;
        $pharmacy->district_id = $request->district_id;
        $pharmacy->province_id = $request->province_id;
        $pharmacy->active = $request->active ?? true;
        $pharmacy->save();

        return response()->json(['message' => 'Pharmacy updated successfully']);
    }

    // Delete a pharmacy
    public function destroy($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacy->delete();

        return response()->json(['message' => 'Pharmacy deleted successfully']);
    }
}
