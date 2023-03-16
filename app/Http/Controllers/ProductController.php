<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


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
    $products = Product::whereHas('category', function($query) {$query->where('name', 'homme');})->simplePaginate(6);
    return view('products.index', ['products' => $products]);
}

public function femme()
{
    $products = Product::whereHas('category', function($query) {
        $query->where('name', 'femme');
    })->simplePaginate(6);
    return view('products.index', ['products' => $products]);
}

public function solde()
{
    $products = Product::whereHas('category', function($query) {
        $query->where('name', 'solde');
    })->simplePaginate(6);
    return view('products.index', ['products' => $products]);
}

public function dashboard()
    {
        if (Auth::check()) {
            $products = Product::with('category')->get();
            $categories = Category::all();
            return view('admin.products', compact('products', 'categories'));
        }
        return redirect('/admin/login');
    }
public function create()
    {
        $categories = Category::all(); // On récupère les categories présentes
        return view('admin.products.create', compact('categories'));
    }


    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'status' => 'required',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

    return redirect('/admin/categories')->with('success', 'Le produit a été ajoutée avec succès !');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
{
    // Récupération du produit à modifier
    $product = Product::findOrFail($id);

    // Validation des données de la requête
    $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'état' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    // Modification du produit avec les données validées
    $product->name = $validatedData['name'];
    $product->description = $validatedData['description'];
    $product->price = $validatedData['price'];
    $product->category_id = $validatedData['category_id'];
    $product->état = $validatedData['état'];

    // Gestion de l'image si elle a été modifiée
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '_' . $image->getClientOriginalName();
        Storage::putFileAs('public/images/products', $image, $filename);
        $product->image = $filename;
    }

    // Enregistrement des modifications
    $product->save();

    // Redirection vers la liste des produits avec un message de succès
    return redirect('/admin/products')->with('success', 'Le produit a été modifiée avec succès!');
}


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/products')->with('success', 'Le produit a été supprimée avec succès!');
    }

}


