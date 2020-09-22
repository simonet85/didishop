@extends('front.layouts.master')

@section('content')
        <div class="row">
                <div class="header mt-4">
                    <h4 class="title">Order Details</h4>
                </div>
                <div class="content table-responsive table-full-width table-bordered">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Status</th>
                         
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ $order->address }}</td>
                                <td>
                                    @if ($order->status)
                                        <span class="badge badge-success">Confirmed</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                               
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="header mt-4">
                        <h4 class="title text-left">User Details</h4>
                    </div>
                    <div class="content table-responsive table-full-width ">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <td>{{ $order->user->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $order->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $order->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Registered At</th>
                                <td>{{ $order->user->created_at->diffForHumans() }}</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
               
                
                <div class="col-md-6">
                <div class="header mt-4">
                    <h4 class="title text-left">Product Details</h4>
                </div>
                <div class="content table-responsive table-full-width ">
                    <table class="table table-striped mb-4 table-bordered">
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                        </tr>
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                @foreach ($order->products as $product)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $product->productname }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>

                            <td>
                                @foreach ($order->orderItems as $item)
                                    <table class="table">
                                        <tr>
                                            <td>$ {{ $item->price }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($order->orderItems as $item)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $item->quantity }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($order->products as $product)
                                    <table class="table">
                                    <tr>
                                        <td>
                                            <a href="{{ url('assets/uploads') . '/' . $product->productimage }}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ url('assets/uploads') . '/' . $product->productimage }}" alt="{{$product->productname}}" style="width: 50px" >
                                        </a>
                                        </td>
                                    </tr>
                                    </table>
                                @endforeach
                            </td>
                        </tr>

                    </table>
                    <div class="col-md-6">
            </div>
@endsection