@extends('layouts.app')

@section('content')
<div class="bg-gray-50">
    <!-- Company Profile Section -->
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-700 mb-4">Tentang Tropis Tee</h1>
            <div class="w-24 h-1 bg-teal-500 mx-auto mb-6"></div>
        </div>

        <!-- Latar Belakang & Deskripsi Usaha in Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-3 text-center">Latar Belakang</h2>
                <p class="text-gray-600 leading-relaxed whitespace-pre-wrap break-words text-center">{{ $profile->latar_belakang ?? 'Informasi belum tersedia.' }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-3 text-center">Deskripsi Usaha</h2>
                <p class="text-gray-600 leading-relaxed whitespace-pre-wrap break-words text-center">{{ $profile->deskripsi_usaha ?? 'Informasi belum tersedia.' }}</p>
            </div>
        </div>

        <!-- Visi Misi Prinsip Section in Cards -->
        <div class="mt-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-3">Visi</h3>
                    <p class="text-gray-600 leading-relaxed whitespace-pre-wrap break-words">{{ $profile->visi ?? 'Informasi belum tersedia.' }}</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-3">Misi</h3>
                    <p class="text-gray-600 leading-relaxed whitespace-pre-wrap break-words">{{ $profile->misi ?? 'Informasi belum tersedia.' }}</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-3">Prinsip</h3>
                    <p class="text-gray-600 leading-relaxed whitespace-pre-wrap break-words">{{ $profile->prinsip ?? 'Informasi belum tersedia.' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="bg-gray-50">
        <div class="container mx-auto px-6 py-16">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-700 mb-4">Tim Kami</h2>
                <p class="text-gray-600 mb-10">Orang-orang di balik layar yang penuh dedikasi.</p>
            </div>

            <!-- Team Image Section -->
            @if($profile->team_image)
                <div class="my-12 text-center">
                    <img src="{{ asset('storage/' . $profile->team_image) }}" alt="Team Image" class="w-full max-w-4xl h-auto object-cover mx-auto rounded-lg shadow-xl">
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @forelse($employees as $employee)
                    <div class="text-center p-4">
                        <img src="{{ asset('storage/' . $employee->foto) }}" alt="{{ $employee->nama }}" class="w-32 h-32 rounded-full object-cover mx-auto shadow-lg transform hover:scale-110 transition-transform duration-300">
                        <h3 class="text-xl font-bold text-gray-700 mt-4">{{ $employee->nama }}</h3>
                        <p class="text-gray-500">{{ $employee->jabatan }}</p>
                        <a href="{{ route('employee.detail', $employee) }}" class="text-teal-500 hover:text-teal-700 font-semibold mt-2 inline-block">Lebih Banyak</a>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-lg text-gray-500">Data tim belum tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
