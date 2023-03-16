<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', ['categories' => $categories]);
    }

    public function create()
    {
    return view('admin.categories.create');
    }


    public function store(Request $request)
    {
    $validatedData = $request->validate([ //validation du form directement dans le controleur
        'name' => 'required|unique:categories|max:255',
        'description' => 'required',
    ]);

    $category = new Category();
    $category->name = $validatedData['name'];
    $category->description = $validatedData['description'];
    $category->save();

    return redirect('/admin/categories')->with('success', 'La catégorie a été ajoutée avec succès !');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        return redirect('/admin/categories')->with('success', 'La catégorie a été modifiée avec succès!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/admin/categories')->with('success', 'La catégorie a été supprimée avec succès!');
    }



}
