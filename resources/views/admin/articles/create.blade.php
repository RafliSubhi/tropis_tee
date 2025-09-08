@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Berita Baru</h1>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <div class="flex justify-between items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Judul Berita
                    </label>
                    <span id="title_char_count" class="text-sm text-gray-500">0/45 karakter</span>
                </div>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" maxlength="45" oninput="updateCharCounter(this, 45, 'title_char_count');" required>
            </div>

            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                        Konten Berita
                    </label>
                    <span id="content_word_count" class="text-sm text-gray-500">0/40 kata</span>
                </div>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="content" name="content" rows="6" onkeydown="return limitWords(event, 40);" onkeyup="updateWordCounter(this, 40, 'content_word_count');" required></textarea>
            </div>

            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="berita_lengkap">
                        Berita Lengkap
                    </label>
                    <span id="berita_lengkap_char_count" class="text-sm text-gray-500">0/10000 karakter</span>
                </div>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="berita_lengkap" name="berita_lengkap" rows="10" maxlength="10000" oninput="updateCharCounter(this, 10000, 'berita_lengkap_char_count');"></textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Gambar Berita
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" name="image" type="file" required>
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Simpan Berita
                </button>
                <a href="{{ route('admin.articles.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    // Initialize counters on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateCharCounter(document.getElementById('title'), 45, 'title_char_count');
        updateWordCounter(document.getElementById('content'), 40, 'content_word_count');
        updateCharCounter(document.getElementById('berita_lengkap'), 10000, 'berita_lengkap_char_count');
    });
</script>
@endsection