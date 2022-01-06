<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class CartsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $cart_items = Cart::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $cart_items->load('item');

        $sum_total = 0;
        foreach($cart_items as $item){
            $sum_total += $item->item->price * $item->orders;
        }

        return view('carts.index')->with([
            'cart_items' => $cart_items,
            'sum_total' => $sum_total
        ]);
    }
}
