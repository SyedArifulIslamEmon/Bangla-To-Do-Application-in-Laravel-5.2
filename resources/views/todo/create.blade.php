@extends('master')
@section('contain')
@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li> 
        @endforeach
    </ul>
</div>
@endif


 {{--
        This if-else condition is used for reusing code for create and update the task.There are better ways to do this.
 --}}
 
 @if($path=='todo/*/edit')
 <form role="form" method="POST" action="/todo/{{$edit->id}}">
     {!!method_field('put')!!}
 @else
 <form role="form" method="POST" action="{{url('todo')}}">
 @endif    
   
    {!!csrf_field()!!}
  <div class="form-group">
    <label for="name">কাজটির নাম:</label>
   
    @if($path=='todo/*/edit')
    <input type="text" class="form-control" name="name" value="{{$edit->name}}">
  </div>
    <button type="submit" class="btn btn-info">কাজটির তথ্য পরিবর্তন</button>
    
    @else
    <input type="text" class="form-control" name="name" value="{{old('name')}}">
   </div>
    <button type="submit" class="btn btn-default">অন্তর্ভুক্ত করুন</button>
    @endif
  
</form>

@endsection
