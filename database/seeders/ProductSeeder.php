<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nama' => 'Kaos "Sunset Palm"',
            'keterangan' => 'Kaos katun premium dengan desain pohon palem saat matahari terbenam. Cocok untuk suasana santai.',
            'gambar' => 'images/product-1.jpg',
        ]);

        Product::create([
            'nama' => 'Kaos "Ocean Wave"',
            'keterangan' => 'Rasakan deburan ombak dengan kaos desain gelombang samudra. Bahan sejuk dan nyaman.',
            'gambar' => 'images/product-2.jpg',
        ]);

        Product::create([
            'nama' => 'Kaos "Jungle Leaf"',
            'keterangan' => 'Tampil beda dengan motif daun tropis yang rimbun. Warna hijau yang menyegarkan.',
            'gambar' => 'images/product-3.jpg',
        ]);
    }
}