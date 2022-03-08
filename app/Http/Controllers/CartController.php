<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\Account;
use DB;
use Carbon\Carbon;

class CartController extends Controller
{
    //
    public function rent($id){
        $userId = Auth::user()->account_id;
        $order = Order::orderBy('order_id', 'DESC')->first();

        if($order == null){
            $orderId = 1;
        }else{
            $orderId = $order->order_id + 1;
        }

        Order::create([
            'order_id' => $orderId,
            'account_id' => $userId,
            'ebook_id' => $id,
            'order_date' => Carbon::now()
        ]);

        return redirect('/cart');
    }

    public function cart(){
        $userId = Auth::user()->account_id;
        $orders = DB::table('orders')
                  ->join('ebooks', 'ebooks.ebook_id', '=', 'orders.ebook_id')
                  ->where('orders.account_id', $userId)
                  ->get();

        return view('cart', compact('orders'));
    }

    public function delete($id){
        Order::where('order_id', $id)->delete();

        return redirect('/cart');
    }

    public function submit(){
        $userId = Auth::user()->account_id;
        Order::where('account_id', $userId)->delete();

        return redirect('/success');
    }

    public function success(){
        return view('success');
    }
}
