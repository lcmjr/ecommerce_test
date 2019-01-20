<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function validateCart()
    {
        $cart = session()->get('cart');
        if (!$cart)
            return redirect('home');
        return $cart;
    }

    public function __invoke()
    {
        $cart = $this->validateCart();
        return view('order', ['cart' => $cart]);
    }

    public function registeringOrder(OrderRequest $orderRequest)
    {
        $cart = $this->validateCart();
        $order = new Order();
        $order->fill($orderRequest->all());
        $order->save();
        foreach ($cart as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $cartItem['id'];
            $orderItem->quantity = $cartItem['quantity'];
            $orderItem->sale_price = $cartItem['price'];
            $orderItem->total_price = $cartItem['price'] * $cartItem['quantity'];
            $order->orderItems()->save($orderItem);
        }
        session()->flash('cart');
        return view('orderSucced', ['order' => $order]);
    }

    public function showOrders()
    {
        $orders = Order::all();
        return view('orders', ['orders' => $orders]);
    }

    public function showOrder(Order $order)
    {
        if(!$order->exists)
            return redirect('home');

        return view('orderDetail', ['order' => $order]);
    }
}
