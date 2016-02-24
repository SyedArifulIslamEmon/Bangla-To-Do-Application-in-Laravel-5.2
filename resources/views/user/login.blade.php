@extends('master')
@section('contain')
@if(Session::has('message'))
<div class="alert alert-danger">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{Session::get('message')}}
</div>
@endif
<form role="form" action='/auth/login' method='POST'>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label for="email">ইমেইলঃ</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">পাসওয়ার্ডঃ</label>
    <input type="password" class="form-control" name='password'>
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> মনে রাখুন</label>
  </div>
  <button type="submit" class="btn btn-default">নিবেদন করুন(সাবমিট)</button>
</form>
@endsection