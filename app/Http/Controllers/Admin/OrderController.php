<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orderList = Order::get();

        return view('admin.orders.index', ['menuList' => $menuList]);
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['vendor_id'] = Auth::user()->id;
        
        $order = Order::create($data);

        return redirect('admin/orders');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.edit', ['order' => $order]);
    }

    public function update($id, Request $request)
    {
        $order = Order::findOrFail($id);

        $order->update($request->all());

        return redirect('admin/orders');
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();
        
        return redirect('admin/orders');
    }
}
