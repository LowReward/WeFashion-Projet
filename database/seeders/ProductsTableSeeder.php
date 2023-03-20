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
            'status' => 'on_sale',
            'reference' => 'A97DQOLPMANXO106',
            'image' => 'images/products/3.png',
            'sizes' => 'XS,S,M,L',
            'category_id' => '1',
        ]);
        Product::create([
            'name' => 'FLORAL - T-shirt imprimé',
            'description' => 'Nouveau t-shirt de la marque Jack & Jones',
            'price' => 15.99,
            'status' => 'standard',
            'reference' => 'A97DQOLPMANXO106',
            'image' => 'images/products/4.png',
            'sizes' => 'S,M',
            'category_id' => '1',
        ]);
        Product::create([
            'name' => 'BHTEE - Pullover',
            'description' => 'Pull couleur delft avec son magnifique col rond',
            'price' => 19.50,
            'status' => 'standard',
            'reference' => 'A97DQOLPMANXO106',
            'image' => 'images/products/5.png',
            'sizes' => 'XS,S,M,L',
            'category_id' => '1',
        ]);
        Product::create([
            'name' => 'Tshirt Femme - Bleu',
            'description' => 'Tshirt pour femme de couleur bleu',
            'price' => 12,
            'status' => 'standard',
            'reference' => 'A67AAALPMANXO106',
            'image' => 'images/products/8.png',
            'sizes' => 'XS,S,M,L,XL',
            'category_id' => '2',
        ]);
        Product::create([
            'name' => 'Jean Slim',
            'description' => 'Jean simple',
            'price' => 15.99,
            'status' => 'standard',
            'reference' => 'A67AAALJEANO106',
            'image' => 'images/products/9.png',
            'sizes' => 'XS,S,M,L,XL',
            'category_id' => '2',
        ]);
        Product::create([
            'name' => 'Pullover Femme - Vert',
            'description' => 'Magnifique pullover imaginé pour la collection de printemps',
            'price' => 15.99,
            'status' => 'on_sale',
            'reference' => 'A67AAALJEANO106',
            'image' => 'images/products/10.png',
            'sizes' => 'XS,S,M,L,XL',
            'category_id' => '2',
        ]);
        Product::create([
            'name' => 'Chemise été',
            'description' => 'Légère chemise à fleurs venant des îles les plus propices',
            'price' => 11.99,
            'status' => 'on_sale',
            'reference' => 'A67AAALJEANO106',
            'image' => 'images/products/11.png',
            'sizes' => 'XS,S,M,L,XL',
            'category_id' => '2',
        ]);
        Product::create([
            'name' => 'Chemise été 2',
            'description' => 'Légère chemise à fleurs venant des îles les plus propices',
            'price' => 12.45,
            'status' => 'standard',
            'reference' => 'A67AAALJEANO106',
            'image' => 'images/products/11.png',
            'sizes' => 'S,L',
            'category_id' => '2',
        ]);
        Product::create([
            'name' => 'Veste',
            'description' => 'Veste légère',
            'price' => 12.45,
            'status' => 'standard',
            'reference' => 'A67AAALJEANO106',
            'image' => 'images/products/12.png',
            'sizes' => 'S,M',
            'category_id' => '2',
        ]);
        Product::create([
            'name' => 'Manteaux',
            'description' => 'Manteaux long',
            'price' => 12.45,
            'status' => 'standard',
            'reference' => 'A67AAALJEANO106',
            'image' => 'images/products/13.png',
            'sizes' => 'XS',
            'category_id' => '2',
        ]);


    }
}
