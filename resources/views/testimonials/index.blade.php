@extends('layout')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-white py-8 relative overflow-hidden">
        <div class="container mx-auto relative z-10">
            <div class="flex items-center justify-center mb-2 relative">
                <div class="text-center">
                    <h1 class="text-4xl md:text-4xl font-bold text-gray-800 mb-2">Testimonials</h1>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Logos Section -->
    <div class="py-12 bg-white border-t border-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Trusted by</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto"></div>
            </div>
            
            <!-- Client Swiper Container -->
            <div class="relative max-w-6xl mx-auto px-4 sm:px-8">
                <div class="swiper client-swiper">
                    <div class="swiper-wrapper items-center">
                        @foreach($clients as $client)
                            <div class="swiper-slide flex justify-center">
                                <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 p-4 sm:p-6 flex flex-col items-center min-w-[120px] sm:min-w-[160px] w-full max-w-[150px] sm:max-w-[200px] border border-gray-100 mx-auto">
                                    <div class="w-full h-12 sm:h-16 flex items-center justify-center mb-2 sm:mb-3">
                                        <img src="data:image/png;base64,{{ base64_encode($client->cLogo) }}" 
                                             class="object-contain max-w-full max-h-full" 
                                             alt="{{ $client->cKeterangan }}">
                                    </div>
                                    <span class="text-xs sm:text-sm font-medium text-center text-gray-700 leading-tight">{{ $client->cKeterangan }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Custom Navigation Arrows for Client Swiper -->
                <div class="client-swiper-button-prev absolute left-0 top-1/2 -translate-y-1/2 z-20 cursor-pointer">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-gray-600 hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </div>
                <div class="client-swiper-button-next absolute right-0 top-1/2 -translate-y-1/2 z-20 cursor-pointer">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-gray-600 hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Videos Section -->
    <div class="py-12 bg-white border-t border-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Testimonial Videos</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
            </div>
            
            @if(isset($testimonialVideos) && $testimonialVideos->count() > 0)
                <div class="relative max-w-6xl mx-auto">
                    <div class="relative px-8 sm:px-16">
                        <div class="swiper testimonialVideoSwiper">
                            <div class="swiper-wrapper">
                                @foreach ($testimonialVideos as $video)
                                    @php
                                        $videoId = Str::before($video->cLink, '?');
                                    @endphp
                                    <div class="swiper-slide flex justify-center pb-4">
                                        <div 
                                            class="bg-white rounded-xl shadow-lg overflow-hidden w-full max-w-[280px] sm:w-72 sm:max-w-80 h-72 cursor-pointer group hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-red-300 flex flex-col mx-auto"
                                            onclick="openVideoModal('{{ $videoId }}')"
                                        >
                                            <div class="relative w-full flex-shrink-0" style="padding-top: 56.25%;">
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
                                            <div class="p-4 text-left flex-1 flex flex-col h-20">
                                                <h3 class="text-base font-semibold mb-1 line-clamp-2">{{ $video->cJudul }}</h3>
                                                <p class="text-sm text-gray-600 line-clamp-2 flex-1">{{ $video->cDeskripsi }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Video arrows - hide on mobile when only 1 video -->
                        <div class="testimonial-video-swiper-button-prev absolute left-0 sm:left-4 top-1/2 -translate-y-1/2 z-20 cursor-pointer @if($testimonialVideos->count() <= 1) hidden sm:block @endif">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-gray-600 hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </div>
                        <div class="testimonial-video-swiper-button-next absolute right-0 sm:right-4 top-1/2 -translate-y-1/2 z-20 cursor-pointer @if($testimonialVideos->count() <= 1) hidden sm:block @endif">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-gray-600 hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Testimonial Video Pagination -->
                    <div class="testimonial-video-swiper-pagination mt-6 flex justify-center"></div>
                </div>
            @else
                <!-- Empty State for Testimonial Videos -->
                <div class="text-center py-8">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-gray-200 to-gray-300 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-medium text-gray-800 mb-2">No Video Testimonials</h3>
                        <p class="text-gray-600 mb-6">
                            There are no video testimonials available at the moment.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Hear our client's testimonials</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
            </div>

            <!-- Testimonial Swiper Container -->
            <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-8">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper pb-8">
                        @foreach($testimonials as $index => $testimonial)
                            <div class="swiper-slide" x-data="{ openModal{{ $index }}: false }">
                                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 w-full max-w-sm mx-auto relative border border-gray-100 flex flex-col" style="height: 440px;">

                                    <!-- Client logo - Fixed height section -->
                                    <div class="mb-6 pt-4 h-16 flex items-center flex-shrink-0">
                                        @if(isset($testimonial->client) && !empty($testimonial->client->cLogo))
                                            <img src="data:image/png;base64,{{ base64_encode($testimonial->client->cLogo) }}"
                                                class="h-12 w-auto" alt="{{ $testimonial->client->cKeterangan ?? 'Client Logo' }}">
                                        @endif
                                    </div>

                                    <!-- Testimonial content - Fixed sections -->
                                    <div class="flex flex-col">
                                        <!-- Headline - Fixed height -->
                                        <div class="mb-4 h-16 flex items-start">
                                            <h3 class="text-lg font-bold text-gray-800 leading-tight line-clamp-3 text-left">"{{ $testimonial->cHeadline }}"</h3>
                                        </div>
                                        
                                        <!-- Testimonial text - Fixed height -->
                                        <div class="text-gray-700 mb-6 leading-relaxed h-28 overflow-hidden text-left">
                                            <div class="testimonial-text">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($testimonial->cTestimonial), 100) }}
                                                @if(strlen(strip_tags($testimonial->cTestimonial)) > 120)
                                                    <button @click="openModal{{ $index }} = true" class="text-blue-500 hover:text-blue-600 font-medium ml-1 underline">
                                                        Read more
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Author info - Fixed height section -->
                                    <div class="border-t border-gray-100 pt-6 mt-auto flex-shrink-0 h-20 mb-2">
                                        <div class="flex items-start text-left">
                                            <div class="text-sm">
                                                <div class="font-bold text-gray-800 line-clamp-1">{{ $testimonial->cNmLengkap }}</div>
                                                <div class="text-blue-600 font-medium line-clamp-1">{{ $testimonial->cPosisi }}</div>
                                                <div class="text-gray-600 line-clamp-1">{{ $testimonial->cNmPerusahaan }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Structure -->
                                <div x-show="openModal{{ $index }}" x-cloak 
                                    class="modal-overlay"
                                    @click.self="openModal{{ $index }} = false">
                                    
                                    <div class="modal-container" @click.stop>
                                        <!-- Close button -->
                                        <button @click="openModal{{ $index }} = false" 
                                                class="modal-close">
                                            &times;
                                        </button>
                                        
                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <div class="mb-6 text-left">
                                                @if(isset($testimonial->client) && !empty($testimonial->client->cLogo))
                                                    <img src="data:image/png;base64,{{ base64_encode($testimonial->client->cLogo) }}"
                                                        class="h-12 w-auto mb-4" alt="{{ $testimonial->client->cKeterangan ?? 'Client Logo' }}">
                                                @endif
                                                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 leading-tight text-left">"{{ $testimonial->cHeadline }}"</h3>
                                            </div>
                                            
                                            <div class="prose prose-gray max-w-none mb-6 text-left">
                                                <p class="text-gray-700 leading-relaxed text-base sm:text-lg text-left">{{ $testimonial->cTestimonial }}</p>
                                            </div>
                                            
                                            <div class="border-t border-gray-200 pt-6 text-left">
                                                <div class="flex items-start">
                                                    <div>
                                                        <div class="font-bold text-gray-800 text-base sm:text-lg">{{ $testimonial->cNmLengkap }}</div>
                                                        <div class="text-blue-600 font-medium text-sm sm:text-base">{{ $testimonial->cPosisi }}</div>
                                                        <div class="text-gray-600 text-sm sm:text-base">{{ $testimonial->cNmPerusahaan }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Custom Navigation Arrows for Testimonial Swiper - Now visible on mobile too -->
                <div class="testimonial-swiper-button-prev absolute left-0 top-1/2 -translate-y-1/2 z-20 cursor-pointer">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-gray-600 hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </div>
                <div class="testimonial-swiper-button-next absolute right-0 top-1/2 -translate-y-1/2 z-20 cursor-pointer">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-gray-600 hover:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
                
                <!-- Pagination -->
                <div class="testimonial-swiper-pagination mt-6 flex justify-center"></div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="py-16 bg-white">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Share Your Experience</h2>
                <p class="text-gray-600 text-lg mb-8">
                    Have you worked with us? We'd love to hear about your experience and share your success story.
                </p>
                <a href="{{ route('testimonials.create') }}" 
                   class="inline-flex items-center bg-gradient-to-r from-blue-500 to-blue-500 hover:from-blue-600 hover:to-blue-600 text-white font-bold py-4 px-8 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                    Write A Testimonial for Us
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Video Modal --}}
<div id="videoModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden px-4">
  <div class="bg-white rounded-lg overflow-hidden shadow-lg w-full max-w-4xl relative">
    <button onclick="closeVideoModal()" class="absolute top-2 right-2 text-gray-700 hover:text-red-500 text-3xl font-bold z-10 bg-white rounded-full w-10 h-10 flex items-center justify-center">&times;</button>
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

<!-- Scripts -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Keep track of original body styles for modal handling
    let originalBodyStyle = '';
    
    // Function to prevent body scroll
    function preventBodyScroll() {
        originalBodyStyle = document.body.style.cssText;
        const scrollY = window.scrollY;
        document.body.style.position = 'fixed';
        document.body.style.top = `-${scrollY}px`;
        document.body.style.width = '100%';
        document.body.classList.add('modal-open');
    }
    
    // Function to restore body scroll
    function restoreBodyScroll() {
        document.body.classList.remove('modal-open');
        const scrollY = document.body.style.top;
        document.body.style.cssText = originalBodyStyle;
        window.scrollTo(0, parseInt(scrollY || '0') * -1);
    }

    // Video modal functions
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('videoModalIframe');

    document.addEventListener('click', function (e) {
        if (e.target === modal) {
            closeVideoModal();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeVideoModal();
        }
    });

    window.openVideoModal = function(videoId) {
        iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
        modal.classList.remove('hidden');
        preventBodyScroll();
    };

    window.closeVideoModal = function() {
        iframe.src = '';
        modal.classList.add('hidden');
        restoreBodyScroll();
    };

    // Enhanced Alpine.js modal handling
    document.addEventListener('alpine:init', () => {
        Alpine.data('modalHandler', (index) => ({
            open: false,
            
            openModal() {
                this.open = true;
                preventBodyScroll();
                
                // Focus management for accessibility
                this.$nextTick(() => {
                    const modal = this.$el.querySelector('.modal-container');
                    if (modal) {
                        modal.focus();
                    }
                });
            },
            
            closeModal() {
                this.open = false;
                restoreBodyScroll();
            },
            
            init() {
                // Handle escape key
                this.$el.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && this.open) {
                        this.closeModal();
                    }
                });
            }
        }));
    });

    // Testimonial Video Swiper - only initialize if videos exist
    @if(isset($testimonialVideos) && $testimonialVideos->count() > 0)
    new Swiper('.testimonialVideoSwiper', {
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 15,
        loop: true,
        speed: 300,
        centeredSlides: true,
        pagination: {
            el: '.testimonial-video-swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.testimonial-video-swiper-button-next',
            prevEl: '.testimonial-video-swiper-button-prev',
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
                slidesPerGroup: 1,
                spaceBetween: 20,
                centeredSlides: true,
            },
            640: {
                slidesPerView: 2,
                slidesPerGroup: 1,
                spaceBetween: 20,
                centeredSlides: false,
            },
            768: {
                slidesPerView: 2,
                slidesPerGroup: 2,
                spaceBetween: 20,
                centeredSlides: false,
            },
            1024: {
                slidesPerView: 3,
                slidesPerGroup: 3,
                spaceBetween: 20,
                centeredSlides: false,
            }
        }
    });
    @endif

    // Client Swiper
    const clientSwiper = new Swiper('.client-swiper', {
        spaceBetween: 15,
        loop: true,
        speed: 300,
        navigation: {
            nextEl: '.client-swiper-button-next',
            prevEl: '.client-swiper-button-prev',
        },
        slidesPerView: 2,
        grabCursor: true,
        breakpoints: {
            480: { 
                slidesPerView: 2, 
                spaceBetween: 15 
            },
            640: { 
                slidesPerView: 3, 
                spaceBetween: 20 
            },
            768: { 
                slidesPerView: 4, 
                spaceBetween: 25 
            },
            1024: { 
                slidesPerView: 5, 
                spaceBetween: 30 
            },
            1280: { 
                slidesPerView: 6, 
                spaceBetween: 30 
            },
        },
    });

    // Testimonials Swiper
    const testimonialSwiper = new Swiper('.testimonial-swiper', {
        loop: true,
        speed: 300,
        navigation: {
            nextEl: '.testimonial-swiper-button-next',
            prevEl: '.testimonial-swiper-button-prev',
        },
        pagination: {
            el: '.testimonial-swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        slidesPerView: 1,
        spaceBetween: 30,
        grabCursor: true,
        breakpoints: {
            768: { 
                slidesPerView: 2,
                spaceBetween: 30 
            },
            1024: { 
                slidesPerView: 2,
                spaceBetween: 40 
            },
            1280: { 
                slidesPerView: 3,
                spaceBetween: 40 
            }
        },
        watchSlidesProgress: true,
    });
});
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<style>
.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Modal Styles */
.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(4px);
    z-index: 50;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
}

