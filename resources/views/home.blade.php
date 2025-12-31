@extends('layouts.app')

@section('content')
    <style>
        @keyframes marqueeScroll {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .marquee-inner {
            animation: marqueeScroll 40s linear infinite;
        }
        .marquee-reverse {
            animation-direction: reverse;
        }
        .marquee-paused:hover .marquee-inner {
            animation-play-state: paused;
        }
    </style>

    {{-- CONTENT --}}
    <main>
        {{-- HERO SECTION --}}
        <div class="w-11/12 max-w-3xl text-center mx-auto pt-40 pb-20 flex flex-col items-center gap-6">
            <img src="{{ asset('images/Astrantia Logo.jpg') }}" alt="Profile" class="rounded-full w-32 shadow-lg border-4 border-white dark:border-gray-700" />
            
            <h1 class="text-2xl sm:text-4xl lg:text-[40px] leading-tight font-Ovo font-bold text-gray-800 dark:text-white">
                Astrantia
            </h1>
            <h3 class="flex items-end gap-2 text-xl md:text-2xl font-Ovo font-medium text-gray-900 dark:text-white">
                wherever we stand; we are one; since we were born.
            </h3>
            
            <div class="flex flex-col gap-6 text-gray-600 dark:text-gray-300">
                <p class="max-w-2xl mx-auto font-Ovo text-base md:text-lg leading-relaxed">
                    Astrantia merupakan kelas Sistem Informasi Kelas A di Universitas Tadulako. Kelas ini menjadi wadah pembelajaran akademik dan pengembangan kolaborasi mahasiswa dalam bidang sistem informasi, teknologi, dan pemecahan masalah berbasis digital. Astrantia menjunjung tinggi semangat kebersamaan, inovasi, dan profesionalisme dalam setiap kegiatan akademik maupun non-akademik.
                </p>
            </div>
            
            {{-- SOCIAL & QUICK LINKS --}}
            <div class="flex flex-col sm:flex-row items-center gap-4 mt-4">
                <a href="https://www.instagram.com/si.astrantia/" target="_blank"
                    class="px-10 py-2.5 border rounded-full bg-gradient-to-r from-[#b820e6] to-[#da7d20] text-white flex items-center gap-2 dark:border-transparent">
                    <span class="[&>svg]:h-7 [&>svg]:w-7 [&>svg]:fill-[#c13584]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                    </svg>
                    </span>
                    Instagram
                </a>
            </div>
            <h4 class="text-2xl font-Ovo font-semibold text-gray-800 dark:text-white mt-10">
                Akses Cepat
            </h4>
            <p class="text-gray-600 dark:text-gray-300 text-sm">
                Menu utama untuk mengakses informasi kelas Astrantia
            </p>
            <div class="flex flex-col sm:flex-row items-center gap-4 mt-4">
                <a href="{{ route('member') }}" class="px-10 py-2.5 border rounded-full bg-[#2a1b45] text-white flex items-center gap-2 dark:border-transparent">
                    Anggota <img src="{{ asset('images/right-arrow-white.png') }}" alt="" class="w-4">
                </a>
                <a href="{{ route('schedules') }}" class="px-10 py-2.5 border rounded-full bg-[#2a1b45] text-white flex items-center gap-2 dark:border-transparent">
                    Jadwal <img src="{{ asset('images/right-arrow-white.png') }}" alt="" class="w-4">
                </a>
                <a href="{{ route('materials') }}" class="px-10 py-2.5 border rounded-full bg-[#2a1b45] text-white flex items-center gap-2 dark:border-transparent">
                    Materi <img src="{{ asset('images/right-arrow-white.png') }}" alt="" class="w-4">
                </a>
                <a href="{{ route('assignments') }}" class="px-10 py-2.5 border rounded-full bg-[#2a1b45] text-white flex items-center gap-2 dark:border-transparent">
                    Tugas <img src="{{ asset('images/right-arrow-white.png') }}" alt="" class="w-4">
                </a>
                <a href="#" class="px-10 py-2.5 border rounded-full bg-[#2a1b45] text-white flex items-center gap-2 dark:border-transparent">
                    Galeri <img src="{{ asset('images/right-arrow-white.png') }}" alt="" class="w-4">
                </a>
            </div>
        </div>

        {{-- ABOUT SECTION --}}
        <div id="about" class="w-full px-[12%] py-10 scroll-mt-20">
            <h2 class="text-center text-5xl font-Ovo">TENTANG</h2>
            <div class="flex w-full flex-col lg:flex-row items-center gap-20 my-20">
                <div class="max-w-max mx-auto relative"><img src="{{ asset('images/Astrantia.jfif') }}" alt="" class="w-64 sm:w-80 rounded-3xl max-w-none">
                    <div class="bg-white w-1/2 aspect-square absolute right-0 bottom-0 rounded-full translate-x-1/4 translate-y-1/3 shadow-[0_4px_55px_rgba(149,0,162,0.15)] flex items-center justify-center">
                        <img src="{{ asset('images/Astrantia Logo.jpg') }}" alt="" class="w-full rounded-full p-4">
                    </div>
                </div>
                <div class="flex-1">
                    <p class="mb-10 max-w-2xl font-Ovo">Nama Astrantia melambangkan keteguhan, pertumbuhan, dan kebersamaan. Seperti bunga astrantia yang mampu tumbuh kuat di berbagai kondisi, kelas Astrantia diharapkan menjadi komunitas mahasiswa yang adaptif, saling mendukung, dan terus berkembang dalam menghadapi tantangan akademik maupun teknologi.</p>
                    <ul class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-2xl">
                        <li class="border border-gray-300 dark:border-white/30 rounded-xl p-6 cursor-pointer hover:bg-lightHover hover:-translate-y-1 duration-500 hover:shadow-black dark:hover:shadow-white/80 dark:hover:bg-darkHover/50">
                            <h3 class="font-semibold text-gray-700 dark:text-white">Angkatan</h3>
                            <p class="text-gray-600 text-sm dark:text-white/80">2023</p>
                        </li>
                        <li class="border border-gray-300 dark:border-white/30 rounded-xl p-6 cursor-pointer hover:bg-lightHover hover:-translate-y-1 duration-500 hover:shadow-black dark:hover:shadow-white/80 dark:hover:bg-darkHover/50">
                            <h3 class="font-semibold text-gray-700 dark:text-white">Kelas</h3>
                            <p class="text-gray-600 text-sm dark:text-white/80">Sistem Informasi A</p>
                        </li>
                        <li class="border border-gray-300 dark:border-white/30 rounded-xl p-6 cursor-pointer hover:bg-lightHover hover:-translate-y-1 duration-500 hover:shadow-black dark:hover:shadow-white/80 dark:hover:bg-darkHover/50">
                            <h3 class="font-semibold text-gray-700 dark:text-white">Program Studi</h3>
                            <p class="text-gray-600 text-sm dark:text-white/80">S1 Sistem Informasi</p>
                        </li>
                        <li class="border border-gray-300 dark:border-white/30 rounded-xl p-6 cursor-pointer hover:bg-lightHover hover:-translate-y-1 duration-500 hover:shadow-black dark:hover:shadow-white/80 dark:hover:bg-darkHover/50">
                            <h3 class="font-semibold text-gray-700 dark:text-white">Jurusan</h3>
                            <p class="text-gray-600 text-sm dark:text-white/80">Teknologi Informasi</p>
                        </li>
                        <li class="border border-gray-300 dark:border-white/30 rounded-xl p-6 cursor-pointer hover:bg-lightHover hover:-translate-y-1 duration-500 hover:shadow-black dark:hover:shadow-white/80 dark:hover:bg-darkHover/50">
                            <h3 class="font-semibold text-gray-700 dark:text-white">Fakultas</h3>
                            <p class="text-gray-600 text-sm dark:text-white/80">Fakultas Teknik</p>
                        </li>
                        <li class="border border-gray-300 dark:border-white/30 rounded-xl p-6 cursor-pointer hover:bg-lightHover hover:-translate-y-1 duration-500 hover:shadow-black dark:hover:shadow-white/80 dark:hover:bg-darkHover/50">
                            <h3 class="font-semibold text-gray-700 dark:text-white">Universitas</h3>
                            <p class="text-gray-600 text-sm dark:text-white/80">Universitas Tadulako</p>
                        </li>
                    </ul>
                    <ul class="flex items-center gap-3 sm:gap-5 mt-10">
                        <li class="flex items-center justify-center w-12 sm:w-14 aspect-square border border-gray-300 dark:border-white/30 rounded-lg cursor-pointer hover:-translate-y-1 duration-500">
                            <img src="{{ asset('images/Universitas Tadulako.jfif') }}" alt="vscode" class="w-5 sm:w-7">
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- INFO CEPAT / JADWAL SECTION --}}
        <div>
            <h2 class="text-center text-5xl font-Ovo">INFO CEPAT</h2>
            <section id="jadwal" class="flex flex-col items-center justify-center py-10 px-4">
                <h4 class="text-2xl font-Ovo font-semibold text-gray-800 dark:text-white mt-4 mb-2 text-center">
                    Jadwal Hari Ini <br>({{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }})
                </h4>
                @if($schedules->isEmpty())
                    <div class="flex flex-col items-center justify-center text-center py-10 animate-fade-in my-6">
                        <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-full mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white">Tidak Ada Jadwal Hari Ini</h3>
                        <p class="text-gray-500 dark:text-gray-400 mt-2">Silakan istirahat atau kerjakan tugas!</p>
                    </div>
                @else
                    <div class='flex flex-wrap justify-center gap-6 w-full max-w-8xl'>
                        @foreach($schedules as $schedule)
                            <div class='group relative bg-white dark:bg-gray-800 w-full md:w-[380px] rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl'>
                                <div class="h-2 w-full bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500"></div>
                                <div class="p-7">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-200">
                                            Kelas {{ $schedule->class }}
                                        </span>
                                        <div class="flex items-center gap-1.5 text-gray-500 dark:text-gray-400 text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-orange-500">
                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $schedule->start_time }} - {{ $schedule->end_time }}
                                        </div>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2 leading-tight group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">
                                        {{ $schedule->subject }}
                                    </h3>
                                    <div class="flex items-center gap-2 mb-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-400">
                                            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-base text-gray-600 dark:text-gray-300 font-medium">Ruang {{ $schedule->room }}</span>
                                    </div>
                                    <div class="w-full h-px bg-gray-100 dark:bg-gray-700 mb-5"></div>
                                    <div>
                                        <p class="text-xs text-gray-400 uppercase font-semibold tracking-wider mb-3">Dosen Pengampu</p>
                                        <div class="space-y-3">
                                            @foreach($schedule->lecturers as $lecturer)
                                                <div class="flex items-center gap-3">
                                                    <div class="w-9 h-9 shrink-0 rounded-full bg-indigo-100 dark:bg-gray-700 border border-indigo-200 dark:border-gray-600 flex items-center justify-center text-xs font-bold text-indigo-700 dark:text-indigo-300 shadow-sm">
                                                        {{ strtoupper(substr($lecturer, 0, 2)) }}
                                                    </div>
                                                    <span class="text-sm text-gray-700 dark:text-gray-300 font-medium leading-tight">
                                                        {{ $lecturer }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>

            {{-- TUGAS SECTION --}}
            <section class="flex flex-col md:flex-row items-center justify-center md:items-start gap-8 max-md:px-4 w-full max-w-4xl mx-auto">
                <div id="tugas" class="w-full mt-20"> 
                    <h4 class="text-2xl font-Ovo font-semibold text-gray-800 dark:text-white text-center mb-10">
                        Tugas & Deadline
                    </h4>
                    <div class="flex flex-col items-center gap-4 w-full max-w-4xl mx-auto">
                        @if($assignments->isEmpty())
                            <div class="flex flex-col items-center justify-center text-center py-16 animate-fade-in w-full">
                                <div class="bg-green-50 dark:bg-gray-800 p-6 rounded-full mb-6 ring-1 ring-green-100 dark:ring-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-green-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white">Hore! Tidak Ada Tugas</h3>
                                <p class="text-gray-500 dark:text-gray-400 mt-2 max-w-md mx-auto">
                                    Nikmati waktu luangmu atau pelajari materi mendatang!
                                </p>
                            </div>
                        @else
                            @foreach($assignments as $task)
                                <div class="w-full border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-md transition duration-300 overflow-hidden">
                                    <button onclick="toggleTask({{ $task->id }})" class="w-full text-left p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 focus:outline-none group">
                                        <div class="flex-1 w-full">
                                            <div class="flex flex-wrap items-center gap-3 mb-1">
                                                <h3 class="text-lg font-bold text-gray-800 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                                    {{ $task->title }}
                                                </h3>
                                                @if(\Carbon\Carbon::parse($task->deadline)->isPast())
                                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-red-100 text-red-800 border border-red-200">BERAKHIR</span>
                                                @else
                                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-800 border border-emerald-200">AKTIF</span>
                                                @endif
                                            </div>
                                            <div class="text-indigo-600 dark:text-indigo-400 font-medium text-sm mb-3">
                                                {{ $task->course }}
                                            </div>
                                            <div class="flex items-center gap-2 text-xs font-medium text-red-500 bg-red-50 dark:bg-red-900/20 w-fit px-3 py-1.5 rounded-lg border border-red-100 dark:border-red-800/30">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 animate-pulse">
                                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="text-gray-500 dark:text-gray-400">Sisa Waktu:</span>
                                                <span class="task-countdown font-bold tracking-wide" 
                                                    data-deadline="{{ \Carbon\Carbon::parse($task->deadline)->toIso8601String() }}">
                                                    Menghitung...
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4 w-full md:w-auto justify-between md:justify-end mt-2 md:mt-0 pl-0 md:pl-4 md:border-l border-gray-100 dark:border-gray-700">
                                            <div class="text-left md:text-right">
                                                <p class="text-[10px] text-gray-400 uppercase font-semibold tracking-wider mb-0.5">Tenggat</p>
                                                <div class="flex items-center gap-1.5 text-xs text-gray-600 dark:text-gray-300 font-medium whitespace-nowrap">
                                                    {{ \Carbon\Carbon::parse($task->deadline)->translatedFormat('d F, H:i') }} WIB
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 dark:bg-gray-700 p-2 rounded-full group-hover:bg-indigo-50 dark:group-hover:bg-indigo-900/50 transition-colors">
                                                <svg id="icon-{{ $task->id }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 text-gray-400 group-hover:text-indigo-500 transition-transform duration-300">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </div>
                                        </div>
                                    </button>
                                    <div id="content-{{ $task->id }}" class="hidden px-6 pb-6 border-t border-gray-100 dark:border-gray-700 bg-gray-50/30 dark:bg-gray-800/30">
                                        <div class="mt-4 text-gray-600 dark:text-gray-300 text-sm prose dark:prose-invert max-w-none">
                                            <p class="text-xs text-gray-400 font-bold uppercase mb-2">Deskripsi / Instruksi:</p>
                                            {!! nl2br(e($task->description)) !!}
                                        </div>
                                        @if((!empty($task->file_path) && is_array($task->file_path)) || $task->submission_link)
                                            <div class="flex flex-col sm:flex-row gap-3 mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                                                @if(!empty($task->file_path) && is_array($task->file_path))
                                                    @foreach($task->file_path as $path)
                                                        <a href="{{ asset('storage/' . $path) }}" download target="_blank" class="flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-bold text-indigo-700 bg-white border border-indigo-200 hover:bg-indigo-50 rounded-xl transition shadow-sm dark:bg-gray-800 dark:text-indigo-400 dark:border-gray-600 dark:hover:bg-gray-700">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                                <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zM12.75 12a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V18a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V12z" clip-rule="evenodd" />
                                                            </svg>
                                                            Unduh Lampiran {{ $loop->count > 1 ? $loop->iteration : '' }}
                                                        </a>
                                                    @endforeach
                                                @endif
                                                @if($task->submission_link)
                                                    <a href="{{ $task->submission_link }}" target="_blank" class="flex items-center justify-center gap-2 px-6 py-2.5 text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                                        </svg>
                                                        Kumpul Tugas
                                                    </a>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
            {{-- Anggota Section --}}
            <section id="anggota" class="w-full pt-28 pb-10 mt-20">
                <h2 class="text-center text-4xl font-Ovo font-bold text-gray-800 dark:text-white mb-4">ANGGOTA KELAS</h2>
                <p class="text-center text-gray-500 dark:text-gray-400 mb-12">Keluarga besar Astrantia</p>

                <div class="marquee-paused marquee-row w-full mx-auto max-w-full overflow-hidden relative mb-8">
                    <div class="absolute left-0 top-0 h-full w-20 z-10 pointer-events-none bg-gradient-to-r from-gray-50 dark:from-gray-900 to-transparent"></div>
                    <div class="marquee-inner flex transform-gpu min-w-[200%] gap-6" id="row1"></div>
                    <div class="absolute right-0 top-0 h-full w-20 z-10 pointer-events-none bg-gradient-to-l from-gray-50 dark:from-gray-900 to-transparent"></div>
                </div>

                <div class="marquee-paused marquee-row w-full mx-auto max-w-full overflow-hidden relative">
                    <div class="absolute left-0 top-0 h-full w-20 z-10 pointer-events-none bg-gradient-to-r from-gray-50 dark:from-gray-900 to-transparent"></div>
                    <div class="marquee-inner marquee-reverse flex transform-gpu min-w-[200%] gap-6" id="row2"></div>
                    <div class="absolute right-0 top-0 h-full w-20 z-10 pointer-events-none bg-gradient-to-l from-gray-50 dark:from-gray-900 to-transparent"></div>
                </div>
            </section>
            {{-- GALERI SECTION --}}
            <section id="galeri" class="w-full pt-20 pb-20">
                <h2 class="text-center text-4xl font-Ovo font-bold text-gray-800 dark:text-white mb-12">GALERI</h2>
                <div class="overflow-hidden w-full relative max-w-6xl mx-auto marquee-paused">
                    <div class="absolute left-0 top-0 h-full w-20 z-10 pointer-events-none bg-gradient-to-r from-white dark:from-gray-900 to-transparent"></div>
                    <div id="gallery-track" class="marquee-inner flex w-fit" style="animation: marqueeScroll 30s linear infinite;">
                    </div>
                    <div class="absolute right-0 top-0 h-full w-20 md:w-40 z-10 pointer-events-none bg-gradient-to-l from-white dark:from-gray-900 to-transparent"></div>
                </div>
            </section>
        </div>
    </main>

    <script>
        function toggleTask(id) {
            const content = document.getElementById(`content-${id}`);
            const icon = document.getElementById(`icon-${id}`);
            
            // Toggle Hidden Class
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180'); // Putar ikon ke atas
            } else {
                content.classList.add('hidden');
                icon.classList.remove('rotate-180'); // Kembalikan ikon
            }
        }
        
        const dbStudents = @json($students);

        const cardsData = dbStudents.map(student => ({
            image: student.photo ? `/storage/${student.photo}` : 'https://ui-avatars.com/api/?name=' + encodeURIComponent(student.name),
            name: student.name,
            quote: student.quote || 'Mahasiswa Sistem Informasi'
        }));

        const row1 = document.getElementById('row1');
        const row2 = document.getElementById('row2');

        const createCard = (card) => `
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl mx-2 shadow-sm border border-gray-100 dark:border-gray-700 w-72 shrink-0 flex flex-col items-center text-center transition-transform hover:scale-105 duration-300">
                <img class="size-16 rounded-full mb-4 object-cover border-2 border-indigo-500" src="${card.image}" alt="${card.name}">
                <h3 class="font-bold text-lg text-gray-900 dark:text-white">${card.name}</h3>
                <div class="w-8 h-1 bg-indigo-500 rounded-full my-3"></div>
                <p class="text-sm text-gray-500 dark:text-gray-400 italic">"${card.quote}"</p>
            </div>
        `;

        const renderCards = (target) => {
            let sourceData = cardsData;
            if (cardsData.length > 0 && cardsData.length < 10){
                sourceData = [...cardsData, ...cardsData, ...cardsData];
            }
            sourceData.forEach(card => target.insertAdjacentHTML('beforeend', createCard(card)));
            // const doubled = [...cardsData, ...cardsData, ...cardsData];
            // doubled.forEach(card => target.insertAdjacentHTML('beforeend', createCard(card)));
        };

        if(row1 && row2 && cardsData.length > 0){
            renderCards(row1);
            renderCards(row2);
        }

        const dbGalleries = @json($galleries);

        const galleryData = dbGalleries.map(item=> ({
            title: item.title,
            image: item.image ? `/storage/${item.image}` : 'https://via.placeholder.com/600x400?text=No+Image',
        }))

        const galleryTrack = document.getElementById('gallery-track');

        const createGalleryCard = (item) => `
            <div class="w-56 mx-4 h-[20rem] relative group hover:scale-90 transition-all duration-300 shrink-0 rounded-xl overflow-hidden cursor-pointer shadow-md">
                <img src="${item.image}" alt="${item.title}" class="w-full h-full object-cover" />
                <div class="flex items-center justify-center px-4 opacity-0 group-hover:opacity-100 transition-all duration-300 absolute bottom-0 backdrop-blur-md left-0 w-full h-full bg-black/40">
                    <p class="text-white text-lg font-semibold text-center">${item.title}</p>
                </div>
            </div>
        `;

        if (galleryTrack && galleryData.length > 0) {
            const galleryDoubled = [...galleryData, ...galleryData, ...galleryData]; 
            galleryDoubled.forEach(item => {
                galleryTrack.insertAdjacentHTML('beforeend', createGalleryCard(item));
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const countdownElements = document.querySelectorAll('.task-countdown');
            const updateCountdowns = () => {
                const now = new Date().getTime();
                countdownElements.forEach(el => {
                    const deadlineStr = el.getAttribute('data-deadline');
                    const deadline = new Date(deadlineStr).getTime();
                    const distance = deadline - now;
                    if (distance < 0) {
                        el.innerHTML = "Waktu Habis";
                        el.classList.add('text-red-700');
                        return;
                    }

                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    el.innerHTML = `${days} Hari ${hours} Jam ${minutes} Menit ${seconds} Detik`;
                });
            };

            setInterval(updateCountdowns, 1000);
            
            updateCountdowns();
        });
    </script>
</body>
</html>