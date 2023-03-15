<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->simplePaginate(6);
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    public function homme()
{
    $products = Product::where('category', 'men')->simplePaginate(6);
    return view('products.index', ['products' => $products]);
}

public function femme()
{
    $products = Product::where('category', 'women')->simplePaginate(6);

    return view('products.index', ['products' => $products]);
}

public function solde()
{
    $products = Product::where('category', 'sale')->simplePaginate(6);

    return view('products.index', ['products' => $products]);
}

public function create()
    {
        $categories = Category::all(); // On récupère les categories présentes
        return view('admin.products.create', compact('categories'));
    }


    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:255',
        'description' => 'required',
        'price' => 'required',
        'category' => 'required',
        'image' => 'image',
    ]);

    $product = new Product();
    $product->name = $validatedData['name'];
    $product->description = $validatedData['description'];
    $product->price = $validatedData['price'];
    $product->category = $validatedData['category'];
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('');
        $product->image = $imagePath;
    }
    $product->save();

    return redirect('/admin/products')->with('success', 'Le produit a été ajoutée avec succès !');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('');
            $product->image = $imagePath;
        }
        $product->save();
        return redirect('/admin/products')->with('success', 'Le produit a été modifiée avec succès!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/products')->with('success', 'Le produit a été supprimée avec succès!');
    }

}
