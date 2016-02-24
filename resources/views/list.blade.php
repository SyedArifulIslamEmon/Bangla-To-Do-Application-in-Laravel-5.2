@extends('master')
@section('contain')
 @if(Session::has('success'))
 <div class="alert alert-success">
     <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>{{Session::get('success')}}</strong>
 </div>
 @endif
 
 @if(count($done)>0)
 <div class="col-md-5">
    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>সম্পন্ন হয়েছে</th>
                <th>সম্পন্ন করেছেন</th>
                <th>প্রক্রিয়া</th>
            </tr>
        </thead>
        <tbody>
            @foreach($done as $d)
            <tr>
                <td>{{$d->name}}</td>
                <td>{{$d->finished_by}}</td>
                <td>
                    @if($name==$d->finished_by || $name==$d->added_by)
                    <form action="/todo/status/{{$d->id}}" method="POST" style="display: inline">
                            {!!csrf_field()!!}
                        <button type="submit" class="btn btn-warning" style="display: inline">সম্পন্ন হয়নি</button>
                    </form>
                     
                    <form action="/todo/{{$d->id}}" method="POST" style="display: inline">
                            {!!csrf_field()!!}
                            {!!method_field('delete')!!}
                        <button type="submit" class="btn btn-danger" style="display: inline">ফেলে দিন</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif 
   
 
 @if(count($not_done)>0)
<div class="col-md-7">
    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>বাকি আছে</th>
                <th>কাজটি দিয়েছেন</th>
                <th>প্রক্রিয়া</th>
            </tr>
        </thead>
        <tbody>
            @foreach($not_done as $n_d)
            <tr>
                <td> {{$n_d->name}}</td>
                <td> {{$n_d->added_by}}</td>
                <td>
                    @if($name==$n_d->added_by)    
                    <a href="/todo/{{$n_d->id}}/edit" class="btn btn-info" role='button'>সংশোধন করুন</a>
                    <br><br>
                    @endif
                    
                    <form action="/todo/status/{{$n_d->id}}" method="POST" style="display: inline">
                            {!!csrf_field()!!}
                            <button type="submit" class="btn btn-success" style="display: inline">সম্পন্ন</button>
                    </form>
                    @if($name==$n_d->added_by) 
                    <form action="/todo/{{$n_d->id}}" method="POST" style="display: inline">
                            {!!csrf_field()!!}
                            {!!method_field('delete')!!}
                            <button type="submit" class="btn btn-danger" style="display: inline">ফেলে দিন</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
 @endif

 <div class="col-xs-12"><hr></div>
 <div class="col-md-6 col-md-offset-4">
        <form role="form" method="POST" action="{{url('todo')}}" class="form-inline">
          {!!csrf_field()!!}
         <div class="form-group">
           <label for="name">কাজটির নাম:</label>
           <input type="text" class="form-control" name="name" value="{{old('name')}}"  >
         </div>
         <button type="submit" class="btn btn-default">অন্তর্ভুক্ত করুন</button>
       </form>

 </div>
 <div class="col-xs-12"><hr></div>
@endsection


