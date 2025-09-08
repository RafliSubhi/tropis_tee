@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Koleksi Kami</h1>
        <p class="text-center text-gray-600 mb-10">Temukan gaya tropis Anda dalam setiap helai kaos.</p>
    </div>

    <!-- Search Form -->
    <div class="max-w-xl mx-auto mb-10">
        <form action="{{ route('menu') }}" method="GET">
            <div class="flex items-center">
                <input type="text" name="search" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Cari kaos favoritmu..." value="{{ request('search') }}">
                <button type="submit" class="ml-2 bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-4 rounded">Cari</button>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @forelse($products as $product)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 flex flex-col">
                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" class="w-full h-64 object-cover">
                <div class="p-6 flex flex-col flex-grow">
                    <h2 class="font-bold text-xl mb-2 break-words">{{ $product->nama }}</h2>
                    <p class="text-teal-600 font-bold text-lg mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-gray-700 text-base flex-grow break-words">
                        {{ $product->keterangan }}
                    </p>
                    @if($profile->social_link)
                        <div class="mt-4">
                            <a href="{{ $profile->social_link }}" target="_blank" rel="noopener noreferrer" class="w-full text-center bg-teal-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-teal-600 transition duration-300">
                                Pesan Sekarang
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-lg text-gray-500">Belum ada produk yang tersedia saat ini.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
