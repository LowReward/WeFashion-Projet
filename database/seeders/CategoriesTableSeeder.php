<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Ici on vient créer 2 catégories à l'aide de la méthode create()
        Category::create([
            'name' => 'homme',
            'description' => 'Catégorie homme'
        ]);
        Category::create([
            'name' => 'femme',
            'description' => 'Catégorie femme'
        ]);
    }
}
