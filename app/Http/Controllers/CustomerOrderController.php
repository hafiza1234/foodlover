<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $orderList = Order::where('customer_id', Auth::id())
            ->orderBy('id', 'DESC')
            ->get();

        return view('my-orders.index', ['orderList' => $orderList]);
    }

    public function show($id)
    {
        $oder = Order::with('items')
            ->where('customer_id', Auth::id())
            ->findOrFail($id);

        return view('my-orders.show', ['order' => $oder]);
    }

    public function cancel($id)
    {
        $order = Order::where('status', 1)
            ->where('customer_id', Auth::id())
            ->findOrFail($id);

        $order->update(['status' => '5']);

        return back();
    }
}
