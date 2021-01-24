<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orderList = Order::get();

        return view('admin.orders.index', ['orderList' => $orderList]);
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

    public function show($id)
    {
        $order = Order::where('vendor_id', Auth::id())->findOrFail($id);

        return view('admin.orders.show', ['order' => $order]);
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

    public function changeStatus($id, Request $request)
    {
        $request->validate(['status' => 'required']);
        
        $order = Order::where('vendor_id', Auth::id())
            ->findOrFail($id);
        
        $order->update($request->only('status'));

        return back();
    }
}
