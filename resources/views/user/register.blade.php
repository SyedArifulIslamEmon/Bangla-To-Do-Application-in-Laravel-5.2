@extends('master')
@section('contain')
@if(count($errors)>0)
<div class="alert alert-warning">
<!--    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li> 
        @endforeach
    </ul>-->
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ 'দয়া করে নিম্নে উল্লেখিত ভুলগুলো ঠিক করুন।' }}
</div>
@endif

<form role="form" method="POST" action="{{url('user')}}">
   <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label for="name">আপনার নামঃ</label>
    <input type="text" class="form-control" name="name" value="{{old('name')}}"  >
    <span class="alert-danger">
        @if($errors->has('name'))
           {{$errors->first('name')}}
        @endif
    </span>
  </div>
  <div class="form-group">
    <label for="email">ইমেইলঃ</label>
    <input type="email" class="form-control" name="email" value="{{old('email')}}">
    <span class="alert-danger">
        @if($errors->has('email'))
           {{$errors->first('email')}}
        @endif
    </span>
  </div>
  <div class="form-group">
    <label for="pwd">পাসওয়ার্ডঃ</label>
    <input type="password" class="form-control" name="password">
   <span class="alert-danger">
        @if($errors->has('name'))
           {{$errors->first('password')}}
        @endif
    </span>
  </div>
  <div class="form-group">
    <label for="pwd">পাসওয়ার্ড নিশ্চিত করুনঃ</label>
    <input type="password" class="form-control" name="password_confirm">
    <span class="alert-danger">
        @if($errors->has('password_confirm'))
           {{$errors->first('password_confirm')}}
        @endif
    </span>
  </div>
  <div class="checkbox">
    <label><input type="checkbox">মনে রাখুন</label>
  </div>
  <button type="submit" class="btn btn-default">আবেদন করুন(সাবমিট)</button>
</form>
@endsection