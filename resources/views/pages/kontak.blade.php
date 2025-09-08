@extends('layouts.app')

@section('content')
<div class="bg-gray-50">
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800">Hubungi Kami</h1>
                <p class="text-lg text-gray-600 mt-4">Kami siap mendengar dari Anda. Kunjungi kami atau kirimkan pesan.</p>
                <div class="w-24 h-1 bg-teal-600 mx-auto mt-4"></div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden md:flex">
                <!-- Left Side: Contact Info -->
                <div class="md:w-1/2 p-8 md:p-12">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Informasi Kontak</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-map-marker-alt fa-lg"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-bold text-gray-700">Lokasi</h3>
                                <p class="text-gray-600 mt-1">{{ $profile->location_address ?? 'Alamat belum diatur.' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-envelope fa-lg"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-bold text-gray-700">Email</h3>
                                <a href="mailto:{{ $profile->email_address ?? '#' }}" class="text-gray-600 hover:text-teal-500 transition duration-300">{{ $profile->email_address ?? 'Email belum diatur.' }}</a>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-link fa-lg"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-bold text-gray-700">Media Sosial</h3>
                                <a href="{{ $profile->social_link ?? '#' }}" target="_blank" rel="noopener noreferrer" class="text-gray-600 hover:text-teal-500 transition duration-300">Kunjungi Kami di Sini</a>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center">
                                <i class="fab fa-whatsapp fa-lg"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-bold text-gray-700">Hubungi</h3>
                                @if($profile->whatsapp_number)
                                    <a href="{{ $profile->whatsapp_number }}" target="_blank" rel="noopener noreferrer" class="text-gray-600 hover:text-teal-500 transition duration-300">{{ str_replace('https://wa.me/', '', $profile->whatsapp_number) }}</a>
                                @else
                                    <p class="text-gray-600 mt-1">Nomor WhatsApp belum diatur.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Map -->
                <div class="md:w-1/2">
                    @if($profile->map_embed_url)
                        <div class="relative" style="padding-bottom: 75%;"> <!-- 4:3 aspect ratio -->
                            <div class="absolute inset-0">
                                {!! preg_replace(['/width="[0-9]+"/', '/height="[0-9]+"/', '/style=".*"/', '/class=".*"/'], ['width="100%"', 'height="100%"', '', ''], $profile->map_embed_url) !!}
                            </div>
                        </div>
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <p class="text-gray-500">Peta belum diatur.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
