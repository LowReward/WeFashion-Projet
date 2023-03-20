<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'LIMAN - T-shirt basique',
            'description' => 'Magnifique T-shirt de la maque Mango en jersey avec un col rond',
            'price' => 18.99,
            'status' => 'standard',
            'reference' => 'A4E5ASBO80APSQLE',
            'image' => 'images/products/1.png',
            'sizes' => 'L,XL',
            'category_id' => '1',
        ]);
        Product::create([
            'name' => 'Pull - Good Compagny Club',
            'description' => 'Pull de la nouvelle collection produite par Rovers',
            'price' => 23.99,
            'status' => 'standard',
            'reference' => 'A97DQOLPMANXO106',
            'image' => 'images/products/2.png',
            'sizes' => 'S',
            'category_id' => '1',
        ]);
        Product::create([
            'name' => 'VINTAGE QUARTERBACK - T-shirt à manches longues',
            'description' => 'T-shirt à manches longues de la marque Superdry',
            'price' => 44.99,
            'status' => 'standard',
            'reference' => 'A97DQOLPMANXO106',
            'image' => 'images/products/3.png',
            'sizes' => 'XS,S,M,L',
            'category_id' => '1',
        ]);
        Product::create([
            'name' => 'FLORAL - T-shirt imprimé',
            'description' => 'Nouveau t-shirt de la marque Jack & Jones',
            'price' => 21.99,
            'status' => 'standard',
            'reference' => 'A97DQOLPMANXO106',
            'image' => 'images/products/3.png',
            'sizes' => 'XS,S,M,L',
            'category_id' => '1',
        ]);

    }
}
