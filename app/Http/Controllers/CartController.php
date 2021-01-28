<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function add(Request $request){
        $product = Product::find($request->product_id);
        Cart::add($product->id, $product->translate()->name, $product->price, 1, array('image' => $product->image, 'sku' => $product->sku));
        if($request->ajax()){
            return "True request!";
/*            $cart_products = Cart::getContent()->sortByDesc('id');
            return response()->view('cart.dropCart', compact('cart_products'));*/
        }
    }
}
