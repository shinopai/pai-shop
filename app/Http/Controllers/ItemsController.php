<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Item;
use App\Cart;
use App\Stock;
use App\User;
use App\Order;

class ItemsController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['addCart']);
    }

    public function index(){
        $items = Item::orderBy('id', 'desc')->paginate(20);
        $items->load('category');

        if(Auth::user()){
            $cart_orders = Cart::where('user_id', Auth::id())->count();
        }

        return view('items.index')->with([
            'items' => $items,
            'cart_orders' => $cart_orders
            ]);
    }

    public function show(Item $item){
        $item->load('category', 'stock');

        return view('items.show')->with('item', $item);
    }

    public function addCart(Request $request, Item $item){
        DB::beginTransaction();

        try{
            Cart::firstOrCreate(
                [
                    'user_id' => $request->input('user_id'),
                    'item_id' => $item->id
                ],
                [
                    'user_id' => $request->input('user_id'),
                    'item_id' => $item->id,
                    'orders' => $request->input('orders')
                ]
                );

            $stock = Stock::where('item_id', $item->id)->first();
            $stock->quantity = $stock->quantity - $request->input('orders');
            $stock->save();
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            Log::log('error message', $e);
        }

        return redirect('/carts')->with('flash', '商品を追加しました');
    }

    public function removeItem(Request $request, Item $item){
        DB::beginTransaction();

        try{
            $cart_item = Cart::where('user_id', $request->input('user_id'))->where('item_id', $item->id)->first();
            $cart_item->delete();
            $stock = Stock::where('item_id', $item->id)->first();
            $stock->quantity = $stock->quantity + $request->input('orders');
            $stock->save();
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            Log::log('error message', $e);
        }

        return redirect()->back()->with('flash', '商品を削除しました');
    }
}
