<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $products = [
        //     ['name'=>'pen', 'price'=>1000],
        //     ['name'=>'Book', 'price'=>2000],
        //     ['name'=>'book', 'price'=>2000],
        //     ['name'=>'water', 'price'=>3000],
        //     ['name'=>'TV', 'price'=>3000],
        // ];
        // foreach ($products as $product) {
        //     Product::create($product);
        // }
        Product::factory()->count(50)->create();
    }
}
