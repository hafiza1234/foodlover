<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $menuList = Payment::get();

        return view('admin.payment.index', ['paymentList' => $paymentList]);
    }

    public function create()
    {
        return view('admin.payments.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['vendor_id'] = Auth::user()->id;
        
        $payment = Payment::create($data);

        return redirect('admin/payments');
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return view('admin.payments.edit', ['payment' => $payment]);
    }

    public function update($id, Request $request)
    {
        $payment = Payment::findOrFail($id);

        $payment->update($request->all());

        return redirect('admin/payments');
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);

        $menu->delete();
        
        return redirect('admin/payments');
    }
}

