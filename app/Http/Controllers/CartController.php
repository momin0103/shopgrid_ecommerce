<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product;
    private $cart;
    private $cartItems;

    public function index(Request $request, $id)
    {
        $this->product = Product::find($id);
        Cart::add([
            'id'            => $this->product->id,
            'name'          => $this->product->name,
            'quantity'      => $request->qty,
            'price'         => $this->product->selling_price,
            'attributes'    => ['image' => $this->product->image]
        ]);

        return redirect('/show-cart');
    }

    public function show()
    {
        $this->cartItems = Cart::getContent();
        return view('front.cart.add', ['items' => $this->cartItems]);
    }

    public function delete($id)
    {
        Cart::remove($id);
        return redirect('/show-cart')->with('message', 'Cart product info delete successfully.');
    }

    public function update(Request $request, $id)
    {
        Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->qty
            ]
        ]);
        return redirect('/show-cart')->with('message', 'Cart product info update successfully.');
    }
}
