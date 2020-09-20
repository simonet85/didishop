@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        @include('inc.message')
        <div class="card">
            <div class="header">
                <h4 class="title">{{$orders[0]->user->name}}'s Order(s) Details.</h4>
                <p class="category">details of your order(s)</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>OrderID</th>
                        <th>Product Name</th>
                        <th>Address</th>
                        <th>Quantity</th>
                        <th> Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- {{dd($order)}} --}}
                    @foreach ($orders as $order)
                        
                    <tr class="text-center">
                        <td>{{$order->id}}</td>
                        <td>
                            {{$order->products[0]->productname}}
                            {{-- OU UTILISER @foreach ( $order->products as $product)
                              {{$product->productname}}
                            @endforeach --}}
                        </td> 
                        <td>{{$order->address}}</td>  
                        <td >{{$order->orderitems[0]->quantity}}</td> 
                        <td>{{$order->orderitems[0]->price}}</td> 
                        <td>{{$order->created_at->diffForHumans()}}</td> 
                        <td>
                            @if ($order->status)
                            <span class="label label-success">Confirmed</label></td>
                            @else
                            <span class="label label-warning">Pending</label></td>
                            @endif  
                        <td>
                           
                       
                        {{-- <td>
                                {{link_to_route('user.details', '', $user->id, ['class'=>'btn btn-sm btn-primary ti-view-list-alt', 'title'=>'Details'])}}
                        </td> --}}
                            
                        
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection