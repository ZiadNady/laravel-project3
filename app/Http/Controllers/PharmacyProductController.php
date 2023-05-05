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
    public function index(Request $request, $id)
    {
        $search = null;
        if ($request->exists('search')) {
            $search  = $request->search;
            $pharmacyProducts = PharmacyProduct::where('product_name', 'LIKE', $search . '%')->paginate(15);
        } else {
            $pharmacyProducts = PharmacyProduct::orderBy('id', 'asc')->where('pharmacy_id', $id)->paginate(15);
        }
        return view('layouts.pharmacyProduct.pharmacyProduct', compact('pharmacyProducts','search','id'));
    }

    public function create()
    {
        return view('pharmacy-products.create');
    }

    public function store(Request $request)
    {
        $id = $request->pharmacy_id;
        $validatedData = $request->validate([
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'expiration_date' => 'required|date',
            'pharmacy_id' => 'required|integer|exists:pharmacies,id',
            'product_id' => 'required|integer|exists:products,id'
        ]);
        PharmacyProduct::create($validatedData);
        return redirect()->route('pharmacyProduct.index',$id)->with('success', 'Pharmacy product created successfully.');
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
