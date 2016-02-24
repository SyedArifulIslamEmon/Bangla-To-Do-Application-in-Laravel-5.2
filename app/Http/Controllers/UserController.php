<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Auth;

class UserController extends Controller
{
    /**
     * Implementing Guest Web in create, as we do not need to register because right now we are logged 
     * with our previously registered account.
     */
    public function __construct() 
    {
       $this->middleware('auth', ['only' => ['edit', 'update'] ]) ;
       $this->middleware('guest', ['only' => ['create'] ]) ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
      return redirect()->intended('/');
    }
    public function check()
    {
        if(Auth::check())
        {
           return redirect('/todo'); 
        }
        else
        {
            return redirect('/auth/login');
        }
    }
    
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //echo $request->email;  
        $rules=[ 'name' => 'required|unique:users', 'email'=> "required|email|unique:users", 'password' => 'required', 
            'password_confirm' => 'required|same:password',];
        $message=[
            '*.required'=>'তথ্য দেওয়া হয়নি।',
            '*.same' =>'পাসওয়ার্ড মিলছে না।',
            '*.unique' =>'আগেই ব্যবহার করা হয়েছে।',
            'email.email' => 'ইমেইলটি সঠিক নয়',
        ];
        $valid=Validator::make($request->all(),$rules,$message);
        if($valid->passes())
        {
           // return "Succesful";
            $usr=new User();
            $usr->name=$request->name;
            $usr->email=$request->email;
            $usr->password=bcrypt($request->password);
            if($usr->save())
            {
                Auth::loginUsingId($usr->id);
            }
            return redirect()->intended('/todo')->with('success','স্বাগতম '.Auth::user()->name);
        }
        else
        {
            //return "Unsuccesful";
            return redirect('user/create')->withInput()->withErrors($valid);
            //redirect()->back()->withInput()->withErrors($valid);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/todo'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return redirect('/todo'); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect('/todo'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('/todo'); 
    }
}
