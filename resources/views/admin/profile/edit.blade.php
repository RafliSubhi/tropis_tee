@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Pengaturan Website</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2 mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Logo Website</h2>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="logo_image">Upload Logo (Rekomendasi: .png transparan)</label>
                @if($profile->logo_image)<img src="{{ asset('storage/' . $profile->logo_image) }}" alt="Logo" class="h-16 w-auto bg-gray-200 p-2 rounded mb-2">@endif
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="logo_image" name="logo_image" type="file">
            </div>
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="logo_text">Teks di Samping Logo</label>
                    <span id="logo_text_char_count" class="text-sm text-gray-500">0/30 karakter</span>
                </div>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="logo_text" name="logo_text" type="text" value="{{ old('logo_text', $profile->logo_text) }}" maxlength="30" oninput="updateCharCounter(this, 30, 'logo_text_char_count');" placeholder="Contoh: Tropis Tee">
            </div>
        </div>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Halaman Beranda</h2>
            <div class="mb-4">
                <div class="flex justify-between items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="welcome_title">Judul Selamat Datang</label>
                    <span id="welcome_title_char_count" class="text-sm text-gray-500">0/45 karakter</span>
                </div>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="welcome_title" name="welcome_title" type="text" value="{{ old('welcome_title', $profile->welcome_title) }}" maxlength="45" oninput="updateCharCounter(this, 45, 'welcome_title_char_count');">
            </div>
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="welcome_text">Paragraf Selamat Datang</label>
                    <span id="welcome_text_char_count" class="text-sm text-gray-500">0/90 karakter</span>
                </div>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="welcome_text" name="welcome_text" rows="4" maxlength="90" oninput="updateCharCounter(this, 90, 'welcome_text_char_count');">{{ old('welcome_text', $profile->welcome_text) }}</textarea>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="welcome_image">Gambar Selamat Datang</label>
                @if($profile->welcome_image)<img src="{{ asset('storage/' . $profile->welcome_image) }}" alt="Welcome Image" class="h-24 w-auto object-cover rounded mb-2">@endif
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="welcome_image" name="welcome_image" type="file">
            </div>
        </div>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Halaman Profil</h2>
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="latar_belakang">Latar Belakang</label>
                    <span id="latar_belakang_char_count" class="text-sm text-gray-500">0/450 karakter</span>
                </div>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="latar_belakang" name="latar_belakang" rows="6" maxlength="450" oninput="updateCharCounter(this, 450, 'latar_belakang_char_count');">{{ old('latar_belakang', $profile->latar_belakang) }}</textarea>
            </div>
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi_usaha">Deskripsi Usaha</label>
                    <span id="deskripsi_usaha_char_count" class="text-sm text-gray-500">0/450 karakter</span>
                </div>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="deskripsi_usaha" name="deskripsi_usaha" rows="6" maxlength="450" oninput="updateCharCounter(this, 450, 'deskripsi_usaha_char_count');">{{ old('deskripsi_usaha', $profile->deskripsi_usaha) }}</textarea>
            </div>
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="visi">Visi</label>
                    <span id="visi_char_count" class="text-sm text-gray-500">0/90 karakter</span>
                </div>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="visi" name="visi" rows="3" maxlength="90" oninput="updateCharCounter(this, 90, 'visi_char_count');">{{ old('visi', $profile->visi) }}</textarea>
            </div>
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="misi">Misi</label>
                    <span id="misi_char_count" class="text-sm text-gray-500">0/180 karakter</span>
                </div>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="misi" name="misi" rows="3" maxlength="180" oninput="updateCharCounter(this, 180, 'misi_char_count');">{{ old('misi', $profile->misi) }}</textarea>
            </div>
            <div class="mb-6">
                <div class="flex justify-between items-center">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="prinsip">Prinsip</label>
                    <span id="prinsip_char_count" class="text-sm text-gray-500">0/180 karakter</span>
                </div>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="prinsip" name="prinsip" rows="3" maxlength="180" oninput="updateCharCounter(this, 180, 'prinsip_char_count');">{{ old('prinsip', $profile->prinsip) }}</textarea>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="team_image">Gambar Tim (di atas daftar anggota)</label>
                @if($profile->team_image)<img src="{{ asset('storage/' . $profile->team_image) }}" alt="Team Image" class="h-24 w-auto object-cover rounded mb-2">@endif
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="team_image" name="team_image" type="file">
            </div>
        </div>

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Halaman Kontak</h2>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="location_address">Alamat Lokasi</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="location_address" name="location_address" type="text" value="{{ old('location_address', $profile->location_address) }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email_address">Alamat Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="email_address" name="email_address" type="email" value="{{ old('email_address', $profile->email_address) }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="social_link">Link Sosial Media/Marketplace (URL)</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="social_link" name="social_link" type="url" value="{{ old('social_link', $profile->social_link) }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="whatsapp_number">Link WhatsApp (URL)</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="whatsapp_number" name="whatsapp_number" type="url" value="{{ old('whatsapp_number', $profile->whatsapp_number) }}">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="map_embed_url">URL Google Maps Embed</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="map_embed_url" name="map_embed_url" rows="4">{{ old('map_embed_url', $profile->map_embed_url) }}</textarea>
                <p class="text-xs text-gray-600 mt-1">Buka Google Maps, cari lokasi Anda, klik "Share", lalu "Embed a map", dan salin URL dari dalam atribut `src`.</p>
            </div>
        </div>

        <div class="flex items-center justify-start mt-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Simpan Semua Perubahan
            </button>
        </div>
    </form>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        updateCharCounter(document.getElementById('logo_text'), 30, 'logo_text_char_count');
        updateCharCounter(document.getElementById('welcome_title'), 45, 'welcome_title_char_count');
        updateCharCounter(document.getElementById('welcome_text'), 90, 'welcome_text_char_count');
        updateCharCounter(document.getElementById('latar_belakang'), 450, 'latar_belakang_char_count');
        updateCharCounter(document.getElementById('deskripsi_usaha'), 450, 'deskripsi_usaha_char_count');
        updateCharCounter(document.getElementById('visi'), 90, 'visi_char_count');
        updateCharCounter(document.getElementById('misi'), 180, 'misi_char_count');
        updateCharCounter(document.getElementById('prinsip'), 180, 'prinsip_char_count');
    });
</script>
@endsection
