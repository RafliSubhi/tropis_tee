<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$email = 'rafli@gmail.com';
$password = '12345678';

$user = User::where('email', $email)->first();

if ($user) {
    $user->password = Hash::make($password);
    $user->save();
    echo "Password for user 'rafli' has been reset successfully.\n";
} else {
    User::create([
        'name' => 'rafli',
        'email' => $email,
        'password' => Hash::make($password),
    ]);
    echo "User 'rafli' was not found, so a new account has been created.\n";
}
