<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $cart = \Cart::name('default');

        return view('cart.index')
            ->with('cart', $cart);
    }

    public function put(Request $request): \Illuminate\Http\RedirectResponse
    {
        $productID = $request->integer('product_id');
        $product = Product::findOrFail($productID);
        $cart = \Cart::name('default');
        $cart->addItem([
            'id'       => $product->id,
            'title'    => $product->article,
            'quantity' => 1,
            'price'    => $product->price,
        ]);
        return response()->redirectTo('/cart');
    }

    public function remove(Request $request) {
        $id = $request->integer('product_id');
        $cart = \Cart::name('default');

        $cartItems = \Cart::getItems();

        // Ищем элемент корзины по id товара
        foreach ($cartItems as $cartItem) {
            if ($cartItem->getId() === $id) {
                if ($cartItem->getQuantity() == 1) {
                    $cart->removeItem($cartItem->getHash());
                } else {
                    $cart->updateItem($cartItem->getHash(), ['quantity' => $cartItem->getQuantity() - 1]);
                }
                break;
            }
        }

        return response()->redirectTo('/cart');
    }

    public function create() {
        $cart = \Cart::name('default');

        \DB::transaction(function () use ($cart) {
            $order = Order::create([
                'user_id' => auth()->user()->id,
            ]);

            foreach ($cart->getItems() as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->getId(),
                    'quantity' => $item->getQuantity()
                ]);
            }
        });

        return response()->redirectTo('/shop');
    }
}
