@extends('admin.layouts.master')

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Product Detail</h4>
                <p class="category">List of all stock</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                   
                    <tbody>

                        <tr>
                            <th>ID</th>
                        <td>{{$product->id}}</td>
                        </tr>

                        <tr>
                            <th>Name</th>
                            <td>{{$product->productname}}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td>{{$product->productdescription}}</td>
                        </tr>

                        <tr>
                            <th>Price</th>
                            <td>$ {{$product->productprice}}</td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{$product->created_at->diffForHumans()}}</td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td>{{$product->updated_at->diffForHumans()}}</td>
                        </tr>

                        <tr>
                            <th>Image</th>
                        <td><img src="{{url('assets/uploads').'/'.$product->productimage}}" alt="{{$product->productname}}" class="img-thumbnail" style="width: 150px;"></td>
                        </tr>

                    </tbody>
                    
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
