<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller

{
    public function index()
    {
        $ratingList = Rating::get();

        return view('admin.ratings.index', ['ratingList' => $ratingList]);
    }

    public function create()
    {
        return view('admin.ratings.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['vendor_id'] = Auth::user()->id;
        
        $rating = Rating::create($data);

        return redirect('admin/ratings');
    }

    public function edit($id)
    {
        $rating = Rating::findOrFail($id);

        return view('admin.ratings.edit', ['rating' => $rating]);
    }

    public function update($id, Request $request)
    {
        $rating = Rating::findOrFail($id);

        $rating->update($request->all());

        return redirect('admin/ratings');
    }

    public function destroy($id)
    {
        $rating = Rating::find($id);

        $rating->delete();
        
        return redirect('admin/ratings');
    }
}
