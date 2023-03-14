<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

}
