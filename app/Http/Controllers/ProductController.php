<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Make sure to import your Product model

class ProductController extends Controller
{
    public function index()
    {
        // Logic to retrieve all products
        $products = Product::all();


        // Pass the products to the 'products.index' view, which uses the 'ProductTable' component
        return view('products.index', ['products' => $products]);
    }



    public function create()
    {
        // Show the form to create a new product
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validation logic
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        // Create a new product
        $product = Product::create($data);

        // Redirect to the product details page
        return redirect()->route('products.index');
    }


    public function edit($id)
    {
        // Retrieve the product by ID and show the edit form
        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        // Validation logic can be added here if needed
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            // Add other fields as needed
        ]);

        // Update the product
        $product = Product::find($id);
        $product->update($data);

        // Redirect to the product details page
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        // Delete the product by ID
        Product::destroy($id);

        // Redirect to the product index page
        return redirect()->route('products.index');
    }
}
