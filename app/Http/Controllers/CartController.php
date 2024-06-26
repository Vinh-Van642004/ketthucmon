<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->id;

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $request->name,
                'price' => $request->price,
                'image' => $request->image,
                'quantity' => 1
            ];
        }

        Session::put('cart', $cart);
        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng', 'cart' => $cart]);
    }

    public function view()
    {
        $cart = Session::get('cart', []);
        return response()->json(['cart' => $cart]);
    }

    public function remove(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->id;

        if(isset($cart[$id])) {
            unset($cart[$id]);
        }

        Session::put('cart', $cart);
        return response()->json(['message' => 'Sản phẩm đã được xóa khỏi giỏ hàng', 'cart' => $cart]);
    }
}
