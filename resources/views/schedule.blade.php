@extends('layouts.app')

@section('content')
    <main class="pt-40 pb-20 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-Ovo font-bold text-gray-800 dark:text-white mb-4">JADWAL KULIAH</h2>
                <p class="text-gray-500 dark:text-gray-400">Cari jadwal kuliah berdasarkan hari dan kelas</p>
            </div>
            <div class="max-w-4xl mx-auto mb-16">
                <form action="{{ route('schedules') }}" method="GET" class="bg-white/50 backdrop-blur-xl dark:bg-gray-800 p-4 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col sm:flex-row gap-4 items-center justify-center">
                    <div class="w-full sm:w-1/3">
                        <select name="day" class="w-full rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 py-2.5 px-4 text-sm">
                            <option value="">Semua Hari</option>
                            @foreach($daysOrder as $d)
                                <option value="{{ $d }}" {{ request('day') == $d ? 'selected' : '' }}>{{ $d }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full sm:w-1/3">
                        <select name="class" class="w-full rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 py-2.5 px-4 text-sm">
                            <option value="">Semua Kelas</option>
                            @foreach($classes as $c)
                                <option value="{{ $c }}" {{ request('class') == $c ? 'selected' : '' }}>Kelas {{ $c }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-2 w-full sm:w-auto">
                        <button type="submit" class="flex-1 sm:flex-none bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition shadow-md shadow-indigo-200 dark:shadow-none">
                            Cari
                        </button>
                        @if(request()->hasAny(['day', 'class']))
                            <a href="{{ route('schedules') }}" class="flex-1 sm:flex-none bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-4 py-2.5 rounded-xl text-sm font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition text-center">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="w-full space-y-16"> 
                @php $hasSchedule = false; @endphp
                @foreach($daysOrder as $day)
                    @if(isset($groupedSchedules[$day]))
                        @php $hasSchedule = true; @endphp
                        <div class="relative w-full animate-fade-in-up">
                            <div class="flex items-center justify-center mb-8">
                                <div class="px-8 py-2 rounded-full bg-white/50 backdrop-blur-xl dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm">
                                    <h3 class="text-xl font-bold text-indigo-600 dark:text-indigo-400">{{ $day }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-center gap-6">
                                @foreach($groupedSchedules[$day] as $schedule)
                                    <div class='group relative bg-white dark:bg-gray-800 w-full md:w-[350px] shrink-0 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl'>
                                        <div class="h-2 w-full bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500"></div>
                                        <div class="p-6">
                                            <div class="flex justify-between items-start mb-4">
                                                <span class="px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-200">
                                                    Kelas {{ $schedule->class }}
                                                </span>
                                                <div class="flex items-center gap-1.5 text-gray-500 dark:text-gray-400 text-sm font-medium">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-orange-500">
                                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                                                    </svg>
                                                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                                </div>
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 leading-tight group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">
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
                        </div>
                    @endif
                @endforeach
                @if(!$hasSchedule)
                    <div class="text-center py-20">
                        <div class="inline-flex bg-gray-100 dark:bg-gray-800 p-4 rounded-full mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white">Jadwal Tidak Ditemukan</h3>
                        <p class="text-gray-500 mt-2">Coba ganti filter hari atau kelas lainnya.</p>
                        <a href="{{ route('schedules') }}" class="inline-block mt-4 text-indigo-600 hover:text-indigo-500 font-medium">Reset Filter</a>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection