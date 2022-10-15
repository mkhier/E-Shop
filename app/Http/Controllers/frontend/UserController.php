<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $order = Order::where('user_id',Auth::id())->get();
        return view('Frontend.Orders.index', compact('order'));
    }
    public function view($id)
    {
        $order = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('Frontend.Orders.view',compact('order'));
    }
}
