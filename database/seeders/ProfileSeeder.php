<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'latar_belakang' => 'Tropis Tee lahir dari kecintaan kami terhadap kekayaan alam dan budaya tropis Indonesia. Kami percaya bahwa pakaian bukan hanya soal gaya, tetapi juga cerita. Setiap desain kaos kami terinspirasi dari keindahan pantai, rimbunnya hutan, dan semangat musim panas yang tak pernah usai.',
            'deskripsi_usaha' => 'Kami adalah merek fashion yang berfokus pada produksi kaos berkualitas tinggi dengan desain bertema tropis yang unik dan otentik. Menggunakan bahan katun premium, kami berkomitmen untuk memberikan kenyamanan maksimal sambil tetap tampil gaya. Tropis Tee adalah pilihan tepat bagi mereka yang berjiwa bebas dan ingin membawa nuansa liburan dalam keseharian.',
            'welcome_title' => 'Selamat Datang di Tropis Tee',
            'welcome_text' => 'Gaya santai Anda dimulai di sini. Kami menyediakan kaos dengan kualitas terbaik dan desain yang terinspirasi dari kekayaan alam tropis yang akan membuat hari Anda lebih berwarna.',
            'welcome_image' => null, // Atau path ke gambar default jika ada
        ]);
    }
}