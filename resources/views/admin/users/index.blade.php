@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        @include('inc.message')
        <div class="card">
            <div class="header">
                <h4 class="title">Users</h4>
                <p class="category">List of all registered users</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    {{-- {{dd($user->products)}} --}}
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td> 
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        
                        <td>
                            @if ($user->status)
                            <span class="label label-danger">Block</label></td>
                            @else
                            <span class="label label-warning">Active</label></td>
                            @endif
                           
                        <td>
                            @if ($user->status)
                                {{link_to_route('user.unblock', '', $user->id, ['class'=>'btn btn-sm btn-success ti-close', 'title'=>'Unblock User'])}}
                            @else
                                 {{link_to_route('user.block', '', $user->id, ['class'=>'btn btn-sm btn-danger ti-close', 'title'=>'Block User'])}}  
                            @endif
                        </td>  
                        <td>
                                {{link_to_route('user.details', '', $user->id, ['class'=>'btn btn-sm btn-primary ti-view-list-alt', 'title'=>'Details'])}}
                        </td>
                            
                        
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection