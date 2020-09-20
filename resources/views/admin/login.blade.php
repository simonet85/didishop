<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <!-- Custom styles for this template -->
    {{ Html::style('assets/css/heroic-features.css')}}

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">DidiShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> Cart <strong>(23)</strong>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                        <a class="dropdown-item " href="">Sign In</a>
                        <a class="dropdown-item" href="">Sign Up</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-12" id="register">

            <div class="card col-md-8 offset-md-2">
                <div class="card-body">
                @include('inc.message')
                    <h2 class="card-title">Login</h2>
                    <hr>
                   
                    {!! Form::open(['method' => 'POST', 'route' => 'admin.login']) !!}
                  
                    @csrf

                    <div class="form-group{{ $errors->has('email') ? 'is-valid' : '' }}">
                    {!! Form::label('email', 'Email :') !!}
                    {!! Form::text('email', null, ['class' => 'form-control' ]) !!}
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? 'is-valid' : '' }}">
                    {!! Form::label('password', 'Password :') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>

                    <div class="form-group">
                            {{-- <button class="btn btn-outline-info col-md-2"> Login</button> --}}
                        {!! Form::submit('Add', ['class' => 'btn btn-outline-info col-md-2']) !!}
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>


        </div>

    </div>

</div>
<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
