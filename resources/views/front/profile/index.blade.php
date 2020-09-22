@extends('front.layouts.master')

@section('content')

    <h2>Profile</h2>
    <table class="table text-left table-striped ">
        <thead>
            <tr>
                <td colspan="2" >
                    User Details  
                    <a href="/edit" class="pull-right">
                    <i class="fa fa-cogs" aria-hidden="true"></i> Edit User</a> 
                </td>
            </tr>
        </thead>
 
        <tbody>
            <tr>
                <th>ID</th>
                <td >{{$user->id}}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td >{{$user->name}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td >{{$user->email}}</td>
            </tr>
       
            <tr>
                <th>Address</th>
                <td >{{$user->address}}</td>
            </tr>
      
            <tr>
                <th>Registered at</th>
                <td >{{$user->created_at->diffForHumans()}}</td>
            </tr>      
    
        </tbody>
    </table>

    
        <div class="header">
            <h4 class="title">Orders</h4>
        </div>
        <div class=" table-responsive table-full-width text-left">
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
                    <th ></th>
                </tr>
                </thead>
                <tbody>
                  
                    @foreach ($user->order as $order)
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
                         <span class="badge badge-success text-center">Confirmed</span>
                        
                       @else
                        <span class="badge badge-warning text-center">Pending</span>
                       
                       @endif
                    </td>
                        <td>
                            {{link_to_route('user.order','Details',$order->id, ['class'=>'btn btn-sm btn-outline-dark'])}}      
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    
  
@endsection

