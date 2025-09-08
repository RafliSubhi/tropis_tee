@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Anggota: {{ $employee->nama }}</h1>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
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

        <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">Nama Lengkap</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="nama" name="nama" type="text" value="{{ $employee->nama }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="jabatan">Jabatan</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="jabatan" name="jabatan" type="text" value="{{ $employee->jabatan }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="email" name="email" type="email" value="{{ $employee->email }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat">Alamat</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="alamat" name="alamat" type="text" value="{{ $employee->alamat }}" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="foto">Ganti Foto (Opsional)</label>
                <img src="{{ asset('storage/' . $employee->foto) }}" alt="{{ $employee->nama }}" class="h-24 w-24 object-cover rounded mb-2">
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="foto" name="foto" type="file">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.employees.index') }}" class="inline-block font-bold text-sm text-blue-500 hover:text-blue-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection