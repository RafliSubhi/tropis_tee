<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'nama' => 'Rian Pratama',
            'jabatan' => 'CEO',
            'foto' => 'images/team-1.jpg',
            'alamat' => 'Jl. Merdeka No. 1, Jakarta',
            'email' => 'rian.pratama@tropistee.com',
        ]);

        Employee::create([
            'nama' => 'Sari Lestari',
            'jabatan' => 'Administrator',
            'foto' => 'images/team-2.jpg',
            'alamat' => 'Jl. Sudirman No. 2, Jakarta',
            'email' => 'sari.lestari@tropistee.com',
        ]);

        Employee::create([
            'nama' => 'Budi Santoso',
            'jabatan' => 'Financial',
            'foto' => 'images/team-3.jpg',
            'alamat' => 'Jl. Gatot Subroto No. 3, Jakarta',
            'email' => 'budi.santoso@tropistee.com',
        ]);

        Employee::create([
            'nama' => 'Dewi Anggraini',
            'jabatan' => 'Tech',
            'foto' => 'images/team-4.jpg',
            'alamat' => 'Jl. Thamrin No. 4, Jakarta',
            'email' => 'dewi.anggraini@tropistee.com',
        ]);

        Employee::create([
            'nama' => 'Eko Wahyudi',
            'jabatan' => 'Production',
            'foto' => 'images/team-5.jpg',
            'alamat' => 'Jl. Rasuna Said No. 5, Jakarta',
            'email' => 'eko.wahyudi@tropistee.com',
        ]);
    }
}