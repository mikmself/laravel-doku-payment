<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => "Kursi Kayu",
            'image' => "https://res.cloudinary.com/dfa5oe9qp/image/upload/v1733829278/furniture/y34dkxkkrwchgs1dsdei.jpg",
            'description' => "Kursi kayu jati",
            'price' => 500000,
            'category_id' => 1,
        ]);
        Product::create([
            'name' => "Kursi Besi",
            'image' => "https://res.cloudinary.com/dfa5oe9qp/image/upload/v1733829278/furniture/jf5ljbeaxoiqwesmtwk6.jpg",
            'description' => "Kursi besi hitam",
            'price' => 250000,
            'category_id' => 1,
        ]);
        Product::create([
            'name' => "Kursi sofa satuan",
            'image' => "https://res.cloudinary.com/dfa5oe9qp/image/upload/v1733829278/furniture/d2tnk9lyneh5yzi2lzkl.jpg",
            'description' => "Kursi sofa satuan kuning",
            'price' => 800000,
            'category_id' => 1,
        ]);
    }
}
