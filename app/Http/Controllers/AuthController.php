<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('layout.sigup');
    }

    public function register_submit(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:16',
            'retype_password' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return view('layout.login');
    }

    public function login()
    {
        return view('layout.login');
    }

    public function login_submit(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // $loginuser = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        // if(Auth::guard('web')->attempt($loginuser)){
        //     return redirect()->route('welcome');
        // }else{
        //     return redirect()->route('login');
        // }

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            if (Auth::user()->role == 1) {
                return redirect()->route('welcome');
            }elseif(Auth::user()->role == 2){
                return redirect()->route('welcome');
            }
            else {
                return redirect()->back()->with('error','Account Role Not Allowed.');
            }
        } else {
            return redirect()->back()->with('error','Invalidate email and password.');
        }
    }

    public function welcome()
    {
        if (!empty(Auth::check())) {
            return view('welcome');
        } else {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        // Auth::guard('web')->logout();
        // return redirect()->route('login');

        Auth::logout();

        return redirect()->route('login');
    }
}
