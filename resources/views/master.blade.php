<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bangla To-Do App</title>
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <a href="/" class="navbar-brand">কার্যতালিকা</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                    <li><a href="#">{{Auth::user()->name}}</a></li>
                    <li><a href="/auth/logout">লগ-আউট (প্রস্থান)</a></li>
                    @else
                    <li><a href="/user/create">রেজিস্টার(নিবন্ধন)</a></li>
                    <li><a href="/auth/login">লগ-ইন</a></li>
                    @endif
                </ul>
            </div>        
        </div>
    </nav>
    
    <div class="container">
        @yield('contain')
        
    </div>
</body>
</html>



