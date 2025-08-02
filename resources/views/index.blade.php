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
    <div class="py-1 bg-white border-t border-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Trusted by</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto"></div>
            </div>
            
            <div class="relative max-w-6xl mx-auto">
                <div class="swiper client-swiper" data-swiper-options='{
                    "navigation": false
                }'>
                    <div class="swiper-wrapper items-center">
                        @foreach($clients as $client)
                            <div class="swiper-slide flex justify-center">
                                <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 p-6 flex flex-col items-center min-w-[160px] w-full max-w-[200px] border border-gray-100">
                                    <div class="w-full h-16 flex items-center justify-center mb-3">
                                        <img src="data:image/png;base64,{{ base64_encode($client->cLogo) }}" 
                                             class="object-contain max-w-full max-h-full" 
                                             alt="{{ $client->cKeterangan }}">
                                    </div>
                                    <span class="text-sm font-medium text-center text-gray-700 leading-tight">{{ $client->cKeterangan }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Videos Section -->
    <div class="py-8 bg-white border-t border-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Testimonial Videos</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
            </div>
            
            @if(isset($testimonialVideos) && $testimonialVideos->count() > 0)
                <div class="relative max-w-6xl mx-auto">
                    <div class="relative px-16">
                        <div class="swiper testimonialVideoSwiper">
                            <div class="swiper-wrapper">
                                @foreach ($testimonialVideos as $video)
                                    @php
                                        $videoId = Str::before($video->cLink, '?');
                                    @endphp
                                    <div class="swiper-slide flex justify-center pb-4">
                                        <div 
                                            class="bg-white rounded-xl shadow-lg overflow-hidden w-72 sm:w-80 h-72 cursor-pointer group hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-red-300 flex flex-col"
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

                        <div class="swiper-button-prev absolute left-4 top-1/2 -translate-y-1/2 z-20 text-gray-600"></div>
                        <div class="swiper-button-next absolute right-4 top-1/2 -translate-y-1/2 z-20 text-gray-600"></div>
                    </div>
                    
                    <!-- Testimonial Video Pagination -->
                    <div class="testimonial-video-swiper-pagination mt-8"></div>
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

            <div class="relative w-full max-w-7xl mx-auto">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper pb-12">
                        @foreach($testimonials as $index => $testimonial)
                            <div class="swiper-slide flex justify-center" x-data="{ openModal{{ $index }}: false }">
                                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 w-full max-w-sm relative border border-gray-100 flex flex-col" style="height: 440px;">

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
                                            <h3 class="text-lg font-bold text-gray-800 leading-tight line-clamp-3">"{{ $testimonial->cHeadline }}"</h3>
                                        </div>
                                        
                                        <!-- Testimonial text - Fixed height -->
                                        <div class="text-gray-700 mb-6 leading-relaxed h-28 overflow-hidden">
                                            <div class="testimonial-text">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($testimonial->cTestimonial), 120) }}
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
                                        <div class="flex items-start">
                                            <div class="text-sm">
                                                <div class="font-bold text-gray-800 line-clamp-1">{{ $testimonial->cNmLengkap }}</div>
                                                <div class="text-blue-600 font-medium line-clamp-1">{{ $testimonial->cPosisi }}</div>
                                                <div class="text-gray-600 line-clamp-1">{{ $testimonial->cNmPerusahaan }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Enhanced Mobile-Friendly Modal -->
                                <div x-show="openModal{{ $index }}" x-cloak 
                                     class="fixed inset-0 flex items-center justify-center z-50 backdrop-blur-sm px-4 sm:px-6"
                                     @click.away="openModal{{ $index }} = false">
                                    <!-- Mobile: Full screen on small devices, centered modal on larger -->
                                    <div class="bg-white rounded-2xl shadow-2xl w-full h-full sm:h-auto sm:max-w-2xl sm:max-h-[90vh] p-6 sm:p-8 relative overflow-y-auto"
                                         @click.stop>
                                        <!-- Close button -->
                                        <button @click="openModal{{ $index }} = false" 
                                                class="absolute top-4 right-4 z-10 text-gray-400 hover:text-gray-600 text-3xl sm:text-2xl font-light w-10 h-10 sm:w-8 sm:h-8 flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
                                            &times;
                                        </button>
                                        
                                        <!-- Modal content -->
                                        <div class="pt-8 sm:pt-0">
                                            <div class="mb-6">
                                                @if(isset($testimonial->client) && !empty($testimonial->client->cLogo))
                                                    <img src="data:image/png;base64,{{ base64_encode($testimonial->client->cLogo) }}"
                                                        class="h-12 w-auto mb-4" alt="{{ $testimonial->client->cKeterangan ?? 'Client Logo' }}">
                                                @endif
                                                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 leading-tight">"{{ $testimonial->cHeadline }}"</h3>
                                            </div>
                                            
                                            <div class="prose prose-gray max-w-none mb-6">
                                                <p class="text-gray-700 leading-relaxed text-base sm:text-lg">{{ $testimonial->cTestimonial }}</p>
                                            </div>
                                            
                                            <div class="border-t border-gray-200 pt-6">
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
        document.body.style.overflow = 'hidden';
    };

    window.closeVideoModal = function() {
        iframe.src = '';
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    };

    // Testimonial Video Swiper - only initialize if videos exist
    @if(isset($testimonialVideos) && $testimonialVideos->count() > 0)
    new Swiper('.testimonialVideoSwiper', {
        slidesPerView: 3,
        slidesPerGroup: 3, // Move 3 slides at once
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: '.testimonial-video-swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                slidesPerGroup: 1,
            },
            768: {
                slidesPerView: 2,
                slidesPerGroup: 2,
            },
            1024: {
                slidesPerView: 3,
                slidesPerGroup: 3,
            }
        }
    });
    @endif

    // Testimonials Swiper
    new Swiper('.testimonial-swiper', {
        loop: true,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.testimonial-swiper .swiper-button-next',
            prevEl: '.testimonial-swiper .swiper-button-prev',
        },
        pagination: {
            el: '.testimonial-swiper .swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        slidesPerView: 1,
        spaceBetween: 30,
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
        // Equal height cards
        watchSlidesProgress: true,
        on: {
            progress: function() {
                // Ensure equal heights
            }
        }
    });

    // Client Swiper
    new Swiper('.client-swiper', {
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.client-swiper .swiper-button-next',
            prevEl: '.client-swiper .swiper-button-prev',
        },
        slidesPerView: 2,
        breakpoints: {
            640: { slidesPerView: 3, spaceBetween: 30 },
            768: { slidesPerView: 4, spaceBetween: 30 },
            1024: { slidesPerView: 5, spaceBetween: 30 },
            1280: { slidesPerView: 6, spaceBetween: 30 },
        },
    });
});
</script>

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

