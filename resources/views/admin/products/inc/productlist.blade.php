<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">All Products</h4>
                <p class="category">List of all stock</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Desc</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->productname}}</td>
                        <td>$ {{$product->productprice}}</td>
                        <td>{{$product->productdescription}}</td>
                        <td>
                        <img src="assets/uploads/{{$product->productimage}}" alt="{{$product->productname}}"
                            class="img-thumbnail img-responsive" style="width: 70px; height:50px;"
                        > 
                        </td>
                        <td>
                            {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}

                            
                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'onclick'=>'return confirm("Are you sure , you want to delete this file ?")'] )  }}

                            {{link_to_route('products.edit','', $product->id, ['class'=>'btn btn-sm btn-info ti-pencil-alt'])}}
                            
                            {{link_to_route('products.show','', $product->id, ['class'=>'btn btn-sm btn-primary ti-view-list-alt'])}}
                            

                            {!! Form::close() !!}
                            {{-- <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                            <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                            <button class="btn btn-sm btn-primary ti-view-list-alt"
                            title="Details"></button> --}}
                        </td>
                    </tr>
                        @endforeach
                
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>