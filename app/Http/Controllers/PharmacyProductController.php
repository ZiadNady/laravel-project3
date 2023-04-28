<?php

namespace App\Http\Controllers;

use App\Models\PharmacyProduct;
use Illuminate\Http\Request;

class PharmacyProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacyProducts = PharmacyProduct::all();
        return view('pharmacy-products.index', compact('pharmacyProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacy-products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'expiration_date' => 'required|date',
            'pharmacy_id' => 'required|integer|exists:pharmacies,id',
            'product_id' => 'required|integer|exists:products,id'
        ]);

        PharmacyProduct::create($validatedData);

        return redirect()->route('pharmacy-products.index')->with('success', 'Pharmacy product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pharmacyProduct = PharmacyProduct::findOrFail($id);
        return view('pharmacy-products.show', compact('pharmacyProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pharmacyProduct = PharmacyProduct::findOrFail($id);
        return view('pharmacy-products.edit', compact('pharmacyProduct'));
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
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'expiration_date' => 'required|date',
            'pharmacy_id' => 'required|integer|exists:pharmacies,id',
            'product_id' => 'required|integer|exists:products,id'
        ]);

        $pharmacyProduct = PharmacyProduct::findOrFail($id);
        $pharmacyProduct->update($validatedData);

        return redirect()->route('pharmacy-products.index')->with('success', 'Pharmacy product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pharmacyProduct = PharmacyProduct::findOrFail($id);
        $pharmacyProduct->delete();

        return redirect()->route('pharmacy-products.index')->with('success', 'Pharmacy product deleted successfully.');
    }
}
