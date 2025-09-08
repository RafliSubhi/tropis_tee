@extends('layouts.app')

@section('content')
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .slide-background {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }
        .articleSwiper {
            height: 50vh; /* Default height for mobile */
            min-height: 300px; /* Ensure minimum height */
        }
        @media (min-width: 768px) { /* md breakpoint */
            .articleSwiper {
                height: 70vh; /* Height for tablets and desktops */
            }
        }
        .hero-section {
            height: 85vh;
            background-image: url("{{ $profile->welcome_image ? asset('storage/' . $profile->welcome_image) : 'https://via.placeholder.com/1920x1080.png/f3f4f6/1f2937?text=Tropis+Tee' }}");
            background-size: cover;
            background-position: center;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .text-shadow-custom {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
    </style>

    <!-- Welcome Section -->
    <div class="container mx-auto px-6 py-12 md:py-16" data-animate>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="text-center md:text-left">
                <h1 class="text-4xl sm:text-5xl md:text-7xl font-extrabold leading-tight mb-4 text-gray-800 text-shadow-custom">{!! nl2br(e($profile->welcome_title ?? 'Selamat Datang di Tropis Tee')) !!}</h1>
            <p class="text-lg sm:text-xl text-gray-700 mb-8 text-shadow-custom max-w-2xl mx-auto break-words">{{ $profile->welcome_text ?? 'Gaya santai Anda dimulai di sini. Kami menyediakan kaos dengan kualitas terbaik dan desain yang terinspirasi dari kekayaan alam tropis yang akan membuat hari Anda lebih berwarna.' }}</p>
                <div class="flex flex-col sm:flex-row justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4 md:ml-8">
                    <a href="{{ route('menu') }}" class="bg-teal-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-teal-600 transition duration-300 text-lg">Lihat Koleksi</a>
                    <a href="{{ $profile->social_link ?? '#' }}" target="_blank" class="bg-gray-700 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-800 transition duration-300 text-lg ml-4">Hubungi Sekarang</a>
                </div>
            </div>
            <div class="mt-8 md:mt-0">
                <img src="{{ $profile->welcome_image ? asset('storage/' . $profile->welcome_image) : 'https://via.placeholder.com/600x400.png/A7F3D0/166534?text=Tropis+Tee+Image' }}" alt="Welcome Image" class="rounded-lg shadow-2xl w-full">
            </div>
        </div>
    </div>

    <!-- News Section -->
    @if($articles->count() > 0)
    <div class="relative bg-gray-100 py-16" data-animate>
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">Berita Terbaru</h2>
        <div class="swiper-container articleSwiper">
            <div class="swiper-wrapper">
                @foreach($articles as $article)
                    <div class="swiper-slide">
                        <div class="slide-background" style="background-image: url('{{ asset('storage/' . $article->image) }}');">
                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center p-6 md:p-8">
                                <div class="text-center text-white max-w-lg">
                                    <h3 class="text-3xl md:text-5xl font-bold mb-4 break-words text-shadow-custom">{{ $article->title }}</h3>
                                    <p class="text-base md:text-xl break-words text-shadow-custom">{{ $article->content }}</p>
                                    <a href="{{ route('articles.show', $article) }}" class="mt-4 inline-block text-teal-300 hover:text-teal-200 font-bold">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="text-center py-12 bg-gray-100">
            <a href="{{ route('articles.index') }}" class="bg-teal-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-teal-600 transition duration-300 shadow-md">Lihat Semua Berita</a>
        </div>
    </div>
    @endif

    <!-- Business Description Section -->
    <div class="py-16 md:py-24 bg-white" data-animate>
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-2xl p-8 md:p-12">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800">Tentang Kami</h2>
                    <div class="w-24 h-1 bg-teal-500 mx-auto mt-4"></div>
                </div>
                <div class="max-w-4xl mx-auto text-center text-gray-600 text-lg">
                    <p class="whitespace-pre-wrap break-words">{{ $profile->deskripsi_usaha ?? 'Deskripsi usaha belum diatur.' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    @if($employees->count() > 0)
    <div class="bg-gray-100 py-16 md:py-24" data-animate>
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800">Tim Kami</h2>
                <div class="w-24 h-1 bg-teal-500 mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($employees as $employee)
                    <div class="text-center group">
                        <img src="{{ asset('storage/' . $employee->foto) }}" alt="{{ $employee->nama }}" class="w-24 h-24 md:w-32 md:h-32 rounded-full mx-auto object-cover shadow-lg transform group-hover:scale-110 transition-transform duration-300 border-4 border-white group-hover:border-teal-400">
                        <div class="p-4 md:p-6">
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 break-words">{{ $employee->nama }}</h3>
                            <p class="text-gray-500 break-words">{{ $employee->jabatan }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".articleSwiper", {
        spaceBetween: 30,
        effect: "fade",
        loop: {{ $articles->count() > 1 ? 'true' : 'false' }},
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
@endsection