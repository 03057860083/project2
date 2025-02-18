<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Auth;

class YourController extends Controller
{
    public function login()
    {
        return view("Login");
    }
    public function signup()
    {
        return view("Signup"); //auth confirmation ky lye use hota hy ky user khud hy ya koi unknown hy
    }
    public function signupData(Request $request)
    {
        //validation hm (email,password ya ksi variable per koi ristrications lgana chahty hon to use krty hen)
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'

        ]);
        //yeh neachy wala process hm database main data save krne ky lye use krty hen
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //bcrypt password secure krne ky lye use kia jata hy
        $request = $user->save();
        if ($request) {
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something wrong');
        }
    }
    public function loginuser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:5|max:12'

        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('chat');
        } else {
            return back()->with('fail', 'This email is not registered');
        }
    }
    public function chat()
    {
        return view('chat');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
