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

    public function received_item($id)
    {
        $find_check_order = Order::where('id',$id)->where('user_id', Auth::id())->first();
        if(!$find_check_order)
        {
           return back()->with('error','Do not touch someone orders'); 
        }

        $find_check_order->update(['status_id' => 4] );
        return back()->with('success','Order Received Successfully');
    }

    public function all_products()
    {
        $cart = Order::where('user_id', Auth::id())->where('status_id',1)->count();
        
        $materials = Item::select('id','material')->get();
        $item_types = Item::select('id','item_type')->get();
        $brands = Item::select('id','brand')->get();
        $countries = Item::select('country_origin')->groupBy('country_origin')->get();

        $queries = Item::select("*");

        if(isset($_GET['material'])){
            $material =  trim($_GET['material']);
            if($material != '0')
            {
               $queries = $queries->where('material',$material);

            }
            
            
        }
        if(isset($_GET['item_type'])){
            $item_type =  trim($_GET['item_type']);
            if($item_type != '0')
            {
                $queries = $queries->where('item_type',$item_type);
            }
            
            
        }
        if(isset($_GET['brand'])){
            $brand =  trim($_GET['brand']);
            if($brand != '0')
            {
              $queries = $queries->where('brand',$brand);  
            }
            
        }
        if(isset($_GET['country'])){
            $country =  trim($_GET['country']);
            if($item_type != '0')
            {
                $queries = $queries->where('country_origin',$country);
            }
            
            
        }


         $items = $queries->get();

        return view('user.items_all',compact('items','cart','materials','item_types','brands','countries'));
    }

    public function all_recommended_products()
    {
        $cart = Order::where('user_id', Auth::id())->where('status_id',1)->count();
        
        $materials = Item::select('id','material')->get();
        $item_types = Item::select('id','item_type')->get();
        $brands = Item::select('id','brand')->get();
        $countries = Item::select('country_origin')->groupBy('country_origin')->get();

         $user_history_orders = Order::select('item_id')->where('user_id', Auth::id())->groupBy('item_id')->with('item')->get();

        $queries = Item::select("*");

        foreach($user_history_orders as $order_hsitory)
        {
            $queries = $queries->where('material', 'LIKE','%'.$order_hsitory->item->material.'%');
             $queries = $queries->where('item_type', 'LIKE','%'.$order_hsitory->item->item_type.'%');
        }
        

        if(isset($_GET['material'])){
            $material =  trim($_GET['material']);
            if($material != '0')
            {
               $queries = $queries->where('material',$material);

            }
            
            
        }
        if(isset($_GET['item_type'])){
            $item_type =  trim($_GET['item_type']);
            if($item_type != '0')
            {
                $queries = $queries->where('item_type',$item_type);
            }
            
            
        }
        if(isset($_GET['brand'])){
            $brand =  trim($_GET['brand']);
            if($brand != '0')
            {
              $queries = $queries->where('brand',$brand);  
            }
            
        }
        if(isset($_GET['country'])){
            $country =  trim($_GET['country']);
            if($item_type != '0')
            {
                $queries = $queries->where('country_origin',$country);
            }
            
            
        }


         $items = $queries->get();

        return view('user.items_recommended',compact('items','cart','materials','item_types','brands','countries'));
    }
}
