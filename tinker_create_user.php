<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'rafli',
    'email' => 'rafli@gmail.com',
    'password' => Hash::make('12345678'),
]);

echo "Admin user 'rafli' created successfully.\n";
