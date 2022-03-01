<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\User;
use App\Order;
use App\Item;

class UserController extends Controller
{
    
    public function home()
    {
        $total_ordered = Order::where('user_id',Auth::id())->count();
        $total_spent = Order::where('user_id',Auth::id())->where('status_id', '!=', 1)->sum('total_price');
        $total_shipped = Order::where('user_id', Auth::id())->where('status_id',4)->orWhere('status_id', 3)->count();
        return view('user.home',compact('total_ordered','total_spent','total_shipped'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function items()
    {
        $orders = Order::where('user_id', Auth::id())->with('item')->orderBy('id','desc')->get();
        return view('user.items',compact('orders'));
    }
    public function message()
    {
        $messages = Message::where('sender',Auth::id())->orWhere('receiver',Auth::id())->with('receiver_chat')->with('sender_chat')->get();

        return view('user.message',compact('messages')); 
    }
    public function message_check(Request $request)
    {
        $validate = $request->validate([
            'message'     => 'required'
            
        ]);

       $admin = User::whereHas(
            'roles', function($q){
                $q->where('name', 'admin');
            }
        )->first();

        $validate['sender']     = Auth::id();
        $validate['receiver']   = $admin->id; 

        Message::create($validate);

        return back()->with('success','Message Sent');
    }

    public function add_cart($id)
    {
       $find_item = Item::find($id);

       $order = new Order;
       $order->user_id = Auth::id();
       $order->item_id = $find_item->id;
       $order->quantity = 1;
       $order->status_id = 1;
       $order->total_price = $find_item->discounted_price;
       $order->save();

       return back()->with('success','Add Cart Successfully');
    }

    public function cancel_cart($id)
    {
        $find_check_order = Order::where('id',$id)->where('user_id', Auth::id())->first();
        if(!$find_check_order)
        {
           return back()->with('error','Do not touch someone orders'); 
        }

        $find_check_order->delete();
        return back()->with('success','Order Cancel Successfully');
    }

    public function checkout_cart($id)
    {
        $find_check_order = Order::where('id',$id)->where('user_id', Auth::id())->first();
        if(!$find_check_order)
        {
           return back()->with('error','Do not touch someone orders'); 
        }

        $find_check_order->update(['status_id' => 2] );
        return back()->with('success','Order Check Out Successfully');
    }
}
