@extends('admin.layouts.master')
@section('content')
<div class="col-md-12">
    @include('inc.message')
    <div class="card">
        <div class="header">
            <h4 class="title">Orders</h4>
            <p class="category">List of all orders</p>
        </div>
        <div class="content table-responsive table-full-width text-left">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th >Actions</th>
                </tr>
                </thead>
                <tbody>
                  
                    @foreach ($orders as $order)
                <tr>
                    
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>
                        @foreach($order->products as $item)
                            {{$item->productname}}
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach($order->orderitems as $item)
                            {{$item->quantity}}
                        @endforeach
                    </td>
                    <td>{{$order->address}}</td>
                    <td>
                       @if ($order->status)
                         <span class="label label-success text-center">Confirmed</span>
                        
                       @else
                        <span class="label label-warning text-center">Pending</span>
                       
                       @endif
                    </td>
                    
                    <td >
                        @if (!$order->status)
                            {{link_to_route('order.confirmed','Confirm',$order->id, ['class'=>'btn btn-sm btn-success '])}}
                        @else
                            {{link_to_route('order.pending','Pending',$order->id, ['class'=>'btn btn-sm btn-warning'])}}
                        @endif   
                        <td>
                            {{link_to_route('orders.show','Details',$order->id, ['class'=>'btn btn-sm btn-primary'])}}      
                        </td>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection