<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return 'Bokul';
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $menu = Menu::create($request->all());

        return redirect('admin/menus');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);

        return view('admin.menu.edit');
    }

    public function update($id, Request $request)
    {
        $menu = Menu::find($id);

        $menu->update($request->all());

        return redirect('admin/menus');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);

        $menu->delete();
        
        return redirect('admin/menus');
    }
}
