<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category_id', 'status', 'reference', 'published', 'image', 'sizes'];

    //Cette méthode définie la relation entre notre table catégories et notre table produits
    public function category()
    {
        // On utilise 'Category::class' pour signifier la relation établie avec le modèle category
        return $this->belongsTo(Category::class);
    }
}
