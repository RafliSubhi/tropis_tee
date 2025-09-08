<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'nama_pengirim' => 'Andi',
            'komentar' => 'Bahannya adem banget, desainnya juga keren. Suka!',
            'disukai_admin' => true,
        ]);

        Testimonial::create([
            'nama_pengirim' => 'Bunga',
            'komentar' => 'Pengirimannya cepat, kualitas kaosnya oke punya. Terima kasih Tropis Tee!',
            'disukai_admin' => false,
        ]);

        Testimonial::create([
            'nama_pengirim' => 'Candra',
            'komentar' => 'Warnanya tidak luntur setelah dicuci berkali-kali. Recommended!',
            'disukai_admin' => true,
        ]);
    }
}