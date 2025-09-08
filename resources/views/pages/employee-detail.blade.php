@extends('layouts.app')

@section('content')
<div class="bg-gray-50 font-sans">
    <div class="container mx-auto px-4 py-16">

        <div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-lg overflow-hidden">
            <div class="md:flex">
                <!-- Left Side: Image -->
                <div class="md:w-1/3">
                    <img src="{{ asset('storage/' . $employee->foto) }}" alt="Foto {{ $employee->nama }}" class="w-full h-full object-cover">
                </div>

                <!-- Right Side: Details -->
                <div class="md:w-2/3 p-8 md:p-12">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight">{{ $employee->nama }}</h1>
                    <p class="text-xl text-lime-600 font-semibold mt-2">{{ $employee->jabatan }}</p>
                    
                    <div class="mt-8 border-t border-gray-200 pt-8">
                        <h3 class="text-2xl font-semibold text-gray-700 mb-4">Detail Kontak</h3>
                        <div class="space-y-4 text-lg text-gray-600">
                            <div class="flex items-center">
                                <i class="fas fa-fw fa-envelope mr-4 text-gray-400"></i>
                                <a href="mailto:{{ $employee->email }}" class="hover:text-teal-600">{{ $employee->email }}</a>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-fw fa-map-marker-alt mr-4 mt-1 text-gray-400"></i>
                                <span>{{ $employee->alamat }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 text-left">
                        <a href="{{ route('profil') }}" class="text-lime-500 hover:text-lime-700 font-semibold">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Tim Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection