<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Items;


class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items= [
            ['name'=>'pen', 'price'=>1000],
            ['name'=>'book', 'price'=>2000],
            ['name'=>'water', 'price'=>3000],
            ['name'=>'TV', 'price'=>3000],
        ];
        
    foreach ($items as $item) {
        Items::create($item);
    }
    }

}
