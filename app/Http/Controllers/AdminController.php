<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Message;
class AdminController extends Controller
{
    
    public function home()
    {
        return view('admin.home');
    }
    public function items()
    {
        return view('admin.items');
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
}
