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
            'name' => "Baju Merah",
            'image' => "https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/106/MTA-105436779/no-brand_kaos-polos-merah-premium-bahan-cotton_full01.jpg",
            'description' => "Baju warna merah",
            'price' => 200000,
            'category_id' => 1,
        ]);
        Product::create([
            'name' => "Baju Kuning",
            'image' => "https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/92/MTA-105434280/no-brand_kaos-polos-kuning-premium-bahan-cotton_full01.jpg",
            'description' => "Baju warna kuning",
            'price' => 150000,
            'category_id' => 1,
        ]);
        Product::create([
            'name' => "Baju hijau",
            'image' => "https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full/catalog-image/MTA-99600694/koze_koze_-_premium_comfort_green_t-shirt_-_kaos_polos_hijau_full01_eukw1txs.jpg",
            'description' => "Baju warna hijau",
            'price' => 120000,
            'category_id' => 1,
        ]);
    }
}
