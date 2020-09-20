<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
       return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request,[
            'productname'=>'required',
            'productprice'=>'required|numeric',
            'productdescription'=>'required',
            'productimage'=>'image|required'
        ]);
        //Uploading Image
        $productimage = $request->productimage;
        $new_productimage = $productimage->getClientOriginalName();
        $productimage->move('assets/uploads', $new_productimage);
        //Saving data
        $products = Product::create([
            'productname'=>$request->productname,
            'productprice'=>$request->productprice,
            'productdescription'=>$request->productdescription,
            'productimage'=>$request->productimage->getClientOriginalName()
        ]);
        //Display flash Message
        Session::flash('success', 'Product created successfully');
        // return back to products/create
        return redirect()->back();

    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.details')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Find the user id
        $product = Product::find($id);
        
        //Validate the input fields
        $this->validate($request,[
            'productname'=>'required',
            'productprice'=>'numeric|required',
            'productdescription'=>'required',
            // 'productimage'=>'image|required'
        ]) ;
        //Check if there is any image
        if ($request->hasFile('productimage')) {
            //Check if old image exists 
            if (file_exists(public_path('assets/uploads/').$product->productimage)) {
                //delete the image stores in assets/uploads 
                unlink(public_path('assets/uploads/').$product->productimage);
            }
            //Upload the new image  
            $productimage = $request->productimage;
            $productimage->move('assets/uploads', $productimage->getClientOriginalName());
            $product->productimage = $request->productimage->getClientOriginalName();
        }
        
        //Update fields
        $product->update([
            'productname' => $request->productname,
            'productprice' => $request->productprice,
            'productdescription' => $request->productdescription,
            'productimage'=>$request->productimage->getClientOriginalName(),
        ]);

        //Store message in session
        Session::flash('success','Product updated successfully.');
        //return
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        Session::flash('success', 'Product deleted successfully!');
        return redirect('admin/products');
    }
}
