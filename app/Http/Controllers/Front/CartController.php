<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.cart.index');
    }

     /**
     * Save for later .
     *
     * @return \Illuminate\Http\Response
     */
    public function saveforlater($id)
    {
        $item = Cart::get($id);
        $removeId = Cart::remove($id);

        $dubl = Cart::instance('saveforlater')->search( function($cartItem, $rowId) use ($id) {
            return $rowId === $id; 
        });

        // $cart->search(function ($cartItem, $rowId) {
        //     return $cartItem->id === 1;
        // });

        // dd($dubl);
        if ($dubl->isNotEmpty()) {
            
            return  redirect()->back()->with('danger','Item is already in wishlist');
        }
    
        $cartItem = Cart::instance('saveforlater')->add($item->id, $item->model->productname, 1, $item->model->productprice)->associate('App\Product');
   
        return redirect()->back()->with('success', 'Product added to your Wishlist');
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dubl = Cart::search( function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id; 
        });

        

        if ($dubl->isNotEmpty()) {
            return  redirect()->back()->with('danger','Item is already in cart');
        }

        Cart::add($request->id, $request->productname, 1, $request->productprice)->associate('App\Product');
        return redirect()->back()->with('success', 'Product added to your cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = Validator::make($request->all(),[
            "quantity"=>"required | numeric | between: 1,6"
        ]);
        Cart::update($id, $request->quantity);
        session()->flash('success', 'Cart Update successfully');
        return  response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('success', 'Item successfully removed from your cart');
    }
}
