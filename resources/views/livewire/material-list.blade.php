<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-4xl font-Ovo font-bold text-gray-800 dark:text-white mb-4">MATERI KULIAH</h2>
            <p class="text-gray-500 dark:text-gray-400">Download bahan ajar dan modul perkuliahan</p>
        </div>
        <div class="w-full md:w-96 relative mx-auto mb-12">
            <input wire:model.live.debounce.300ms="search" 
                type="text" 
                placeholder="Cari judul atau mata kuliah..." 
                class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent shadow-sm transition">
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
    </div>
    <div class="flex flex-wrap justify-center items-stretch gap-6">
        @forelse($materials as $material)
            <div class="w-full md:w-[350px] bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm hover:shadow-md border border-gray-100 dark:border-gray-700 transition duration-300 flex flex-col animate-fade-in-up">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-indigo-50 dark:bg-indigo-900/30 rounded-xl text-indigo-600 dark:text-indigo-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-gray-400 bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full">
                        {{ $material->created_at->format('d M Y') }}
                    </span>
                </div>
                <div class="mb-6 flex-1">
                    <h3 class="text-xs font-bold tracking-wide uppercase text-indigo-500 mb-1">{{ $material->subject }}</h3>
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white leading-tight mb-2">{{ $material->title }}</h2>
                </div>
                <div class="pt-4 border-t border-gray-100 dark:border-gray-700 mt-auto">
                    <p class="text-xs font-semibold text-gray-400 uppercase mb-3">File Tersedia:</p>
                    <div class="space-y-2">
                        @if(is_array($material->file_path))
                            @foreach($material->file_path as $path)
                                <a href="{{ asset('storage/' . $path) }}" download target="_blank" class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 group transition">
                                    <div class="bg-red-100 dark:bg-red-900/30 p-1.5 rounded text-red-600 dark:text-red-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zM12.75 12a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V18a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V12z" clip-rule="evenodd" /></svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-300 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 truncate">Download File {{ $loop->iteration }}</span>
                                </a>
                            @endforeach
                        @elseif(is_string($material->file_path))
                            <a href="{{ asset('storage/' . $material->file_path) }}" download target="_blank" class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 group transition">
                                <div class="bg-red-100 dark:bg-red-900/30 p-1.5 rounded text-red-600 dark:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zM12.75 12a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V18a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V12z" clip-rule="evenodd" /></svg>
                                </div>
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-300 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 truncate">Download Dokumen</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="w-full text-center py-20">
                <p class="text-gray-500">Materi tidak ditemukan.</p>
            </div>
        @endforelse
    </div>
    <div class="mt-8">
        {{ $materials->links() }}
    </div>
</div>