<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\user;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('user.login');
    }
    public function postLogin(Request $req)
    {
//        echo $req->email;
//        echo $req->password;
        if(Auth::attempt([
            'email' => $req->input('email'),
            'password' => $req->input('password'),
        ]))
        {
            return redirect('/todo')->with('success','স্বাগতম '.Auth::user()->name);
        }
        else
        {
           return redirect()->back()->with('message','ইমেইল বা পাসওয়ার্ড কি ভুলে গেছেন?');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