.modal-container {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    width: 100%;
    max-width: 42rem;
    max-height: 90vh;
    position: relative;
    margin: auto;
    overflow: hidden;
}

.modal-content {
    overflow-y: auto;
    max-height: calc(90vh - 2rem);
    padding: 1.5rem;
    -webkit-overflow-scrolling: touch;
}

.modal-close {
    position: absolute;
    top: 1rem;
    right: 1rem;
    z-index: 60;
    background: white;
    border-radius: 50%;
    width: 2.5rem;
    height: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    color: #6b7280;
    font-size: 1.5rem;
    font-weight: 300;
    border: none;
    cursor: pointer;
    transition: all 0.2s;
}

.modal-close:hover {
    color: #374151;
    background: #f9fafb;
}

.modal-open {
    overflow: hidden;
    position: fixed;
    width: 100%;
    height: 100%;
}

/* Arrow Styles */
.client-swiper-button-prev svg,
.client-swiper-button-next svg,
.testimonial-swiper-button-prev svg,
.testimonial-swiper-button-next svg,
.testimonial-video-swiper-button-prev svg,
.testimonial-video-swiper-button-next svg {
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
}

/* Card hover effects */
.swiper-slide .bg-white {
    transition: all 0.3s ease;
}

.swiper-slide .bg-white:hover {
    transform: translateY(-4px);
}

/* Swiper pagination styles */
.swiper-pagination {
    position: relative !important;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
}

.swiper-pagination-bullet {
    background: #d1d5db !important;
    opacity: 1 !important;
    width: 8px !important;
    height: 8px !important;
    margin: 0 4px !important;
    transition: all 0.3s ease !important;
}

.swiper-pagination-bullet-active {
    background: linear-gradient(135deg, #3b82f6, #06b6d4) !important;
    transform: scale(1.2) !important;
}

[x-cloak] {
    display: none !important;
}

/* Mobile modal improvements */
@media (max-width: 640px) {
    .modal-overlay {
        padding: 0;
        align-items: stretch;
    }
    
    .modal-container {
        border-radius: 0;
        max-height: 100vh;
        height: 100vh;
        max-width: none;
        margin: 0;
        display: flex;
        flex-direction: column;
    }
    
    .modal-content {
        flex: 1;
        overflow-y: auto;
        max-height: none;
        padding: 4rem 1.5rem 2rem;
        -webkit-overflow-scrolling: touch;
    }
    
    .modal-close {
        position: fixed;
        top: 1rem;
        right: 1rem;
        z-index: 70;
        width: 3rem;
        height: 3rem;
        font-size: 1.75rem;
    }
}
</style>
@endsection