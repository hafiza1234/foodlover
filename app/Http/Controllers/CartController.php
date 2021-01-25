<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($menuId, Request $request)
    {
        $menu = Menu::findOrFail($menuId);
        
        if ($menu->isAddedToCart()) {
            return back();
        }

        $qty = $request->qty > 0 ? $request->qty : 1;

        $items = cache()->get('cart-' . Auth::id(), []);
        
        $items[] = [
            'menu_id' => $menu->id,
            'vendor_id' => $menu->vendor_id,
            'qty' => $qty
        ];

        cache()->forever('cart-' . Auth::id(), $items);

        return back();
    }

    public function removeFromCart($menuId)
    {
        $items = cache()->get('cart-' . Auth::id(), []);
        
        $items = array_filter($items, function ($item) use ($menuId) {
            return $item['menu_id'] != $menuId;
        });

        cache()->forever('cart-' . Auth::id(), $items);

        return back();
    }

    public function show()
    {
        $items = cache()->get('cart-' . Auth::id(), []);

        if (! count($items)) {
            return redirect('/');
        }
        
        $ids = Arr::pluck($items, 'menu_id');

        $menuList = Menu::whereIn('id', $ids)
            ->get();
        $menuList->map(function ($item) use ($items) {
            foreach ($items as $im) {
                if ($im['menu_id'] == $item->id) {
                    $item->qty = $im['qty'];
                    $item->total = $item->qty * $item->price;

                    return $item;
                }
            }
            return $item;
        });
        
        return view('cart', ['menuList' => $menuList]);
    }

    public function placeOrder(Request $request)
    {
        $data = [
            'customer_id' => Auth::id(),
            'vendor_id' => $request->vendor_id,
            'total_amount' => $request->total,
            'order_date' => now(),
            'total_amount' => $request->total,
            'address' => $request->address,
            'status' => 1,
        ];

        $order = Order::create($data);
        $order->items()->createMany($request->menu);

        cache()->forget('cart-' . Auth::id());

        return redirect('my-orders');
    }
}
