@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

        <!-- Testimonial Submission Form -->
        <div class="lg:col-span-1">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4">Bagikan Pendapat Anda</h2>
                <p class="text-gray-600 mb-6">Kami senang mendengar masukan dari Anda.</p>
                
                @if(session('success'))
                    <div class="bg-teal-100 border border-teal-400 text-teal-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('testimoni.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <div class="flex justify-between items-center">
                            <label for="nama_pengirim" class="block text-gray-700 text-sm font-bold mb-2">Nama Anda</label>
                            <span id="nama_char_count" class="text-sm text-gray-500">0/1 karakter</span>
                        </div>
                        <input type="text" name="nama_pengirim" id="nama_pengirim" maxlength="20" oninput="updateCharCounter(this, 20, 'nama_char_count');" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between items-center">
                            <label for="komentar" class="block text-gray-700 text-sm font-bold mb-2">Komentar Anda</label>
                            <span id="komentar_char_count" class="text-sm text-gray-500">0/600 karakter</span>
                        </div>
                        <textarea name="komentar" id="komentar" rows="4" maxlength="600" oninput="updateCharCounter(this, 600, 'komentar_char_count');" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">Kirim Testimoni</button>
                </form>
            </div>
        </div>

        <!-- Testimonials Display -->
        <div class="lg:col-span-2">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Apa Kata Mereka</h1>
            <div class="space-y-6">
                @forelse($testimonials as $testimonial)
                    <div class="bg-white rounded-lg shadow-lg p-6 relative">
                        @if($testimonial->disukai_admin)
                            <div class="absolute top-0 right-0 -mt-3 -mr-3 bg-teal-500 text-white p-2 rounded-full shadow-md">
                                <i class="fas fa-star"></i>
                            </div>
                        @endif
                        <p class="text-gray-600 italic whitespace-pre-wrap break-words">"{{ $testimonial->komentar }}"</p>
                        <p class="text-right text-gray-800 font-bold mt-4 break-words">- {{ $testimonial->nama_pengirim }}</p>
                    </div>
                @empty
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <p class="text-center text-gray-500">Jadilah yang pertama memberikan testimoni!</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        updateCharCounter(document.getElementById('nama_pengirim'), 20, 'nama_char_count');
        updateCharCounter(document.getElementById('komentar'), 600, 'komentar_char_count');
    });
</script>
@endsection