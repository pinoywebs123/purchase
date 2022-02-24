<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\User;

class UserController extends Controller
{
    
    public function home()
    {
        return view('user.home');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function items()
    {
        return view('user.items');
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
}
