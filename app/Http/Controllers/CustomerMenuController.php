<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class CustomerMenuController extends Controller
{
    public function chinese()
    {
        $menuList = Menu::where('type', 'Chinese')->get();

        return view('menu-by-type', ['menuList' => $menuList, 'type' => 'Chinese']);
    }

    public function fastFood()
    {
        $menuList = Menu::where('type', 'Fast Food')->get();

        return view('menu-by-type', ['menuList' => $menuList, 'type' => 'Fast Food']);
    }

    public function homemade()
    {
        $menuList = Menu::where('type', 'Home Made')->get();

        return view('menu-by-type', ['menuList' => $menuList, 'type' => 'Fast Food']);
    }

    public function details($id)
    {
        $menu = Menu::find($id);
        
        $menuList = Menu::where('vendor_id', $menu->vendor_id)
            ->whereNotIn('id', [$menu->id])
            ->get();

        return view('menu-details', [
            'menu' => $menu,
            'menuList' => $menuList,
        ]);
    }
}
