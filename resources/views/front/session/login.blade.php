@extends('front.layouts.master')

@section('content')
    
  <!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-12" id="register">

            <div class="text-left card col-md-8 offset-md-2">
                <div class="card-body">
                    @if (count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>{{$error}}</strong>
                            </div>
                        @endforeach
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif 

                    <h2 class="card-title">Login</h2>
                    <hr>
                    <form action="/user/login" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" placeholder="Email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="passowrd"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Login</button>
                        </div>

                    </form>

                </div>
            </div>


        </div>

    </div>

</div>



@endsection

