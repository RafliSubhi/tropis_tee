@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-700 mb-4">Semua Berita</h1>
            <div class="w-24 h-1 bg-lime-500 mx-auto mb-10"></div>
        </div>

        @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $article)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-2 text-gray-700">{{ $article->title }}</h3>
                            <p class="text-gray-600 text-base leading-relaxed mb-4">{{ Str::limit($article->content, 120) }}</p>
                            <a href="{{ route('articles.show', $article) }}" class="font-bold text-teal-600 hover:text-teal-700 transition duration-300">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <h2 class="text-2xl text-gray-600">Belum ada berita untuk ditampilkan.</h2>
            </div>
        @endif

        <div class="text-center mt-16">
            <a href="{{ route('beranda') }}" class="bg-teal-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-teal-600 transition duration-300">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection