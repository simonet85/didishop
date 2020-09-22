@extends('front.layouts.master')

@section('content')

<!-- Page Content -->
<div class="container">
    <div class="text-left row">
        <div class="col-md-12" id="register">
           
            <div class="card col-md-8 offset-md-2">
                @if ( $errors->any() )

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    <h2 class="card-title">Sign Up</h2>
                    <hr>

                    <form action="/user/register" method="post">

                        @csrf
    
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password:</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" placeholder="Address" value="{{ old('address') }}" class="form-control"></textarea>
                        </div>
    
                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Sign Up</button>
                        </div>
    
                    </form>

                </div>
            </div>

        </div>

    </div>

</div>
    
@endsection
