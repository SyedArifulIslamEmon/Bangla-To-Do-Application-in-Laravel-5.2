<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\ToDo;
use Auth;
class ToDoController extends Controller
{
    
    public function __construct() 
    {
       $this->middleware('auth') ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=new ToDo();
        $not_done=$all->where('status','=','Not Done')->get();
        $done=$all->where('status','=','Done')->get();
        return view('list')->with('not_done',$not_done)->with('done',$done)->with('name',Auth::user()->name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create')->with('path','todo/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['name' =>'required'];
        $valid=Validator::make($request->all(),$rules);
        if($valid->passes())
        {
            $todo=new ToDo();
            $todo->name=$request->name;
            $todo->added_by=Auth::user()->name;
            $todo->status='Not Done';
            if($todo->save())
            {
                return redirect('/');
            }
            return redirect('/todo/create')->with('success','নতুন কাজ অন্তর্ভুক্ত হয়েছে');
        }
        else
        {
            return redirect('/todo/create')->withInput()->withErrors($valid);
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
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=ToDo::findorfail($id);
        if($edit->added_by==Auth::user()->name)
        return view('todo.create')->with('edit',$edit)->with('path','todo/*/edit');
        return redirect('/');
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
        $up=new ToDo();
        $up->where('id','=',$id)->update(['name' =>$request->name]);
        return redirect('/todo')->with('success','তথ্য পরিবর্তিত হয়েছে');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=new ToDo();
        $del->where('id',$id)->delete();
        return redirect('/todo')->with('success','কাজটি মুছে ফেলা হয়েছে');
    }
    /*
     * To chage Status from not completed to complete.
     */
    public function Changestatus($id)
    {
        $type= ToDo::findorfail($id);
        if($type->status=='Not Done')
        {
            $type->where('id',$id)->update(['status'=>'Done','finished_by'=>Auth::user()->name]);
        }
        else {
          $type->where('id',$id)->update(['status'=>'Not Done','finished_by'=>Null]);  
        }
        return redirect('/todo')->with('success','তথ্য সফলভাবে পরিবর্তিত হয়েছে');
    }
}
