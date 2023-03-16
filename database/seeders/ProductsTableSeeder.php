<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Ce que nous savons: la marque a déclaré utiliser une norme de recyclage indépendante
            Cet article contient des matériaux récupérés qui, autrement, finiraient en déchets. Cela permet de réduire la demande de matières premières et de préserver les ressources naturelles.',
            'price' => 10.99,
            'category_id' => '1',
            'état' => 'standard',
            'image' => 'product1.jpg'
        ]);

        /*Product::create([
            'name' => 'Product 2',
            'description' => 'Description of product 2',
            'price' => 20.99,
            'category' => 'Women',
            'image' => 'product2.jpg'
        ]);

        Product::create([
            'name' => 'Product 3',
            'description' => 'Description of product 3',
            'price' => 30.99,
            'category' => 'Solde',
            'image' => 'product3.jpg'
        ]);
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description of product 1',
            'price' => 10.99,
            'category' => 'Men',
            'image' => 'product1.jpg'
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description of product 2',
            'price' => 20.99,
            'category' => 'Women',
            'image' => 'product2.jpg'
        ]);

        Product::create([
            'name' => 'Product 3',
            'description' => 'Description of product 3',
            'price' => 30.99,
            'category' => 'Sale',
            'image' => 'product3.jpg'
        ]);*/
    }
}
