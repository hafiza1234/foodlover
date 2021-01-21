<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    //
    public function index()
    {
        return 'food';
    }

    public function create()
    {
        return view('admin.foods.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['vendor_id'] = Auth::user()->id;
        
        $food = Food::create($data);

        return redirect('admin/foods');
    }
    

    public function edit($id)
    {
        $food = Food::findOrFail($id);

        return view('admin.foods.edit', ['food' => $food]);
    }

    public function update($id, Request $request)
    {
        $food = Food::findOrFail($id);

        $food->update($request->all());

        return redirect('admin/foods');
    }

    public function destroy($id)
    {
        $food = Food::find($id);

        $food->delete();
        
        return redirect('admin/foods');
    }

}
