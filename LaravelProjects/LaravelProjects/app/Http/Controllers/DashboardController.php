<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $orders = Orders::orderBy('order_number', 'desc')->limit(6)->get(); 

        $total_orders = Orders::all()->count();

        $total_users = User::all()->count();

        $totalOrders = $orders->count();

        $totalProducts = Orders::sum('number_of_products');

        $completedOrders = Orders::where('status', 'Completed')->count();

        $todaysOrders = Orders::whereDate('date', Carbon::today())->count();

        return view('dashboard', compact('orders', 'total_orders','total_users', 'totalOrders', 'totalProducts', 'completedOrders', 'todaysOrders'));
    }
}
