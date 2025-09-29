<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class OrdersController extends Controller
{
    public function orders(Request $request){

    $query = Orders::query();

    if ($request->start_date && $request->end_date) {
        $query->where(function ($q) use ($request) {
            $q->whereBetween('contract_start_date', [$request->start_date, $request->end_date])
            ->orWhereBetween('contract_end_date', [$request->start_date, $request->end_date]);
        });
    }


    if ($request->search) {
        $query->where(function($q) use ($request) {
            $q->where('order_number', 'like', "%{$request->search}%")
              ->orWhere('cutomerName', 'like', "%{$request->search}%")
              ->orWhere('mobile_number', 'like', "%{$request->search}%");
        });
    }

    $orders = $query->orderBy('order_number', 'desc')
                ->limit(10)
                ->get();

    return view('orders', compact('orders'));
    }

    public function addorders(){
        return view('addorders');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number_of_products' => 'required|integer|min:1',
            'cutomerName'        => 'required|string|max:255',
            'mobile_number'      => 'required|string|max:15',
            'book_by'            => 'required|string|max:1',
            'order_mode'         => 'required|string|in:B2C,B2B',
            'time'               => 'required',
            'contract_start_date'=> 'required|date',
            'contract_end_date'  => 'required|date|after_or_equal:contract_start_date',
            'coupan'             => 'nullable|string|max:20',
            'address'            => 'required|string|max:500',
        ]);


        $latestOrder = Orders::latest('order_number')->first();
        $nextOrderNumber = $latestOrder ? $latestOrder->order_number + 1 : 10001;

        $orderTotal = 1000 * $request->number_of_products;
        if ($request->coupan == 'H5') {
            $orderTotal *= 0.95;
        } elseif ($request->coupan == 'H10') {
            $orderTotal *= 0.90;
        } elseif ($request->coupan == 'H15') {
            $orderTotal *= 0.85;
        } elseif ($request->coupan == 'HMSCP') {
            $orderTotal *= 0.702;
        }

        $order = Orders::create([
            'order_number'        => $nextOrderNumber,
            'number_of_products'  => $request->number_of_products,
            'cutomerName'         => $request->cutomerName,
            'mobile_number'       => $request->mobile_number,
            'order_total'         => $orderTotal,
            'date'                => now()->toDateString(),
            'status'              => 'Active',
            'customer_id'         => rand(1000, 9999),
            'book_by'             => $request->book_by,
            'order_mode'          => $request->order_mode,
            'time'                => $request->time,
            'contract_start_date' => $request->contract_start_date,
            'contract_end_date'   => $request->contract_end_date,
            'coupan'              => $request->coupan,
            'address'             => $request->address,
        ]);

        return redirect(route('dashboard'))->with('success', 'Order placed successfully! Order Number: ' . $nextOrderNumber);
    }

    public function edit(Orders $order){
        return view('editorders', ['order' => $order]);
    }

    public function update(Request $request,Orders $order){
    $validated = $request->validate([
        'number_of_products' => 'required|integer|min:1',
        'cutomerName'        => 'required|string|max:255',
        'mobile_number'      => 'required|string|max:15',
        'book_by'            => 'required|string|max:1',
        'order_mode'         => 'required|string|in:B2C,B2B',
        'time'               => 'required',
        'contract_start_date'=> 'required|date',
        'contract_end_date'  => 'required|date|after_or_equal:contract_start_date',
        'status'             => 'required|string|max:20',
        'address'            => 'required|string|max:500',
    ]);

    $order->update($validated);

    return redirect(route('orders'))->with('success', 'Order Updated Successfully');

    }

    public function delete(Orders $order){
    
    $order->delete();

    return redirect(route('orders'))->with('success', 'Order Deleted Successfully');
    }
}
