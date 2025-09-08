@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Manajemen Testimoni</h1>

    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm text-left">Nama Pengirim</th>
                    <th class="w-3/5 py-3 px-4 uppercase font-semibold text-sm text-left">Komentar</th>
                    <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm text-center">Status Suka</th>
                    <th class="w-1/5 py-3 px-4 uppercase font-semibold text-sm text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($testimonials as $testimonial)
                    <tr>
                        <td class="py-3 px-4">{{ $testimonial->nama_pengirim }}</td>
                        <td class="py-3 px-4">{{ $testimonial->komentar }}</td>
                        <td class="py-3 px-4 text-center">
                            @if($testimonial->disukai_admin)
                                <span class="bg-green-500 text-white py-1 px-3 rounded-full text-xs">Disukai</span>
                            @else
                                <span class="bg-gray-400 text-white py-1 px-3 rounded-full text-xs">Biasa</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-center">
                            <form action="{{ route('admin.testimonials.toggleLike', $testimonial->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="text-blue-500 hover:text-blue-700 mx-2">Toggle Like</button>
                            </form>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 mx-2" onclick="return confirm('Anda yakin ingin menghapus testimoni ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Belum ada testimoni.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
