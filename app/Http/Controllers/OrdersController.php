<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Order;
use App\Cart;

class OrdersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showThanks(){
        return view('orders.thanks');
    }

    public function buyItem(Request $request){
        $count = count($request->input('user_ids'));
        $user_ids = $request->input('user_ids');
        $item_ids = $request->input('item_ids');
        $orders = $request->input('orders');
        $prices = $request->input('prices');

        DB::beginTransaction();

        try{
            for ($i = 0; $i < $count; $i++) {
                Order::create([
                    'user_id' => $user_ids[$i],
                    'item_id' => $item_ids[$i],
                    'orders' => $orders[$i],
                    'sum_total' => $orders[$i] * $prices[$i]
                ]);
            }
            DB::table('carts')->where('user_id', Auth::id())->delete();
        }catch(\Exception $e){
            DB::rollback();
            Log::error($e);
        }

        DB::commit();

        return redirect('/thanks');
    }
}
