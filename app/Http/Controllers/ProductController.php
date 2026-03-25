<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // FRONTEND
    public function index()
    {
        $products = Product::latest()->take(12)->get();
        return view('frontend.home', compact('products'));
    }

    // ADMIN LIST
    public function adminIndex(Request $request)
    {
        $search = $request->search;

        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%");
        })->latest()->paginate(10);

        return view('admin.products.index', compact('products', 'search'));
    }

    // CREATE PAGE
    public function create()
    {
        return view('admin.products.create');
    }

    // STORE
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|in:men,women',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = null;
        if ($req->hasFile('image')) {
            $folder = 'products/' . $req->category; // men or women
            $imagePath = $req->file('image')->store($folder, 'public');
        }

        Product::create([
            'name' => $req->name,
            'description' => $req->description ?? 'No description',
            'price' => $req->price,
            'category' => $req->category,
            'image' => $imagePath,
        ]);

        return redirect('/admin/products')->with('success', 'Product added successfully!');
    }

    // EDIT
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // UPDATE
    public function update(Request $req, Product $product)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|in:men,women',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($req->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $folder = 'products/' . $req->category;
            
            // delete old image
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // store new
            $product->image = $req->file('image')->store($folder, 'public');
        }

        $product->update([
            'name' => $req->name,
            'description' => $req->description ?? 'No description',
            'price' => $req->price,
            'category' => $req->category,
        ]);

        return redirect('/admin/products')->with('success', 'Product updated successfully!');
    }

    // DELETE
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return back()->with('success', 'Product deleted successfully!');
    }
}