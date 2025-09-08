<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropis Tee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <a href="{{ route('beranda') }}" class="flex items-center py-2 px-2">
                            @if($sharedProfile && $sharedProfile->logo_image)
                                <img src="{{ asset('storage/' . $sharedProfile->logo_image) }}" alt="Logo" class="h-10 w-10 rounded-full object-cover">
                            @endif
                            @if($sharedProfile && $sharedProfile->logo_text)
                                <span class="font-bold text-gray-800 text-lg ml-3">{{ $sharedProfile->logo_text }}</span>
                            @elseif(!$sharedProfile || !$sharedProfile->logo_image)
                                <span class="font-bold text-gray-800 text-lg">Tropis Tee</span>
                            @endif
                        </a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('beranda') }}" class="py-4 px-2 text-gray-800 font-semibold hover:text-teal-500 transition duration-300">Beranda</a>
                    <a href="{{ route('menu') }}" class="py-4 px-2 text-gray-800 font-semibold hover:text-teal-500 transition duration-300">Menu</a>
                    <a href="{{ route('testimoni') }}" class="py-4 px-2 text-gray-800 font-semibold hover:text-teal-500 transition duration-300">Testimoni</a>
                    <a href="{{ route('profil') }}" class="py-4 px-2 text-gray-800 font-semibold hover:text-teal-500 transition duration-300">Profil</a>
                    <a href="{{ route('kontak') }}" class="py-4 px-2 text-gray-800 font-semibold hover:text-teal-500 transition duration-300">Kontak</a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <svg class="w-6 h-6 text-gray-800 hover:text-teal-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden mobile-menu">
            <ul class="bg-white">
                <li><a href="{{ route('beranda') }}" class="block text-sm px-2 py-4 text-gray-800 hover:bg-gray-100 transition duration-300">Beranda</a></li>
                <li><a href="{{ route('menu') }}" class="block text-sm px-2 py-4 text-gray-800 hover:bg-gray-100 transition duration-300">Menu</a></li>
                <li><a href="{{ route('testimoni') }}" class="block text-sm px-2 py-4 text-gray-800 hover:bg-gray-100 transition duration-300">Testimoni</a></li>
                <li><a href="{{ route('profil') }}" class="block text-sm px-2 py-4 text-gray-800 hover:bg-gray-100 transition duration-300">Profil</a></li>
                <li><a href="{{ route('kontak') }}" class="block text-sm px-2 py-4 text-gray-800 hover:bg-gray-100 transition duration-300">Kontak</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- About Section -->
                <div class="mb-6 md:mb-0 text-center md:text-left">
                    <a href="{{ route('beranda') }}" class="flex items-center justify-center md:justify-start mb-4">
                        @if($sharedProfile && $sharedProfile->logo_image)
                            <img src="{{ asset('storage/' . $sharedProfile->logo_image) }}" alt="Logo" class="h-10 w-10 rounded-full object-cover">
                        @endif
                        @if($sharedProfile && $sharedProfile->logo_text)
                            <span class="font-bold text-xl ml-3 text-white">{{ $sharedProfile->logo_text }}</span>
                        @elseif(!$sharedProfile || !$sharedProfile->logo_image)
                            <span class="font-bold text-xl text-white">Tropis Tee</span>
                        @endif
                    </a>
                    <p class="text-sm break-words">{{ $sharedProfile->welcome_text ?? 'Gaya santai Anda dimulai di sini. Kaos kualitas terbaik dengan desain tropis.' }}</p>
                </div>

                <!-- Contact Info -->
                <div class="text-center md:text-left">
                    <h3 class="text-lg font-semibold mb-4 text-white">Hubungi Kami</h3>
                    <ul class="space-y-3">
                        @if($sharedProfile && $sharedProfile->location_address)
                        <li class="flex items-center justify-center md:justify-start">
                            <i class="fas fa-map-marker-alt mr-3 flex-shrink-0 text-teal-500"></i>
                            <span class="break-words">{{ $sharedProfile->location_address }}</span>
                        </li>
                        @endif
                        @if($sharedProfile && $sharedProfile->email_address)
                        <li class="flex items-center justify-center md:justify-start">
                            <i class="fas fa-envelope mr-3 text-teal-500"></i>
                            <a href="mailto:{{ $sharedProfile->email_address }}" class="hover:text-teal-500 transition-colors break-words">{{ $sharedProfile->email_address }}</a>
                        </li>
                        @endif
                        @if($sharedProfile && $sharedProfile->whatsapp_number)
                        <li class="flex items-center justify-center md:justify-start">
                            <i class="fab fa-whatsapp mr-3 text-teal-500"></i>
                            <a href="{{ $sharedProfile->whatsapp_number }}" target="_blank" rel="noopener noreferrer" class="hover:text-teal-500 transition-colors break-words">{{ str_replace('https://wa.me/', '', $sharedProfile->whatsapp_number) }}</a>
                        </li>
                        @endif
                    </ul>
                </div>

                <!-- Social Media -->
                <div class="text-center md:text-left">
                    <h3 class="text-lg font-semibold mb-4 text-white">Sosial Media</h3>
                    @if($sharedProfile && $sharedProfile->social_link)
                        <a href="{{ $sharedProfile->social_link }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center bg-teal-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-teal-600 transition duration-300">
                            Kunjungi Saja
                        </a>
                    @else
                        <p class="text-gray-400">Link sosial media belum diatur.</p>
                    @endif
                </div>

            </div>
            <div class="border-t border-gray-800 mt-8 pt-6 text-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} Tropis Tee. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>

    <script>
        // Character counter
        function updateCharCounter(element, maxChars, counterId) {
            const currentLength = element.value.length;
            const counter = document.getElementById(counterId);
            if (counter) {
                counter.textContent = currentLength + '/' + maxChars + ' karakter';
            }
        }

        // Word counter
        function countWords(text) {
            if (!text) return 0;
            return text.trim().split(/\s+/).filter(function(n) { return n !== '' }).length;
        }

        function updateWordCounter(element, maxWords, counterId) {
            const wordCount = countWords(element.value);
            const counter = document.getElementById(counterId);
            if (counter) {
                counter.textContent = wordCount + '/' + maxWords + ' kata';
            }
        }

        function limitWords(event, maxWords) {
            const element = event.target;
            const wordCount = countWords(element.value);
            const isAllowedKey = event.key === 'Backspace' || event.key === 'Delete' || event.key.startsWith('Arrow') || (event.ctrlKey && event.key === 'a') || (event.ctrlKey && event.key === 'x') || (event.ctrlKey && event.key === 'c') || (event.ctrlKey && event.key === 'v');

            if (wordCount >= maxWords && !isAllowedKey) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
    @yield('scripts')

    <style>
        .animate-hidden {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }
        .animate-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const animatedElements = document.querySelectorAll('[data-animate]');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            animatedElements.forEach(el => {
                el.classList.add('animate-hidden');
                observer.observe(el);
            });
        });
    </script>

</body>
</html>