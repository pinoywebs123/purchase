<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Message;
use App\Item;
use App\Order;

class AdminController extends Controller
{
    
    public function home()
    {
        $total_user = User::whereHas(
            'roles', function($q){
                $q->where('name', 'user');
            }
        )->count();
        $total_items = Item::count();
        $total_stock = Item::sum('stock');
        $total_shipped = Order::where('status_id',4)->orWhere('status_id', 3)->count();
        return view('admin.home',compact('total_user','total_items','total_stock','total_shipped'));
    }
    public function items()
    {
        $items = Item::all();
        return view('admin.items',compact('items'));
    }
    public function users()
    {
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'user');
            }
        )->get();
        return view('admin.users',compact('users'));
    }
    public function message()
    {
         $senders = Message::select('sender')->where('receiver',Auth::id())->groupBy('sender')->with('sender_chat')->get();
        return view('admin.message',compact('senders')); 
    }
    public function message_get($id)
    {
        $messages = Message::where('sender',$id)->orWhere('sender',Auth::id())->with('receiver_chat')->with('sender_chat')->get();

        return view('admin.message_get',compact('messages','id'));
    }
    public function message_check(Request $request)
    {
        $validate = $request->validate([
            'message'       => 'required',
            'receiver'   => 'required'
            
        ]);

        $validate['sender']     = Auth::id();
         

        Message::create($validate);

        return back()->with('success','Message Sent');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function create_item()
    {
        return view('admin.item_create');
    }

    public function create_item_check(Request $request)
    {
        $data = $request->all();
        unset($data['image']);

        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);

        $data['image'] = $imageName;

        Item::create($data);

        return back()->with('success','Item Created Successfully!');
    }

    public function edit_item($id)
    {
        $item = Item::find($id);
        return view('admin.item_edit',compact('item'));
    }

    public function update_item(Request $request, $id)
    {
        $item = Item::find($id);
        $item->update($request->all());

        return back()->with('success','Item Updated Successfully!');
    }

    public function update_item_stock(Request $request)
    {
        
        $find_item = Item::find($request->item_id);
        return response()->json($find_item);
    }

    public function update_item_stock_check(Request $request)
    {
        $find_item = Item::find($request->item_id);
        $find_item->update(['stock'=> $find_item->stock + $request->stock]);
        return back()->with('success','Item Updated Stock Successfully!');
    }

    public function update_item_discount(Request $request)
    {
        $find_item = Item::find($request->item_id);
        return response()->json($find_item);
    }

    public function update_item_discount_check(Request $request)
    {
        $find_item = Item::find($request->item_id);
        $find_item->update(['discount'=> + $request->discount ]);
        return back()->with('success','Item Updated Discount Successfully!');
    }

    public function history_item($id)
    {
        $item_history = Order::where('item_id', $id)->where('status_id', '!=',1)->get();
        return view('admin.item_history',compact('item_history'));
    }

    public function orders()
    {
        $orders = Order::where('status_id','!=',1)->with('item')->orderBy('id','desc')->get();
        return view('admin.order',compact('orders'));
    }

    public function orders_approve_ship($id)
    {
        $find_order = Order::find($id);

        if(!$find_order)
        {
            return back()->with('error','Order Not Found');
        }

        $find_order->update(['status_id'=> 3]);
        return back()->with('success','Order Approve and Shipped ');
    }
}
