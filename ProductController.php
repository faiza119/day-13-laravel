<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show form to create a new product
    public function create()
    {
        return view('products.create');
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'description' => 'nullable|string|max:255'
        ]);

        Product::create($request->all());

        return redirect('/products')->with('success', '🎉 Product added successfully!');
    }
public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'description' => 'nullable|string|max:255'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect('/products')->with('success', '✅ Product updated successfully!');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', '🗑️ Product deleted successfully!');
    }
}
