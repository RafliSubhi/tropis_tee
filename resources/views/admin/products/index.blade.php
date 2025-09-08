@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Produk</h1>
        <a href="{{ route('admin.products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Produk Baru
        </a>
    </div>

    <!-- Search Form -->
    <div class="mb-4">
        <form action="{{ route('admin.products.index') }}" method="GET">
            <div class="flex items-center">
                <input type="text" name="search" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Cari produk berdasarkan nama..." value="{{ request('search') }}">
                <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cari</button>
            </div>
        </form>
    </div>

    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Gambar</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Harga</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Keterangan</th>
                    <th class="px-4 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($products as $product)
                    <tr>
                        <td class="border-t px-4 py-2">
                            <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" class="h-16 w-16 object-cover rounded">
                        </td>
                        <td class="border-t px-4 py-2">{{ $product->nama }}</td>
                        <td class="border-t px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="border-t px-4 py-2 max-w-sm truncate">{{ $product->keterangan }}</td>
                        <td class="border-t px-4 py-2 text-center">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border-t px-4 py-2 text-center">Tidak ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection