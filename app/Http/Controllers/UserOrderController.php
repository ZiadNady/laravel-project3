<?php

namespace App\Http\Controllers;

use App\Models\UserOrder;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function index()
    {
        $userOrders = UserOrder::all();
        return view('user_orders.index', compact('userOrders'));
    }

    public function create()
    {
        return view('user_orders.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_date' => 'required',
            'order_status' => 'required',
            'order_total' => 'required',
            'shipping_date' => 'required',
            'pharmacy_id' => 'required',
            'user_id' => 'required',
            'Prescription_code' => 'required',
            'prescription_status' => 'required',
            'active' => 'required'
        ]);

        UserOrder::create($validatedData);

        return redirect()->route('user_orders.index')->with('success', 'User Order created successfully.');
    }

    public function show(UserOrder $userOrder)
    {
        return view('user_orders.show', compact('userOrder'));
    }

    public function edit(UserOrder $userOrder)
    {
        return view('user_orders.edit', compact('userOrder'));
    }

    public function update(Request $request, UserOrder $userOrder)
    {
        $validatedData = $request->validate([
            'order_date' => 'required',
            'order_status' => 'required',
            'order_total' => 'required',
            'shipping_date' => 'required',
            'pharmacy_id' => 'required',
            'user_id' => 'required',
            'Prescription_code' => 'required',
            'prescription_status' => 'required',
            'active' => 'required'
        ]);

        $userOrder->update($validatedData);

        return redirect()->route('user_orders.index')->with('success', 'User Order updated successfully.');
    }

    public function destroy(UserOrder $userOrder)
    {
        $userOrder->delete();

        return redirect()->route('user_orders.index')->with('success', 'User Order deleted successfully.');
    }
}
