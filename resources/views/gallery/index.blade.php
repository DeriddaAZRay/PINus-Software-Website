@extends('layout')
@section('content')
<div class="relative min-h-screen">
    <div class="container mx-auto relative">
        <div class="w-full bg-white/80 backdrop-blur-md border border-white/30 min-h-screen">
            <div class="relative z-10 bg-gradient-to-b from-white/90 via-white/80 to-white/70 backdrop-blur-sm">
                <!-- Header -->
                <div class="bg-white py-8 relative overflow-hidden">
                    <img src="{{ asset('images/title-bg-left.png') }}" alt=""
                        class="h-24 md:h-32 absolute top-1/2 left-0 transform -translate-y-1/2 opacity-80 z-0">

                    <img src="{{ asset('images/title-bg-right.png') }}" alt=""
                        class="h-24 md:h-32 absolute top-1/2 right-0 transform -translate-y-1/2 opacity-80 z-0">

                    <div class="container mx-auto relative z-10">
                        <div class="flex items-center justify-center mb-8 relative">
                            <div class="text-center">
                                <h1 class="text-4xl md:text-4xl font-bold text-gray-800 mb-2">Gallery</h1>
                                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="mx-6 md:mx-12 mb-6">
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                            <p class="text-green-700">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mx-6 md:mx-12 mb-6">
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                            <p class="text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Gallery Content -->
                <div class="px-6 py-6 md:px-12 md:py-8">
                    @if($galleries->count() > 0)
                        <!-- Gallery Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                            @foreach($galleries as $gallery)
                                <div class="group relative bg-white/70 backdrop-blur-sm rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                                    <!-- Image Container -->
                                    <div class="relative aspect-square overflow-hidden">
                                        <img 
                                            src="{{ route('gallery.image', $gallery->ID) }}" 
                                            alt="{{ $gallery->cJudul }}"
                                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                                            loading="lazy"
                                        >
                                        <!-- Overlay on hover -->
                                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                            <button 
                                                onclick="openModal('{{ route('gallery.image', $gallery->ID) }}', '{{ $gallery->cJudul }}')"
                                                class="bg-white/20 backdrop-blur-sm border border-white/30 text-white px-4 py-2 rounded-lg hover:bg-white/30 transition-colors duration-200"
                                            >
                                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                                View
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Title -->
                                    <div class="p-4">
                                        <h3 class="font-medium text-gray-800 text-center line-clamp-2 leading-tight">
                                            {{ $gallery->cJudul }}
                                        </h3>
                                        @if($gallery->dTgl_Input)
                                            <p class="text-xs text-gray-500 text-center mt-2">
                                                {{ $gallery->dTgl_Input->format('M d, Y') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-16">
                            <div class="max-w-md mx-auto">
                                <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-gray-200 to-gray-300 rounded-full flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-medium text-gray-800 mb-2">No Gallery Items</h3>
                                <p class="text-gray-600 mb-6">
                                    There are no gallery items to display at the moment.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Image Preview -->
<div id="imageModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="relative w-full max-w-4xl max-h-[90vh] flex flex-col items-center justify-center">

        <!-- Close Button -->
        <button 
            onclick="closeModal()"
            class="absolute -top-4 -right-4 bg-white/20 backdrop-blur-sm border border-white/30 text-white w-10 h-10 rounded-full hover:bg-white/30 transition-colors duration-200 z-10"
        >
            <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Image (no background container) -->
        <img 
            id="modalImage" 
            src="" 
            alt="" 
            class="max-h-[70vh] w-auto object-contain rounded-md"
        >

        <!-- Fully rounded title background -->
        <div class="w-full bg-white/90 backdrop-blur-sm rounded-lg px-6 py-4 mt-4 max-h-[20vh] overflow-y-auto">
            <h3 id="modalTitle"
                class="text-lg font-medium text-gray-800 text-left break-words whitespace-normal leading-snug"
                style="word-break: break-word; overflow-wrap: break-word;">
            </h3>
        </div>
    </div>
</div>

<script>
function openModal(imageSrc, title) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    
    modalImage.src = imageSrc;
    modalImage.alt = title;
    modalTitle.textContent = title;
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside the image
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection