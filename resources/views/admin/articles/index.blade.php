@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Berita</h1>
        <a href="{{ route('admin.articles.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Berita Baru
        </a>
    </div>

    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Gambar</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Judul</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($articles as $article)
                    <tr>
                        <td class="py-3 px-4">
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="h-16 w-24 object-cover rounded">
                        </td>
                        <td class="py-3 px-4">{{ $article->title }}</td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('admin.articles.edit', $article->id) }}" class="text-blue-500 hover:text-blue-700 mx-2">Edit</a>
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 mx-2" onclick="return confirm('Anda yakin ingin menghapus berita ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">Belum ada berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
