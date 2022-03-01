<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Order;


class AuthController extends Controller
{
    public function home()
    {
        $items = Item::all();
        if(Auth::check()){
            $cart = Order::where('user_id', Auth::id())->where('status_id',1)->count();
            return view('welcome',compact('items','cart'));
        }else
        {
            return view('welcome',compact('items'));
        }


    }
    public function login()
    {
        return view('auth.login');
    }
    

    public function register()
    {
        return view('auth.register');
    }

    public function login_check(Request $request)
    {
        $validate = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if(Auth::attempt($validate)){
            if( Auth::user()->hasRole('admin') )
            {
                return redirect()->route('admin_home');
            }else if( Auth::user()->hasRole('user') )
            {
                return redirect()->route('user_home');
            }
        }

        return back()->with('error','Invalid Credentials');
    }

    public function register_check(Request $request)
    {
        $validate = $request->validate([
            'first_name'    => 'required',
            'last_name'    => 'required',
            'address'    => 'required',
            'company_name'    => 'required',
            'company_nature'    => 'required',
            'email'    => 'required',
            'contact'    => 'required',
            'password'    => 'required',
            'repeat_password'    => 'required | same:password',
        ]);

        unset($validate['repeat_password']);
        unset($validate['password']);
        $validate['password'] = bcrypt($request->password);

        $user = User::create($validate);
        $user->assignRole('user');
        return back()->with('success','Registered Successfully!');
    }
}
