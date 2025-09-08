<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'Grand Opening Tropis Tee!',
            'content' => 'Kami sangat senang mengumumkan pembukaan resmi Tropis Tee! Kunjungi kami dan dapatkan promo spesial.',
            'image' => 'https://via.placeholder.com/640x480.png/00aa77?text=TropisTee+Opening'
        ]);

        Article::create([
            'title' => 'Menu Baru: Es Kopi Kelapa',
            'content' => 'Rasakan sensasi unik perpaduan kopi dan segarnya air kelapa murni dalam menu terbaru kami.',
            'image' => 'https://via.placeholder.com/640x480.png/0077aa?text=Es+Kopi+Kelapa'
        ]);

        Article::create([
            'title' => 'Promo Akhir Pekan: Beli 2 Gratis 1',
            'content' => 'Nikmati akhir pekan bersama teman dengan promo spesial Beli 2 Gratis 1 untuk semua varian teh.',
            'image' => 'https://via.placeholder.com/640x480.png/aa7700?text=Promo+Weekend'
        ]);
    }
}
