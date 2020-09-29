<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    
    {{Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css')}}
    
    {{Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}
    
    {{Html::style('assets/css/heroic-features.css')}}

    @yield('style')

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">DidiShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @if (Cart::instance('default')->count() > 0)
                        <a class="nav-link" href="/cart">
                            <i class="fa fa-shopping-cart"></i> Cart
                             <strong>
                                {{Cart::instance('default')->count()}}
                            </strong>
                        </a>
                    @else
                    <a class="nav-link" href="/cart">
                        <i class="fa fa-shopping-cart"></i> Cart
                         <strong>
                           (0)
                        </strong>
                    </a>
                    @endif
                   
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> {{ auth()->check() ? auth()->user()->name : 'Account'}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                        @if(! auth()->check())
                            <a class="dropdown-item " href="{{url('/user/login')}}">Sign In</a>
                            <a class="dropdown-item"  href="{{url('/user/register')}}">Sign Up</a>
                        @else
                            <a class="dropdown-item" href="{{url('/user/logout')}}">Log Out</a>
                        @endif
                       
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    

    <!-- Page Features -->
    <div class="row text-center">
       @yield('content')
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<!-- Bootstrap core JavaScript -->
{{Html::script('https://code.jquery.com/jquery-3.2.1.slim.min.js')}}
{{Html::script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js')}}
{{Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}
@yield('script')
</body>

</html>
