<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {

        $products = Product::orderBy('created_at', 'desc')->where('published', 'published')->Paginate(6);
        $counter = Product::orderBy('created_at', 'desc')->where('published', 'published');
        return view('products.index', compact('products','counter'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    public function homme()
{
    $counter = Product::orderBy('created_at', 'desc')->whereHas('category', function($query) {$query->where('name', 'homme');})->where('published', 'published');
    $products = Product::orderBy('created_at', 'desc')->whereHas('category', function($query) {$query->where('name', 'homme');})->where('published', 'published')->simplePaginate(6);
    return view('products.index', compact('products','counter'));
}

public function femme()
{
    $counter = $products = Product::orderBy('created_at', 'desc')->whereHas('category', function($query) {
        $query->where('name', 'femme');
    })->where('published', 'published');
    $products = Product::orderBy('created_at', 'desc')->whereHas('category', function($query) {
        $query->where('name', 'femme');
    })->where('published', 'published')->simplePaginate(6);
    return view('products.index', compact('products','counter'));
}

public function solde()
{
    $counter = $products = Product::orderBy('created_at', 'desc')->where('status', 'on_sale')->where('published', 'published');
    $products = Product::orderBy('created_at', 'desc')->where('status', 'on_sale')->where('published', 'published')->simplePaginate(6);
    return view('products.index', compact('products','counter'));
}

public function dashboard()
    {
        if (Auth::check()) {
            $products = Product::with('category')->whereHas('category')->paginate(15);
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
            'reference' => 'required',
            'published' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $imagePath = $request->file('image')->move('images/products', $imageName);
            $validatedData['image'] = $imagePath;
        }

        $product = Product::create($validatedData);

    return redirect('/admin/products')->with('success', 'Le produit a été ajoutée avec succès !');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
{
    // Récupération du produit à modifier
   // $product = Product::findOrFail($id);

    // Validation des données de la requête
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'status' => 'required|in:standard,on_sale',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    // Modification du produit avec les données validées
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->status = $request->input('status');
    $product->category_id = $request->input('category_id');

    // Gestion de l'image si elle a été modifiée
    if ($request->hasFile('image')) {
        $imageName = Str::random(12).'.'.$request->image->extension();
        $imagePath = $request->file('image')->move('images/products', $imageName);
        $product->image = $imagePath;
    }

    $product->save();

    // Enregistrement des modifications
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


