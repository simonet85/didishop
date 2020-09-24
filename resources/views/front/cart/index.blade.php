@extends('front.layouts.master')

@section('content')

<!-- Page Content -->
<div class="container text-left">

    <h2 class="mt-3"><i class="fa fa-shopping-cart"></i> Shooping Cart</h2>
    <hr>

    @include('inc.message')

    <h4 class="mt-3">  {{Cart::instance('default')->count()}} items(s) in Shopping Cart</h4>

    <div class="cart-items">
        
        <div class="row">
            
            @if (Cart::instance('default')->count() > 0)
            <div class="col-md-12">
                
                <table class="table">
                    
                    <tbody>

                        @foreach (Cart::instance()->content() as $item)
                        <tr>
                        <td><img src="{{url('/assets/uploads').'/'.$item->model->productimage}}" style="width: 5em"></td>
                            <td>
                                <strong>{{$item->model->productname}}</strong><br>{{$item->model->productdescription}}
                            </td>
                            
                            <td>
                                <form action="{{route('remove.product', $item->rowId)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-link btn-link-dark">Remove</button><br>
                                    
                                </form>

                                <form action="{{route('saveforlater', $item->rowId)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link btn-link-dark">Save for later</button><br>
                                </form>


                            </td>
                            
                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>
                            
                            <td>$ {{$item->priceTotal()}}</td>
                        </tr>
                          
                      @endforeach

                    </tbody>

                </table>

            </div>   
            <!-- Price Details -->
                <div class="col-md-6">
                        <div class="sub-total">
                             <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2">Price Details</th>
                                    </tr>
                                </thead>
                                    <tr>
                                        <td>Subtotal </td>
                                        <td>$ {{Cart::subtotal()}} </td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>$ 0.00</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th>$ {{Cart::initial()}}</th>
                                    </tr>
                             </table>           
                         </div>
                    </div>

                <!-- Save for later  -->
                <div class="col-md-12">
                    <a href="/" class="btn btn-outline-dark">Continue Shopping</a>
                    <a href="/checkout" class="btn btn-outline-info">Proceed to checkout</a>
                <hr>

                </div>
            @else
                <div class="col-md-12 mt-4 mb-4">
                    <h4> Your cart is empty  <a href="/" class="btn btn-outline-dark">Go to Shop</a></h4> 
                </div>
            @endif

            @if (Cart::instance('saveforlater')->count() > 0)
                    
                <div class="col-md-12">
                
                <h4>{{Cart::instance('saveforlater')->count()}} item(s) Save for Later</h4>
                <table class="table">
                    
                    <tbody>
                        @foreach(Cart::instance('saveforlater')->content() as $item)
                        <tr>
                            <td><img src="{{url('/assets/uploads').'/'.$item->model->productimage}}" style="width: 5em"></td>
                            <td>
                                <strong>{{$item->model->productname}}</strong><br> {{$item->model->productdescription}}
                            </td>
                            
                            <td>
        
                                <form action="{{ route('saveLater.destroy', $item->rowId) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-link btn-link-dark">Remove</button>
                                </form>

                                <form action="{{ route('moveToCart', $item->rowId) }}" method="post">

                                    @csrf

                                    <button type="submit" class="btn btn-link btn-link-dark">Move to cart
                                    </button>

                                </form>
                            </td>
                            
                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>
                            
                            <td>$ {{$item->model->productprice}}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>  
            @endif
        </div>


        </div>
        </div>
<!-- /.container -->
@endsection