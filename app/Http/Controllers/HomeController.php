<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menuList = Menu::get();

        return view('welcome', ['menuList' => $menuList]);
    }
}
