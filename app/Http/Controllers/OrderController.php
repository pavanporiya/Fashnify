<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // SHOW CHECKOUT PAGE
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty!');
        }

        return view('checkout.index', compact('cart'));
    }

    // PLACE ORDER
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Cart is empty!');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // CREATE ORDER
        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total,
            'status' => $request->input('payment_method') === 'online' ? 'pending_payment' : 'pending',
            'payment_method' => $request->input('payment_method'),
            'estimated_delivery' => now()->addDays(3)
        ]);

        // SAVE ORDER ITEMS
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        // ✅ FIXED FLOW
        if ($request->input('payment_method') === 'online') {
            return redirect()->route('payment.page', ['order' => $order->id]);
        }

        // COD → clear cart immediately
        session()->forget('cart');

        return redirect('/')->with('success', 'Order placed successfully!');
    }

    // USER ORDERS
    public function myOrders()
    {
        $orders = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    // PAYMENT PAGE
    public function paymentPage($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('payment.index', compact('order'));
    }

    // PAYMENT SUCCESS
    public function paymentSuccess($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $order->status = 'confirmed';
        $order->save();

        // ✅ clear cart AFTER payment success
        session()->forget('cart');

        return redirect('/')->with('success', 'Payment successful! Order confirmed.');
    }
}