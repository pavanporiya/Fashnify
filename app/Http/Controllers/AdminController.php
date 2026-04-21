<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
class AdminController extends Controller
{
    public function users()
    {
        $users = \App\Models\User::all();
        return view('admin.users.index', compact('users'));
    }
    public function dashboard()
    {
        $productCount = Product::count();
        $userCount = User::count();
        $totalRevenue = Product::sum('price');

        return view('admin.dashboard', compact('productCount', 'userCount', 'totalRevenue'));
    }

    public function usersIndex(Request $request)
    {
        $search = $request->search;
        $users = User::where('role', '!=', 'admin')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->latest()->paginate(10);

        return view('admin.users.index', compact('users', 'search'));
    }

    public function userDestroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted successfully!');
    }
    public function ordersIndex()
    {
        $orders = Order::with('items.product', 'user')
            ->latest()
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Order status updated!');
    }
}
