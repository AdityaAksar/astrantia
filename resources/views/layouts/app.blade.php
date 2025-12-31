<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Astrantia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-Outfit leading-8 bg-white dark:bg-gray-900 text-gray-900 dark:text-white relative">
    {{-- BACKGROUND IMAGE --}}
    <div class="fixed inset-0 -z-10 opacity-50 dark:opacity-20">
        <img src="{{ asset('images/bg-new.jfif') }}" alt="" class="w-full h-full object-cover" />
    </div>

    {{-- NAVBAR CONTAINER --}}
    <div class="fixed top-0 left-0 right-0 z-50 flex justify-center py-4 px-4">
        <header class="relative flex items-center justify-between px-6 py-3 md:py-4 shadow-sm max-w-5xl rounded-full mx-auto w-full bg-white/70 dark:bg-gray-800/70 backdrop-blur-md border border-white/40 dark:border-gray-700">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('images/Astrantia Logo.jpg') }}" class="h-10 w-10 rounded-full" alt="Astrantia Logo">
                <span class="font-bold text-lg text-gray-800 dark:text-white">Astrantia</span>
            </a>
            <nav class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center gap-8 text-gray-900 dark:text-gray-200 text-sm font-medium">
                <a class="hover:text-indigo-600 dark:hover:text-indigo-400 transition" href="{{ route('home') }}">Beranda</a>
                <a class="hover:text-indigo-600 dark:hover:text-indigo-400 transition" href="{{ route('member') }}">Anggota</a>
                <a class="hover:text-indigo-600 dark:hover:text-indigo-400 transition" href="{{ route('schedules') }}">Jadwal</a>
                <a class="hover:text-indigo-600 dark:hover:text-indigo-400 transition" href="{{ route('materials') }}">Materi</a>
                <a class="hover:text-indigo-600 dark:hover:text-indigo-400 transition" href="{{ route('assignments') }}">Tugas</a>
                <a class="hover:text-indigo-600 dark:hover:text-indigo-400 transition" href="{{ route('galleries') }}">Galeri</a>
            </nav>
            <div class="flex items-center md:hidden">
                <button id="openMenu" class="text-gray-600 dark:text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </header>
    </div>

    {{-- MOBILE MENU --}}
    <div id="mobileMenu" class="fixed inset-0 z-[60] bg-white/50 dark:bg-gray-900 w-full h-screen transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col items-center justify-center gap-8 backdrop-blur-md">
        <button id="closeMenuBtn" class="absolute top-8 right-8 text-gray-600 dark:text-white p-2">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <a class="text-2xl font-medium text-gray-800 dark:text-white hover:text-indigo-600" href="{{ route('home') }}">Beranda</a>
        <a class="text-2xl font-medium text-gray-800 dark:text-white hover:text-indigo-600" href="{{ route('member') }}">Anggota</a>
        <a class="text-2xl font-medium text-gray-800 dark:text-white hover:text-indigo-600" href="{{ route('schedules') }}">Jadwal</a>
        <a class="text-2xl font-medium text-gray-800 dark:text-white hover:text-indigo-600" href="{{ route('materials') }}">Materi</a>
        <a class="text-2xl font-medium text-gray-800 dark:text-white hover:text-indigo-600" href="{{ route('assignments') }}">Tugas</a>
        <a class="text-2xl font-medium text-gray-800 dark:text-white hover:text-indigo-600" href="{{ route('galleries') }}">Galeri</a>
    </div>

    @yield('content')

    {{-- Footer Section --}}
    <footer class="w-full bg-gradient-to-b from-[#F1EAFF] to-[#FFFFFF] text-gray-800 mt-0">
        <div class="max-w-7xl mx-auto px-6 py-5 flex flex-col items-center">
            <div class="flex items-center space-x-3 mb-6">
                <img alt="" class="h-11 rounded-full"
                    src="{{ asset('images/Astrantia Logo.jpg') }}"/>
                    Astrantia
            </div>
            <p class="text-center max-w-xl text-sm font-normal leading-relaxed">
                wherever we stand; we are one; since we were born.
            </p>
        </div>
        <div class="border-t border-slate-200">
            <div class="max-w-7xl mx-auto px-6 py-6 text-center text-sm font-normal">
                Astrantia ©2025. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        const openMenuBtn = document.getElementById('openMenu');
        const closeMenuBtn = document.getElementById('closeMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileLinks = mobileMenu.querySelectorAll('a');
        
        openMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('translate-x-full');
            mobileMenu.classList.remove('translate-x-full');
        });

        closeMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('translate-x-full');
        });
        
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('translate-x-full');
            });
        });
        
    </script>
</body>
</html>