<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;



class ProductController extends Controller
{
    public function index()
    {
    // Récupérer le numéro de page à afficher à partir de l'URL
    $page = (int) request()->query('page', 1);

    // Récupération des produits publiés et triés par ordre décroissant et pagination des produits avec 6 produits par page
    $products = Product::orderBy('created_at', 'desc')->where('published', 'published')->paginate(6, ['*'], 'page', $page);

    // Récupération du nombre total de produits publiés
    $counter = Product::orderBy('created_at', 'desc')->where('published', 'published');

    // Vérifier si la page demandée est valide (Dans le cas où un client modifie l'url pour un numero de page non existant, alors on le renvoie vers la dernière page disponible)
    if ($page > $products->lastPage()) {
        return redirect()->route('products.index', ['page' => $products->lastPage()]);
    }

    // Passer les données du contrôleur à la vue avec Compact()
    return view('products.index', compact('products','counter'));
    }


    public function show($id)
    {
        //Récuperation d'un produit spécifique en fonction de l'ID passé en paramètre et affichage de la vue correspondante
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function homme()
    {

    $page = (int) request()->query('page', 1);
    $counter = Product::orderBy('created_at', 'desc')->whereHas('category', function($query) {$query->where('name', 'homme');})->where('published', 'published');

    // Récupération des produits publiés de la catégorie homme et triés par ordre décroissant et pagination des produits avec 6 produits par page
    $products = Product::orderBy('created_at', 'desc')->whereHas('category', function($query) {$query->where('name', 'homme');})->where('published', 'published')->paginate(6, ['*'], 'page', $page);;

    // Vérifier si la page demandée est valide
    if ($page > $products->lastPage()) {
        return redirect()->route('products.index', ['page' => $products->lastPage()]);
    }

    return view('products.index', compact('products','counter'));
    }

    public function femme()
    {
    $page = (int) request()->query('page', 1);
    $counter = $products = Product::orderBy('created_at', 'desc')->whereHas('category', function($query) {$query->where('name', 'femme');})->where('published', 'published');
    $products = Product::orderBy('created_at', 'desc')->whereHas('category', function($query) {$query->where('name', 'femme');})->where('published', 'published')->paginate(6, ['*'], 'page', $page);;

    if ($page > $products->lastPage()) {
        return redirect()->route('products.index', ['page' => $products->lastPage()]);
    }

    return view('products.index', compact('products','counter'));
    }

    public function solde()
    {

    $page = (int) request()->query('page', 1);
    $counter = $products = Product::orderBy('created_at', 'desc')->where('status', 'on_sale')->where('published', 'published');

    // Récupération des produits publiés en solde et triés par ordre décroissant et pagination des produits avec 6 produits par page
    $products = Product::orderBy('created_at', 'desc')->where('status', 'on_sale')->where('published', 'published')->paginate(6, ['*'], 'page', $page);;

    // Vérifier si la page demandée est valide
    if ($page > $products->lastPage()) {
        return redirect()->route('products.index', ['page' => $products->lastPage()]);
    }

    return view('products.index', compact('products','counter'));
    }



    public function dashboard()
    {
        if (Auth::check()) {
            // Si on est connecté alors on récupère tous les produits ayant une catégorie avec une pagination de 15 produits par pages
            $products = Product::with('category')->whereHas('category')->paginate(15); // L'intêret de garder que les produits avec une catégorie
                                                                                       // est de ne pas avoir d'erreur au cas où on supprime toutes
                                                                                       // les catégories
            return view('admin.products', compact('products'));
        }
        return redirect('/admin/login');
    }


    public function create()
    {
        // Récuperation de toutes les catégories
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }


    public function store(Request $request)
    {

        // Validation du formulaire à l'aide de la méthode validate() de Laravel, nécessaires et avec le bon format
        $validatedData = $request->validate([
            'name' => 'required', // Obligatoire
            'description' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
            'reference' => 'required',
            'published' => 'required',
            'category_id' => 'required|exists:categories,id', //La clé category_id est requise et doit exister dans la base de données
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Doit contenir un fichier image avec un type MIME:jpeg... autorisé
            'sizes' => 'required|array',
        ]);
        // La fonction implode() permet de transformer notre tableau en chaine de caractères.
        $sizes = implode(',', $validatedData['sizes']); // ex : ('séparateur',tableau)


        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Dans l'idée il aurait été préférable de faire un redimessionement d'image à chaque téléversement avec la bibliothèque GD et intervention //
        // Cependant comme je ne sais pas si celle-ci sera utilisable sur l'environnement de corretion/lecture, on affichera juste                  //
        // les images avec un max-width de 500px pour éviter aux grosses images de manger de l'espace.                                              //
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //
        // Voici tout de même le code utilsant le package intervention
        //    $imageName = Str::random(12).'.'.$request->image->extension();
        //    $image = Image::make($request->file('image'))->resize(500, 500, function ($constraint) {
        //    $constraint->aspectRatio();
        //    $constraint->upsize();
        //        })->encode($request->image->extension());
        //    Storage::put('public/images/products/'.$imageName, (string) $image);
        //    $validatedData['image'] = 'storage/images/products/'.$imageName;
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        // Par mesure de sécurité on nomme notre image par une suite de caractères aléatoires
        $imageName = Str::random(12).'.'.$request->image->extension();
        // Celle-ci sera enregistrée dans le répertoire 'public/images/products' à l'aide de la méthode move de laravel
        $imagePath = $request->file('image')->move('images/products', $imageName);
        $imagePath = str_replace('\\', '/', $imagePath);
        $validatedData['image'] = $imagePath;
        $validatedData['sizes'] = $sizes;

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

    // Validation des données de la requête
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'status' => 'required|in:standard,on_sale',
        'category_id' => 'required|exists:categories,id',
        'published' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'sizes' => 'required|array',
    ]);

    // Modification du produit avec les données validées
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->status = $request->input('status');
    $product->category_id = $request->input('category_id');
    $product->published = $request->input('published');
    $sizes = $request->input('sizes');
    $product->sizes = implode(',', $sizes);

    // Gestion de l'image si elle a été modifiée
    if ($request->hasFile('image')) {
        // Par mesure de sécurité on place une suite de caractere random
        $imageName = Str::random(12).'.'.$request->image->extension();
        $imagePath = $request->file('image')->move('images/products', $imageName);
        $imagePath = str_replace('\\', '/', $imagePath);
        $product->image = $imagePath;
    }

    // Enregistrement des modifications
    $product->save();


    // Redirection vers la liste des produits avec un message de succès
    return redirect('/admin/products')->with('success', 'Le produit a été modifiée avec succès!');
    }


    public function destroy($id)
    {
        // Récupération du produit à supprimer
        $product = Product::find($id);
        $product->delete();
        // Redirection vers la liste des produits avec un message de succès
        return redirect('/admin/products')->with('success', 'Le produit a été supprimée avec succès!');
    }

}


