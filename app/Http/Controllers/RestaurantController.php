<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurantList = User::where('type', 2)
            ->get();

        return view('restaurants', ['restaurantList' => $restaurantList]);
    }

    public function menus(Request $request)
    {
        if (! $id = $request->rest_id) {
            return redirect('restaurants');
        }
        $vendor = User::find($id);

        $menuList = Menu::with('vendor')
            ->where('vendor_id', $id)
            ->get();
        
        return view('restaurants-menu', [
            'menuList' => $menuList,
            'vendor' => $vendor
        ]);
    }
}
