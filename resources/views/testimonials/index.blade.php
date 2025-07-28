@extends('layout')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-white py-8 relative overflow-hidden">
        <div class="container mx-auto relative z-10">
            <div class="flex items-center justify-center mb-8 relative">
                <div class="text-center">
                    <h1 class="text-4xl md:text-4xl font-bold text-gray-800 mb-2">Testimonials</h1>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Logos Section -->
    <div class="py-4 bg-white border-t border-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Trusted by</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto"></div>
            </div>
            
            <div class="relative max-w-6xl mx-auto">
                <div class="swiper client-swiper">
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
                    <div class="swiper-button-prev !text-blue-500 !left-0"></div>
                    <div class="swiper-button-next !text-blue-500 !right-0"></div>
                </div>
            </div>
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
                                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-8 w-full max-w-sm relative border border-gray-100 h-full flex flex-col">

                                    <!-- Client logo -->
                                    <div class="mb-6 pt-4">
                                        @if(isset($testimonial->client) && !empty($testimonial->client->cLogo))
                                            <img src="data:image/png;base64,{{ base64_encode($testimonial->client->cLogo) }}"
                                                class="h-12 w-auto" alt="{{ $testimonial->client->cKeterangan ?? 'Client Logo' }}">
                                        @else
                                            
                                        @endif
                                    </div>

                                    <!-- Testimonial content -->
                                    <div class="flex-grow">
                                        <h3 class="text-lg font-bold text-gray-800 mb-4 leading-tight">"{{ $testimonial->cHeadline }}"</h3>
                                        <div class="text-gray-700 mb-6 leading-relaxed">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($testimonial->cTestimonial), 180) }}
                                            @if(strlen(strip_tags($testimonial->cTestimonial)) > 180)
                                                <button @click="openModal{{ $index }} = true" class="text-blue-500 hover:text-blue-600 font-medium ml-1 underline">
                                                    Read more
                                                </button>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Author info -->
                                    <div class="border-t border-gray-100 pt-6 mt-auto">
                                        <div class="flex items-start">
                                            <div class="text-sm">
                                                <div class="font-bold text-gray-800">{{ $testimonial->cNmLengkap }}</div>
                                                <div class="text-blue-600 font-medium">{{ $testimonial->cPosisi }}</div>
                                                <div class="text-gray-600">{{ $testimonial->cNmPerusahaan }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div x-show="openModal{{ $index }}" x-cloak 
                                     class="fixed inset-0 flex items-center justify-center z-50  backdrop-blur-sm"
                                     @click.away="openModal{{ $index }} = false">
                                    <div class="bg-white rounded-2xl shadow-2xl w-11/12 md:max-w-2xl p-8 relative max-h-[80vh] overflow-y-auto"
                                         @click.stop>
                                        <button @click="openModal{{ $index }} = false" 
                                                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl font-light w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
                                            &times;
                                        </button>
                                        
                                        <div class="mb-6">
                                            @if(isset($testimonial->client) && !empty($testimonial->client->cLogo))
                                                <img src="data:image/png;base64,{{ base64_encode($testimonial->client->cLogo) }}"
                                                    class="h-12 w-auto mb-4" alt="{{ $testimonial->client->cKeterangan ?? 'Client Logo' }}">
                                            @endif
                                            <h3 class="text-xl font-bold text-gray-800 mb-4">"{{ $testimonial->cHeadline }}"</h3>
                                        </div>
                                        
                                        <div class="prose prose-gray max-w-none">
                                            <p class="text-gray-700 leading-relaxed mb-6">{{ $testimonial->cTestimonial }}</p>
                                        </div>
                                        
                                        <div class="border-t border-gray-200 pt-6">
                                            <div class="flex items-start">
                                                <div>
                                                    <div class="font-bold text-gray-800">{{ $testimonial->cNmLengkap }}</div>
                                                    <div class="text-blue-600 font-medium">{{ $testimonial->cPosisi }}</div>
                                                    <div class="text-gray-600">{{ $testimonial->cNmPerusahaan }}</div>
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

<!-- Scripts -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
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

<style>
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
</style>
@endsection