/* Position arrows outside the swiper container */
.testimonial-swiper .swiper-button-prev,
.testimonial-swiper .swiper-button-next {
  top: 50% !important;
  transform: translateY(-50%);
  color: #2C2C2C !important;
  width: 44px;
  height: 44px;
  margin-top: 0;
  z-index: 10;
}

.testimonial-swiper .swiper-button-prev {
  left: -60px !important; /* Position outside left */
}

.testimonial-swiper .swiper-button-next {
  right: -60px !important; /* Position outside right */
}

/* For smaller screens, position arrows closer */
@media (max-width: 768px) {
  .testimonial-swiper .swiper-button-prev {
    left: -40px !important;
  }
  .testimonial-swiper .swiper-button-next {
    right: -40px !important;
  }
}

/* Regular swiper arrows */
.swiper-button-prev, .swiper-button-next {
  top: 50% !important;
  transform: translateY(-50%);
  color: #2C2C2C !important;
}

.swiper-pagination {
  position: static !important;
  margin-top: 1rem;
}

.swiper-pagination-bullets {
  display: flex;
  justify-content: center;
  margin-top: 1rem;
}

.swiper-pagination-bullet {
  background: #B0ADAD;
  opacity: 1;
}

.swiper-pagination-bullet-active {
  background: #2c2c2c;
}

