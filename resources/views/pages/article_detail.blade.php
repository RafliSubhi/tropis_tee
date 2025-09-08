@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        
        <!-- Article Image -->
        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-auto object-cover">

        <div class="p-8 md:p-12">
            <!-- Article Title -->
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 break-words">{{ $article->title }}</h1>

            <!-- Article Content -->
            <div class="text-gray-700 text-lg leading-relaxed whitespace-pre-wrap break-words">
                {{ $article->berita_lengkap }}
            </div>

            <!-- Back Button -->
            <div class="mt-12 text-center">
                <a href="{{ url()->previous() }}" class="bg-teal-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-teal-600 transition duration-300">
                    Kembali
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
