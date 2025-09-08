@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-600">Anda telah berhasil masuk ke dashboard admin Tropis Tee.</p>
        <p class="text-gray-600 mt-2">Gunakan menu navigasi di sebelah kiri untuk mulai mengelola konten website Anda.</p>
    </div>
@endsection