.swiper-button-prev::after,
.swiper-button-next::after {
  color: #2C2C2C !important;
  font-size: 1.5rem;
}

/* Position client swiper arrows outside the container */
.client-swiper .swiper-button-prev,
.client-swiper .swiper-button-next {
  top: 50% !important;
  transform: translateY(-50%);
  color: #2C2C2C !important;
  width: 44px;
  height: 44px;
  margin-top: 0;
  z-index: 10;
}

.client-swiper .swiper-button-prev {
  left: -60px !important; /* Position outside left */
}

.client-swiper .swiper-button-next {
  right: -60px !important; /* Position outside right */
}

/* For smaller screens, position client arrows closer */
@media (max-width: 768px) {
  .client-swiper .swiper-button-prev {
    left: -40px !important;
  }
  .client-swiper .swiper-button-next {
    right: -40px !important;
  }
}

/* Custom pagination styles for testimonial videos */
.testimonial-video-swiper-pagination {
    text-align: center;
}

.testimonial-video-swiper-pagination .swiper-pagination-bullet {
    width: 8px;
    height: 8px;
    background: #d1d5db;
    opacity: 1;
    margin: 0 3px;
}

.testimonial-video-swiper-pagination .swiper-pagination-bullet-active {
    background: #3b82f6;
}

/* Add padding to testimonial container to accommodate external arrows */
.testimonial-container {
  padding: 0 80px;
}

/* Add padding to client container to accommodate external arrows */
.client-container {
  padding: 0 80px;
}

@media (max-width: 768px) {
  .testimonial-container {
    padding: 0 60px;
  }
  .client-container {
    padding: 0 60px;
  }
}

.trix-content ul {
    list-style-type: disc;
    margin-left: 1.5rem;
}

.trix-content ol {
    list-style-type: decimal;
    margin-left: 1.5rem;
}

/* Custom Swiper Styles */
.swiper-button-next,
.swiper-button-prev {
    width: 44px;
    height: 44px;
    background: white;
    border-radius: 50%;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
}

.swiper-button-next:after,
.swiper-button-prev:after {
    font-size: 16px;
    font-weight: bold;
}

.swiper-pagination-bullet {
    width: 12px;
    height: 12px;
    background: #d1d5db;
    opacity: 1;
}

.swiper-pagination-bullet-active {
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
    transform: scale(1.2);
}

/* Modal animations */
[x-cloak] {
    display: none !important;
}

/* Hover effects */
.swiper-slide .bg-white {
    transition: all 0.3s ease;
}

.swiper-slide .bg-white:hover {
    transform: translateY(-4px);
}

/* Mobile-specific modal improvements */
@media (max-width: 640px) {
    .fixed.inset-0.flex.items-center.justify-center {
        align-items: flex-start;
        padding-top: 0;
    }
    
    /* Full screen modal on mobile with proper scrolling */
    .bg-white.rounded-2xl.shadow-2xl {
        border-radius: 0 !important;
        max-height: none !important;
        height: 100vh !important;
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
    }
    
    /* Adjust close button for mobile */
    .absolute.top-4.right-4 {
        top: 1rem;
        right: 1rem;
        position: sticky; /* Keep close button visible while scrolling */
        z-index: 20;
    }
    
    /* Ensure modal content has proper padding for scrolling */
    .pt-8.sm\\:pt-0 {
        padding-top: 3rem !important;
        padding-bottom: 2rem !important;
    }
}


/* Improve readability on mobile */
@media (max-width: 480px) {
    .text-xl.sm\\:text-2xl {
        font-size: 1.25rem !important;
        line-height: 1.4;
    }
    
    .text-base.sm\\:text-lg {
        font-size: 1rem !important;
        line-height: 1.6;
    }
}
</style>
@endsection