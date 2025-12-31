<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-Ovo font-bold text-gray-800 dark:text-white mb-4">GALERI KEGIATAN</h2>
            <p class="text-gray-500 dark:text-gray-400">Dokumentasi momen kebersamaan kelas Astrantia</p>
        </div>
        <div class="w-full md:w-96 relative mx-auto mb-16">
            <input wire:model.live.debounce.300ms="search" 
                type="text" 
                placeholder="Cari dokumentasi..." 
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
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galleries as $gallery)
                @php
                    $images = $gallery->images; 
                    $coverImage = (is_array($images) && count($images) > 0) ? $images[0] : null;
                    $count = is_array($images) ? count($images) : 0;
                @endphp
                <div class="group relative overflow-hidden rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 bg-gray-100 dark:bg-gray-800 aspect-[4/3] cursor-pointer"
                    onclick="openGalleryModal(@js($images), '{{ $gallery->title }}', '{{ $gallery->description }}')">
                    @if($coverImage)
                        <img src="{{ asset('storage/' . $coverImage) }}" 
                            alt="{{ $gallery->title }}" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-200 dark:bg-gray-700 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                    @endif
                    @if($count > 1)
                        <div class="absolute top-3 right-3 bg-black/60 backdrop-blur-sm text-white text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1 z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3">
                                <path fill-rule="evenodd" d="M1 5.25A2.25 2.25 0 013.25 3h13.5A2.25 2.25 0 0119 5.25v9.5A2.25 2.25 0 0116.75 17H3.25A2.25 2.25 0 011 14.75v-9.5zm1.5 5.81v3.69c0 .414.336.75.75.75h13.5a.75.75 0 00.75-.75v-2.69l-2.22-2.219a.75.75 0 00-1.06 0l-1.91 1.909.47.47a.75.75 0 11-1.06 1.06L6.53 8.091a.75.75 0 00-1.06 0l-2.97 2.97zM12 7a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
                            </svg>
                            {{ $count }}
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <h3 class="text-white font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75 leading-tight">
                            {{ $gallery->title }}
                        </h3>
                        @if($gallery->description)
                            <p class="text-gray-300 text-xs mt-2 line-clamp-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-100">
                                {{ $gallery->description }}
                            </p>
                        @endif
                        <p class="text-gray-400 text-[10px] mt-3 uppercase tracking-widest translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-150 font-bold">
                            {{ \Carbon\Carbon::parse($gallery->activity_date)->translatedFormat('d M Y') }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <div class="inline-block p-4 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-400 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Belum ada foto</h3>
                    <p class="text-gray-500 dark:text-gray-400">Dokumentasi akan segera ditambahkan.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-12">
            {{ $galleries->links() }}
        </div>
    </div>
    <div id="galleryModal" class="fixed inset-0 z-[100] hidden bg-black/95 flex flex-col items-center justify-center transition-opacity duration-300 opacity-0">
        <button onclick="closeGalleryModal()" class="absolute top-4 right-4 md:top-6 md:right-6 text-white/80 hover:text-white z-[110] p-2 bg-black/20 rounded-full backdrop-blur-sm transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 md:w-8 md:h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <button onclick="prevImage()" class="absolute left-2 md:left-8 top-1/2 -translate-y-1/2 p-3 md:p-4 text-white hover:text-white bg-black/30 hover:bg-black/50 backdrop-blur-md rounded-full transition z-[110] border border-white/10 group focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 md:w-8 md:h-8 group-hover:-translate-x-1 transition-transform">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>
        <div class="relative w-full h-full flex items-center justify-center p-4 md:p-20">
            <img id="modalImage" src="" alt="Gallery" 
                class="max-w-full max-h-[75vh] md:max-h-[85vh] object-contain rounded-lg shadow-2xl transition-all duration-300 select-none">
        </div>
        <button onclick="nextImage()" class="absolute right-2 md:right-8 top-1/2 -translate-y-1/2 p-3 md:p-4 text-white hover:text-white bg-black/30 hover:bg-black/50 backdrop-blur-md rounded-full transition z-[110] border border-white/10 group focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 md:w-8 md:h-8 group-hover:translate-x-1 transition-transform">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>
        <div class="absolute bottom-0 w-full p-6 md:p-8 bg-gradient-to-t from-black via-black/90 to-transparent text-center z-[105]">
            <h3 id="modalTitle" class="text-white text-lg md:text-2xl font-bold mb-2 tracking-wide font-Ovo"></h3>
            <p id="modalDesc" class="text-gray-300 text-xs md:text-sm max-w-3xl mx-auto line-clamp-2 md:line-clamp-none leading-relaxed"></p>
            <div id="modalCounter" class="text-gray-500 text-[10px] md:text-xs mt-3 uppercase tracking-[0.2em] font-mono border border-white/10 inline-block px-3 py-1 rounded-full bg-white/5"></div>
        </div>
    </div>

    <script>
        let currentImages = [];
        let currentIndex = 0;
        const modal = document.getElementById('galleryModal');
        const modalImg = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const modalDesc = document.getElementById('modalDesc');
        const modalCounter = document.getElementById('modalCounter');

        function openGalleryModal(images, title, desc) {
            if (!images || images.length === 0) return;
            
            currentImages = images;
            currentIndex = 0;
            
            modalTitle.innerText = title;
            modalDesc.innerText = desc || '';
            
            updateModalImage();
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);
            
            document.body.style.overflow = 'hidden';
        }

        function closeGalleryModal() {
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
                modalImg.src = '';
            }, 300);
        }

        function updateModalImage() {
            modalImg.style.opacity = '0.5';
            modalImg.style.transform = 'scale(0.98)';
            
            setTimeout(() => {
                modalImg.src = `/storage/${currentImages[currentIndex]}`;
                modalCounter.innerText = `${currentIndex + 1} / ${currentImages.length}`;
                
                modalImg.onload = () => { 
                    modalImg.style.opacity = '1'; 
                    modalImg.style.transform = 'scale(1)';
                };
            }, 150);
        }
        function nextImage() {
            if (currentImages.length <= 1) return;
            currentIndex = (currentIndex + 1) % currentImages.length;
            updateModalImage();
        }
        function prevImage() {
            if (currentImages.length <= 1) return;
            currentIndex = (currentIndex - 1 + currentImages.length) % currentImages.length;
            updateModalImage();
        }
        document.addEventListener('keydown', (e) => {
            if (modal.classList.contains('hidden')) return;
            if (e.key === 'Escape') closeGalleryModal();
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'ArrowLeft') prevImage();
        });
        modal.addEventListener('click', (e) => {
            if (e.target === modal || e.target.closest('.relative') === modal.firstElementChild) {
            }
        });
    </script>
</div>