<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'district_name' => 'required|string|max:255',
            'province_id' => 'required|integer|exists:provinces,id'
        ]);

        $district = new District;
        $district->district_name = $validatedData['district_name'];
        $district->province_id = $validatedData['province_id'];
        $district->save();

        return response()->json(['message' => 'District created successfully', 'data' => $district]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'district_name' => 'required|string|max:255',
            'province_id' => 'required|integer|exists:provinces,id'
        ]);

        $district = District::find($id);
        if (!$district) {
            return response()->json(['message' => 'District not found'], 404);
        }

        $district->district_name = $validatedData['district_name'];
        $district->province_id = $validatedData['province_id'];
        $district->save();

        return response()->json(['message' => 'District updated successfully', 'data' => $district]);
    }

    public function destroy($id)
    {
        $district = District::find($id);
        if (!$district) {
            return response()->json(['message' => 'District not found'], 404);
        }

        $district->delete();

        return response()->json(['message' => 'District deleted successfully']);
    }
}
