<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $menuList = Menu::get();

        return view('admin.menus.index', ['menuList' => $menuList]);
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['vendor_id'] = Auth::user()->id;

        if ($request->hasFile('image')) {
            $path = $request->image->store('menus', 'public');
            $data['image_url'] = $path;
        }
        
        $menu = Menu::create($data);

        return redirect('admin/menus');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        return view('admin.menus.edit', ['menu' => $menu]);
    }

    public function update($id, Request $request)
    {
        $menu = Menu::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->image->store('menus', 'public');
            $data['image_url'] = $path;
        }
        
        $menu->update($data);

        return redirect('admin/menus');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);

        $menu->delete();
        
        return redirect('admin/menus');
    }
}
