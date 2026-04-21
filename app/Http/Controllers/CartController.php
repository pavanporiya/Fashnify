<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // VIEW CART
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // ADD TO CART (FIXED)
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        $qty = $request->quantity ?? 1;

        // 🚨 STOCK CHECK
        if ($product->stock < $qty) {
            return back()->with('error', 'Not enough stock available!');
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "quantity" => $qty
            ];
        }

        // 🔥 REDUCE STOCK
        $product->stock -= $qty;
        $product->save();

        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart!');
    }

    // REMOVE ITEM
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $product = Product::findOrFail($id);

            // 🔥 RESTORE STOCK
            $product->stock += $cart[$id]['quantity'];
            $product->save();

            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Item removed!');
    }
    // UPDATE QUANTITY (FIXED)
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $product = Product::findOrFail($id);

        if (isset($cart[$id])) {

            $oldQty = $cart[$id]['quantity'];
            $newQty = $request->quantity;

            // Difference
            $diff = $newQty - $oldQty;

            // 🚨 STOCK CHECK
            if ($diff > 0 && $product->stock < $diff) {
                return back()->with('error', 'Not enough stock available!');
            }

            // 🔥 UPDATE STOCK
            $product->stock -= $diff;
            $product->save();

            $cart[$id]['quantity'] = $newQty;
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Cart updated!');
    }
}