<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __invoke()
    {
        $cart = session()->get('cart');
        return view('cart', array('cart' => $cart));
    }

    public function addToCart(Product $product)
    {
        if (!$product->exists)
            return redirect('home');

        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [$product->id => $this->getProductArray($product)];
        } else if (!isset($cart[$product->id])) {
            $cart[$product->id] = $this->getProductArray($product);
        } else {
            $cart[$product->id]['quantity']++;
        }

        session()->put('cart', $cart);

        return redirect('carrinho');
    }

    private function getProductArray(Product $product)
    {
        return [
            "id"       => $product->id,
            "name"     => $product->name,
            "quantity" => 1,
            "price"    => $product->price,
            "photo"    => $product->image
        ];
    }

    public function removeFromCart(Product $product)
    {

        if (!$product->exists)
            return redirect('home');

        $cart = session()->get('cart');
        if (!$cart)
            return redirect('home');


        if (isset($cart[$product->id]) && $cart[$product->id]['quantity'] > 0) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }
        return redirect('carrinho');
    }
}
