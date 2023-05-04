<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = null;
        if ($request->exists('search')) {
            $search  = $request->search;
            $products = Product::where('product_name', 'LIKE', $search . '%')->paginate(15);
        } else {
            $products = Product::orderBy('id', 'asc')->paginate(15);
        }
        return view('layouts.product.product', compact('products', 'search'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validator= $request->validate([
            'category' => 'required',
            'product_name' => 'required',
            'product_code' => 'required|unique:products',
        ]);

            Product::create($validator);
            return redirect()->route('product.index')->with('success', 'product updated successfully.');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('layouts.product.EditProduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'product_name' => 'required',
            'product_code' => 'required|unique:products,product_code,'.$id,
        ]);

        if (Product::find($request->id)) {
            $product = Product::find($request->id);
            $product->category = $request->caegory;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->save();
            return redirect()->route('product.index')->with('success', 'Product updated successfully.');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
