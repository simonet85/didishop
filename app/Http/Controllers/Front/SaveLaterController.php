<?php
namespace App\Http\Controllers\Front;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaveLaterController extends Controller
{
    public function destroy($id) {
    // dd($id);
        $item = Cart::get($id);
        Cart::instance('saveforlater')->remove($item);

        return redirect()->back()->with('success','Item has been removed save for later');

    }

    public function moveToCart($id) {

        $item = Cart::instance('saveforlater')->get($id);

        Cart::instance('saveforlater')->remove($id);

        $dubl = Cart::instance('saveforlater')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($dubl->isNotEmpty()) {
            return redirect()->back()->with('success','Item is save for later');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

        return redirect()->back()->with('success','Item has been moved to cart');


    }
}
