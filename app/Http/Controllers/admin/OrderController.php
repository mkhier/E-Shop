<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::where('status', '0')->get();
        return view('Admin.Orders.index', compact('order'));
    }
    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        return view('Admin.Orders.view', compact('order'));
    }
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->input('order_status');
        $order->update();
        return redirect('orders')->with('status', 'Order Updated Successfully');
    }
    public function order_history()
    {
        $order = Order::where('status', '1')->get();
        return view('Admin.Orders.history', compact('order'));
    }
}
