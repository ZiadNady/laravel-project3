<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the provinces.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        return view('provinces.index', compact('provinces'));
    }

    /**
     * Show the form for creating a new province.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinces.create');
    }

    /**
     * Store a newly created province in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'province_name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $province = new Province();
        $province->province_name = $validatedData['province_name'];
        $province->country_id = $validatedData['country_id'];
        $province->save();

        return redirect()->route('provinces.index')->with('success', 'Province created successfully.');
    }

    /**
     * Display the specified province.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        return view('provinces.show', compact('province'));
    }

    /**
     * Show the form for editing the specified province.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        return view('provinces.edit', compact('province'));
    }

    /**
     * Update the specified province in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        $validatedData = $request->validate([
            'province_name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $province->province_name = $validatedData['province_name'];
        $province->country_id = $validatedData['country_id'];
        $province->save();

        return redirect()->route('provinces.index')->with('success', 'Province updated successfully.');
    }

    /**
     * Remove the specified province from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        $province->delete();
        return redirect()->route('provinces.index')->with('success', 'Province deleted successfully.');
    }
}
