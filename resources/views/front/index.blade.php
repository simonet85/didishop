@extends('front.layouts.master')

@section('content')

<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h5 class="display-3"><strong>Welcome,</strong></h5>
        <p class="display-4"><strong>SALE UPTO 50%</strong></p>
        <p class="display-4">&nbsp;</p>
        <a href="#" class="btn btn-warning btn-lg float-right">SHOP NOW!</a>
    </header>
    @include('inc.message')
    <!-- Page Features -->
    <div class="row text-center">
       
        @foreach ($products as $product)
            
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="{{url('assets/uploads').'/'.$product->productimage}}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$product->productname}}</h5>
                    <p class="card-text">
                        {{$product->productdescription}}
                    </p>
                </div>
                <div class="card-footer"> 
                    <strong>$ {{$product->productprice}}</strong> &nbsp;
                    <form action="{{route('cart')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}" >
                        <input type="hidden" name="productname" value="{{$product->productname}}">
                        <input type="hidden" name="productprice" value="{{$product->productprice}}">
                        <button type="submit" class="btn btn-primary btn-outline-dark">
                        <i class="fa fa-cart-plus "></i> Add To Cart</button>

                    </form>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    <!-- /.row -->

</div>
@endsection