<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Verification de connexion
        if (Auth::check()) {
            // Si on est connecté alors toutes les catégories sont récupérées et la vue correspondante s'affiche
            $categories = Category::all();
            return view('admin.categories', ['categories' => $categories]);
        }
        // Si nous ne sommes pas connecté, on est redirigé vers la page de connexion
        return redirect('/admin/login');
    }

    public function create()
    {
        // Affiche la vue pour créer une nouvelle catégorie
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
    // Validation du form directement dans le controleur
    $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:255',
        'description' => 'required',
    ]);

    // Crée une nouvelle catégorie avec les données validées
    $categories =Category::create($validatedData);

    // Redirige vers la liste des catégories avec un mesage de succès
    return redirect('/admin/categories')->with('success', 'La catégorie a été ajoutée avec succès !');
    }

    public function edit($id)
    {
        // Récupère la catégorie correspondant à l'ID et affiche la vue pour la modifier
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Récupère la catégorie correspondant à l'ID
        $category = Category::find($id);
        // Met à jour les champs de la catégorie avec les données du formulaire
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        // Redirige vers la liste des catégories avec un message de succès
        return redirect('/admin/categories')->with('success', 'La catégorie a été modifiée avec succès!');
    }

    public function destroy($id)
    {
        // Récupère la catégorie correspondant à l'ID et la supprime de la base de données
        $category = Category::find($id);
        $category->delete();
        // Redirige vers la liste des catégories avec un message de succès
        return redirect('/admin/categories')->with('success', 'La catégorie a été supprimée avec succès!');
    }



}
