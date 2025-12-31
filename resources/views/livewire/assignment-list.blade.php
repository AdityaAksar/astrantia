<div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-4xl font-Ovo font-bold text-gray-800 dark:text-white mb-4">DAFTAR TUGAS</h2>
            <p class="text-gray-500 dark:text-gray-400">Pantau tenggat waktu dan kumpulkan tugas tepat waktu</p>
        </div>
        <div class="w-full md:w-96 relative mx-auto mb-12">
            <input wire:model.live.debounce.300ms="search" 
                type="text" 
                placeholder="Cari tugas atau mata kuliah..." 
                class="w-full bg-white/60 backdrop-blur-xl pl-12 pr-4 py-3 rounded-full border border-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent shadow-sm transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
            <div wire:loading class="absolute right-4 top-1/2 -translate-y-1/2">
                <svg class="animate-spin h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>
        <div class="flex flex-col gap-4">
            @forelse($assignments as $task)
                <div class="w-full border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-md transition duration-300 overflow-hidden group">
                    <button onclick="toggleTask({{ $task->id }})" class="w-full text-left p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 focus:outline-none">
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
                                <span class="assignment-countdown font-bold tracking-wide" 
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
            @empty
                <div class="text-center py-20 rounded-2xl">
                    <div class="inline-block p-4 rounded-full bg-gray-50 dark:bg-gray-700/50 text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Tidak ada tugas ditemukan</h3>
                    <p class="text-gray-500 dark:text-gray-400">Coba kata kunci lain atau belum ada tugas baru.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $assignments->links() }}
        </div>
    </div>

    <script>
        function toggleTask(id) {
            const content = document.getElementById(`content-${id}`);
            const icon = document.getElementById(`icon-${id}`);
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }
        document.addEventListener('DOMContentLoaded', () => {
            const updateCountdowns = () => {
                const now = new Date().getTime();
                document.querySelectorAll('.assignment-countdown').forEach(el => {
                    const deadline = new Date(el.getAttribute('data-deadline')).getTime();
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
                    let text = '';
                    if(days > 0) text += `${days} Hari `;
                    text += `${hours} Jam ${minutes} Mnt ${seconds} Dtk`;
                    
                    el.innerHTML = text;
                });
            };

            setInterval(updateCountdowns, 1000);
            updateCountdowns();
        });
    </script>
</div>