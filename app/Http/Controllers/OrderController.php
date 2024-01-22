<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::paginate(5);
        return view('admin.order.order',compact('orders'));
    }
}