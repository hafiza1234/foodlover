<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $order_detailList = OrderDetail::get();

        return view('admin.order_details.index', ['order_detailList' => $order_detailList]);
    }

    public function create()
    {
        return view('admin.order_details.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['vendor_id'] = Auth::user()->id;
        
        $order_detail = OrderDetail::create($data);

        return redirect('admin/order_details');
    }

    public function edit($id)
    {
        $order_detail = OrderDetail::findOrFail($id);

        return view('admin.order_details.edit', ['order_details' => $order_details]);
    }

    public function update($id, Request $request)
    {
        $order_detail = OrderDetail::findOrFail($id);

        $order_detail->update($request->all());

        return redirect('admin/order_details');
    }

    public function destroy($id)
    {
        $order_detail = OrderDetail::find($id);

        $order_detail->delete();
        
        return redirect('admin/order_details');
    }
}
