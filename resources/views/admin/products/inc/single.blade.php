<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-md-10">
            @include('inc.message')
            <div class="card">
                <div class="header">
                    <h4 class="title">Update Product</h4>
                </div>
               
                <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open([ 'action' => ['ProductsController@update', $product->id], 'enctype'=>'multipart/form-data', 'method'=>'POST']) !!}
                                 @csrf
                                <div class="form-group{{ $errors->has('productname') ? ' has-error' : '' }}">
                                    {!! Form::label('product name', 'Product Name:') !!}
                                    {!! Form::text('productname', $product->productname, ['class' => 'form-control border-input', 'placeholder'=>'Macbook pro']) !!}
                                    <small class="text-danger">{{ $errors->first('productname') }}</small>
                                </div>

                                <div class="form-group{{ $errors->has('productprice') ? ' has-error' : '' }}">
                                    {!! Form::label('productprice', 'Product Price:') !!}
                                    {!! Form::text('productprice', $product->productprice, ['class' => 'form-control border-input', 'placeholder'=>'2500$']) !!}
                                    <small class="text-danger">{{ $errors->first('productprice') }}</small>
                                </div>

                                <div class="form-group{{ $errors->has('productdescription') ? 'has-error' : ''}}">
                                    {!! Form::label('productdescription', 'Product Description:') !!}
                                    {!! Form::textarea('productdescription',$product->productdescription, ['class' => 'form-control border-input','rows'=>10, 'cols'=>30, 'placeholder'=>'Product Description']) !!}
                                    <small class="text-danger">{{ $errors->first('productdescription') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('productimage') ? ' has-error' : '' }}">
                                    {!! Form::label('productimage', 'Product Image') !!}
                                    {!! Form::file('productimage', ['class'=>'form-control border-input', 'id'=>'productimage','require'=>'required']) !!}
                                    <div id="thumb-output"></div>
                                    <small class="text-danger">{{ $errors->first('productimage') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            {!! Form::submit('Update Product', ['class' => 'btn btn-info btn-fill btn-wd']) !!}
                        </div>
                        <div class="clearfix"></div>
                        {{ Form::hidden('_method', 'PUT') }}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>