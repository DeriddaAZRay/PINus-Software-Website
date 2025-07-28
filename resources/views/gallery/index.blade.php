@extends('layout')
@section('content')
<div class="relative min-h-screen w-full">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="w-full bg-white/80 backdrop-blur-md border border-white/30 min-h-screen">
            <div class="relative z-10 bg-gradient-to-b from-white/90 via-white/80 to-white/70 backdrop-blur-sm">
                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="mx-4 sm:mx-6 md:mx-12 mb-4 sm:mb-6">
                        <div class="bg-green-50 border-l-4 border-green-500 p-3 sm:p-4 rounded-r-lg">
                            <p class="text-green-700 text-sm sm:text-base">{{ session('success') }}</p>
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

                <!-- Photo Carousel Section -->
                @if($galleries->count() > 0)
                <section id="photos-section" class="bg-white py-16 px-6">
                    <div class="container mx-auto text-center">
                        <h2 class="text-3xl font-bold mb-4">Photo Gallery</h2>
                        <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-8"></div>

                        <div class="relative max-w-6xl mx-auto">
                            <div class="relative px-16">
                                <div class="swiper photoSwiper">
                                    <div class="swiper-wrapper">
                                        @php
                                            $chunkedGalleries = $galleries->chunk(4);
                                        @endphp
                                        @foreach ($chunkedGalleries as $galleryChunk)
                                            <div class="swiper-slide">
                                                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                                                    @foreach($galleryChunk as $gallery)
                                                        <div class="group relative bg-white/70 backdrop-blur-sm rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden cursor-pointer">
                                                            <!-- Image Container -->
                                                            <div class="relative aspect-square overflow-hidden"
                                                                 onclick="openModal('{{ route('gallery.image', $gallery->ID) }}', '{{ $gallery->cJudul }}')">
                                                                <img 
                                                                    src="{{ route('gallery.image', $gallery->ID) }}" 
                                                                    alt="{{ $gallery->cJudul }}"
                                                                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                                                                    loading="lazy"
                                                                >
                                                                <!-- Overlay on hover -->
                                                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                                                    <div class="bg-white/20 backdrop-blur-sm border border-white/30 text-white px-3 py-2 rounded-lg hover:bg-white/30 transition-colors duration-200">
                                                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                                        </svg>
                                                                        View
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Title -->
                                                            <div class="p-3">
                                                                <h3 class="font-medium text-gray-800 text-center text-sm line-clamp-2 leading-tight">
                                                                    {{ $gallery->cJudul }}
                                                                </h3>
                                                                @if($gallery->dTgl_Input)
                                                                    <p class="text-xs text-gray-500 text-center mt-1">
                                                                        {{ $gallery->dTgl_Input->format('M d, Y') }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination mt-8"></div>
                                </div>

                                <div class="swiper-button-prev photo-prev absolute left-4 top-1/2 -translate-y-1/2 z-20 text-gray-600"></div>
                                <div class="swiper-button-next photo-next absolute right-4 top-1/2 -translate-y-1/2 z-20 text-gray-600"></div>
                            </div>
                        </div>
                    </div>
                </section>
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

{{-- Videos Section --}}
<section id="videos-section" class="bg-white py-16 px-6">
  <div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold mb-4">Video Gallery</h2>
    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>

    <div class="relative max-w-6xl mx-auto">
      <div class="relative px-16">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            @foreach ($videos as $video)
              @php
                $videoId = Str::before($video->cLink, '?');
              @endphp
              <div class="swiper-slide flex justify-center">
                <div 
                  class="bg-white rounded-xl shadow-lg overflow-hidden w-72 sm:w-80 cursor-pointer group hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-red-300"
                  onclick="openVideoModal('{{ $videoId }}')"
                >
                  <div class="relative w-full" style="padding-top: 56.25%;">
                    <img 
                      src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg"
                      alt="Video thumbnail"
                      class="absolute top-0 left-0 w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                      <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                      </svg>
                    </div>
                  </div>
                  <div class="p-4 text-left">
                    <h3 class="text-lg font-semibold mb-1">{{ $video->cJudul }}</h3>
                    <p class="text-sm text-gray-600">{{ $video->cDeskripsi }}</p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="swiper-pagination mt-8"></div>
        </div>

        <div class="swiper-button-prev absolute left-4 top-1/2 -translate-y-1/2 z-20 text-gray-600"></div>
        <div class="swiper-button-next absolute right-4 top-1/2 -translate-y-1/2 z-20 text-gray-600"></div>
      </div>
    </div>
  </div>
</section>

{{-- Video Modal --}}
<div id="videoModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-lg overflow-hidden shadow-lg max-w-3xl w-full relative">
    <button onclick="closeVideoModal()" class="absolute top-2 right-2 text-gray-700 hover:text-red-500 text-2xl font-bold">&times;</button>
      <div class="relative w-full" style="padding-top: 56.25%;">
        <iframe
          id="videoModalIframe"
          class="absolute top-0 left-0 w-full h-full"
          src=""
          frameborder="0"
          allow="autoplay"
          allowfullscreen
        ></iframe>
      </div>
  </div>
</div>

<script>
// Initialize Swiper for photos
document.addEventListener('DOMContentLoaded', function() {
    // Photo Swiper
    const photoSwiper = new Swiper('.photoSwiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 10000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.photoSwiper .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.photo-next',
            prevEl: '.photo-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 1,
            },
        }
    });

    // Video Swiper (autoplay removed)
    const videoSwiper = new Swiper('.mySwiper', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        centeredSlides: true,
        loop: true,
        pagination: {
            el: '.mySwiper .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                centeredSlides: true,
            },
            768: {
                slidesPerView: 2,
                centeredSlides: true,
            },
            1024: {
                slidesPerView: 3,
                centeredSlides: true,
            },
        }
    });
});

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

// Video modal functions
function openVideoModal(videoId) {
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('videoModalIframe');
    
    iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeVideoModal() {
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('videoModalIframe');
    
    iframe.src = '';
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
}
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Custom styles for photo carousel navigation */
.photo-prev, .photo-next {
    color: #4B5563 !important;
}

.photo-prev:hover, .photo-next:hover {
    color: #1F2937 !important;
}
</style>
@endsection