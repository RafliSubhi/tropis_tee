<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Tropis Tee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div x-data="{ open: false }" class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <div :class="{'translate-x-0': open, '-translate-x-full': !open}" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-between mt-8 px-6">
                <div class="flex items-center">
                    <span class="text-white text-2xl mx-2 font-semibold">Tropis Tee Admin</span>
                </div>
                <button @click="open = false" class="lg:hidden text-white focus:outline-none">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
            <nav class="mt-10">
                <a class="flex items-center flex-wrap mt-4 py-2 px-4 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="ml-3 min-w-0">Dashboard</span>
                </a>
                <a class="flex items-center flex-wrap mt-4 py-2 px-4 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.articles.index') }}">
                    <i class="fas fa-newspaper"></i>
                    <span class="ml-3 min-w-0">Berita</span>
                </a>
                <a class="flex items-center flex-wrap mt-4 py-2 px-4 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-tshirt"></i>
                    <span class="ml-3 min-w-0">Produk</span>
                </a>
                <a class="flex items-center flex-wrap mt-4 py-2 px-4 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.testimonials.index') }}">
                    <i class="fas fa-comment"></i>
                    <span class="ml-3 min-w-0">Testimoni</span>
                </a>
                <a class="flex items-center flex-wrap mt-4 py-2 px-4 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.employees.index') }}">
                    <i class="fas fa-users"></i>
                    <span class="ml-3 min-w-0">Anggota</span>
                </a>
                <a class="flex items-center flex-wrap mt-4 py-2 px-4 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.profile.edit') }}">
                    <i class="fas fa-address-card"></i>
                    <span class="ml-3 min-w-0">Profil Website</span>
                </a>
                <a class="flex items-center flex-wrap mt-4 py-2 px-4 text-gray-300 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.admins.index') }}">
                    <i class="fas fa-user-shield"></i>
                    <span class="ml-3 min-w-0">Kelola Admin</span>
                </a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-green-500">
                <div class="flex items-center">
                    <button @click="open = !open" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="flex items-center">
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="relative flex items-center justify-center h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none bg-gray-700 text-white">
                            <span class="text-xl">{{ Auth::user()->name[0] }}</span>
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                        <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
                            <a href="{{ route('admin.account.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-500 hover:text-white">Ubah Email/Password</a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-500 hover:text-white">Logout</a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script>
        function updateCharCounter(element, maxChars, counterId) {
            const currentLength = element.value.length;
            const counter = document.getElementById(counterId);
            if (counter) {
                counter.textContent = currentLength + '/' + maxChars + ' karakter';
            }
        }

        // Word counter functions
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
</body>
</html>
