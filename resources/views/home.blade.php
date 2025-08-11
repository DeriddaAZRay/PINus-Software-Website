@extends('layout')

@section('content')

{{-- Hero Section --}}
<section class="bg-white text-center px-0 py-0">
  <div class="relative bg-cover bg-center min-h-[500px] px-12 py-16" style="background-image: url('{{asset('/images/hero-bg.png')}}');">
    
    <div class="absolute inset-0 bg-white bg-opacity-70"></div>

    <div class="relative z-10 container mx-auto">
      <h1 class="text-4xl font-bold mb-4">PINus Software</h1>
      <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
      <p class="text-lg font-semibold max-w-2xl mx-auto mb-6">
        At PT. Performa Inti Nusantara, we are more than just a software provider,
        we are your partner in building smart, efficient, and integrated systems tailored to your business needs.
      </p>
      <div class="flex justify-center gap-4">
        <a 
          href="{{ url('/about/history') }}" 
          class="inline-flex items-center bg-white/20 backdrop-blur-sm border border-gray/50 text-gray-800 font-semibold px-8 py-3 rounded-lg hover:bg-white/30 transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-white/20 shadow-md hover:shadow-lg"
        >
          About Us
        </a>
        <a 
          href="#videos-section" 
          class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-red-300"
        >
          Watch Video
        </a>
      </div>
      <img src="{{asset('/images/logo-footer.webp')}}" alt="PINus Logo" class="mx-auto mt-10 h-52">
    </div>
  </div>
</section>


{{-- Why Choose Section --}}
<section style="background-color: #F2F2F2" class="bg-gray-50 py-16 px-10">
  <div class="container mx-auto text-center">
    <h2 class="text-2xl font-bold mb-12">WHY CHOOSE <span class="text-red-600">PINUS SOFTWARE?</span></h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
        <img src="{{asset('/icons/flexible.png')}}" class="mx-auto h-12 mb-2">
        <h3 class="font-bold text-red-600">Modular & Flexible</h3>
        <p class="text-sm text-gray-600">Each module can be implemented individually or fully integrated.</p>
      </div>
      <div>
        <img src="{{asset('/icons/custom.png')}}" class="mx-auto h-12 mb-2">
        <h3 class="font-bold text-red-600">Consultation & Customization</h3>
        <p class="text-sm text-gray-600">We provide IT consulting and tailored feature development.</p>
      </div>
      <div>
        <img src="{{asset('/icons/trust.png')}}" class="mx-auto h-12 mb-2">
        <h3 class="font-bold text-red-600">Experienced & Trusted</h3>
        <p class="text-sm text-gray-600">Over 15 years of experience across clinics, pharmacies, factories.</p>
      </div>
      <div>
        <img src="{{asset('/icons/motto.png')}}" class="mx-auto h-12 mb-2">
        <h3 class="font-bold text-red-600">Our Motto: Provide Better Performance</h3>
        <p class="text-sm text-gray-600">Helping your business operate faster and more efficiently.</p>
      </div>
    </div>
    <div class="text-center mt-8">
      <a 
        href="{{ route('products.index') }}" 
        class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-red-300"
      >
        Our Products
        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
    </div>
  </div>
</section>

{{-- Videos Section --}}
<section id="videos-section" class="bg-white py-8 px-6">
  <div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold mb-4">Videos</h2>
    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>

    <div class="relative max-w-6xl mx-auto">
      <div class="relative px-16">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            @foreach ($videos as $video)
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
      
      <!-- Video Pagination moved outside and below -->
      <div class="homepage-video-pagination mt-8"></div>
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

{{-- Photo Gallery Section --}}
<section id="photos-section" class="bg-white py-8 px-6">
  <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold mb-4">Photo Gallery</h2>
      <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-8"></div>

      <!-- Photo Carousel with Mobile-Friendly Layout -->
      <div class="relative max-w-6xl mx-auto">
          <div class="relative px-4 sm:px-16">
              <div class="swiper photoSwiper">
                  <div class="swiper-wrapper">
                      @php
                          $chunkedGalleries = $galleries->chunk(4);
                      @endphp
                      @foreach ($chunkedGalleries as $galleryChunk)
                          <div class="swiper-slide">
                              <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 pb-4">
                                  @foreach($galleryChunk as $gallery)
                                      <!-- Photo Card with Instagram 4:5 Aspect Ratio -->
                                      <div class="group relative bg-white/70 backdrop-blur-sm rounded-lg shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden cursor-pointer flex flex-col">
                                          <!-- Image Container with 4:5 aspect ratio -->
                                          <div class="relative w-full aspect-[4/5] overflow-hidden"
                                                onclick="openModal('{{ route('gallery.image', $gallery->ID) }}', '{{ $gallery->cJudul }}')">
                                              <img 
                                                  src="{{ route('gallery.image', $gallery->ID) }}" 
                                                  alt="{{ $gallery->cJudul }}"
                                                  class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                                                  loading="lazy"
                                              >
                                              <!-- Overlay on hover -->
                                              <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                                  <div class="bg-white/20 backdrop-blur-sm border border-white/30 text-white px-2 py-1 sm:px-3 sm:py-2 rounded-lg hover:bg-white/30 transition-colors duration-200">
                                                      <svg class="w-3 h-3 sm:w-4 sm:h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                      </svg>
                                                      <span class="text-xs sm:text-sm">View</span>
                                                  </div>
                                              </div>
                                          </div>
                                          
                                          <!-- Title - Responsive Height -->
                                          <div class="p-2 sm:p-3 h-14 sm:h-16 flex-shrink-0 flex flex-col justify-center">
                                              <h3 class="font-medium text-gray-800 text-center text-xs sm:text-sm line-clamp-2 leading-tight">
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
              </div>

              <!-- Navigation arrows with responsive positioning -->
              <div class="swiper-button-prev photo-prev absolute left-0 sm:left-4 top-1/2 -translate-y-1/2 z-20 text-gray-600"></div>
              <div class="swiper-button-next photo-next absolute right-0 sm:right-4 top-1/2 -translate-y-1/2 z-20 text-gray-600"></div>
          </div>
          
          <!-- Photo Pagination moved outside and below -->
          <div class="photo-swiper-pagination mt-6 sm:mt-8"></div>
      </div>
  </div>
</section>

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

{{-- Carousel Clients --}}
<section class="bg-gray-100 py-10 px-4 overflow-hidden">
  {{-- Heading --}}
  <div class="container mx-auto mb-8">
    <h2 class="text-3xl font-bold text-center mb-4">Our Clients</h2>
    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
  </div>

  {{-- Logos Scroll Row --}}
  <div class="overflow-hidden relative">
    <div class="flex items-center justify-center space-x-10 animate-scroll-x whitespace-nowrap">
      @foreach ($clients as $client)
        <img src="data:image/png;base64,{{ base64_encode($client->cLogo) }}" class="h-12 inline-block" alt="Client Logo">
      @endforeach
      @foreach ($clients as $client)
        <img src="data:image/png;base64,{{ base64_encode($client->cLogo) }}" class="h-12 inline-block" alt="Client Logo">
      @endforeach
    </div>
      <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-gray-100 to-transparent pointer-events-none"></div>
      <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-gray-100 to-transparent pointer-events-none"></div>
  </div>

  {{-- Button --}}
    <div class="text-center mt-12">
      <a 
        href="{{ url('/testimonials') }}" 
        class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-blue-300"
        aria-label="View Testimonials"
      >
        View Testimonials
        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
    </div>
</section>

{{-- Articles Section --}}
<section class="bg-gray-50 py-20 px-6">
  <div class="container mx-auto max-w-7xl">
    <!-- Section Header -->
    <div class="text-center mb-16">
      <h2 class="text-4xl font-bold text-gray-900 mb-4">Latest Articles</h2>
      <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-6"></div>
    </div>  
    
    <!-- Articles Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
      @if(isset($articles) && $articles->isNotEmpty())
        @foreach($articles->take(3) as $article)
          <article class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
            <!-- Article Image -->
            <div class="relative overflow-hidden">
              <img 
                src="{{ $article->image }}"
                alt="{{ $article->title }}" 
                class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300"
              >
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            
            <!-- Article Content -->
            <div class="p-6">
              <a href="{{ route('articles.show', $article->ID) }}" class="block group-link">
                <h3 class="font-bold text-xl text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors duration-200">
                  {{ $article->title }}
                </h3>
              </a>
              
              <p class="text-gray-600 text-base leading-relaxed mb-4 line-clamp-3">
                {{ $article->excerpt }}
              </p>
              
              <!-- Article Meta -->
              <div class="flex items-center justify-between text-sm text-gray-500 pt-4 border-t border-gray-100">
                <span class="font-medium">Admin</span>
                <time datetime="{{ $article->created_at }}">
                  {{ \Carbon\Carbon::parse($article->created_at)->format('M j, Y') }}
                </time>
              </div>
            </div>
          </article>
        @endforeach
      @else
        <div class="col-span-full text-center py-12">
          <div class="max-w-md mx-auto">
            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No Articles Available</h3>
            <p class="text-gray-500">Check back soon for new content and updates.</p>
          </div>
        </div>
      @endif
    </div>
    
    <!-- Call to Action -->
    <div class="text-center">
      <a 
        href="{{ route('articles') }}" 
        class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-red-300"
        aria-label="Read more articles"
      >
        Read More Articles
        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
    </div>
  </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        slidesPerGroup: 3, // Move 3 slides at once
        spaceBetween: 20,
        loop: true,
        pagination: {
        el: ".homepage-video-pagination", // Updated to use the new class
        clickable: true,
        },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
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
    document.addEventListener('DOMContentLoaded', function () {
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
        };

        window.closeVideoModal = function() {
        iframe.src = '';
        modal.classList.add('hidden');
        };
    });

        // Photo Swiper with Mobile-Friendly Configuration
    document.addEventListener('DOMContentLoaded', function() {
        const photoSwiper = new Swiper('.photoSwiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 10000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.photo-swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.photo-next',
                prevEl: '.photo-prev',
            },
            breakpoints: {
                640: {
                    spaceBetween: 15,
                },
                768: {
                    spaceBetween: 20,
                },
                1024: {
                    spaceBetween: 20,
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
    </script>

<style>
.animate-scroll-x {
  animation: scroll-x 20s linear infinite;
}

@keyframes scroll-x {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-100%);
  }
}

.line-clamp-2 {
  display: -webkit-box;
  line-clamp: 2;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-3 {
  display: -webkit-box;
  line-clamp: 3;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Custom pagination styles */
.homepage-video-pagination {
    text-align: center;
}

.homepage-video-pagination .swiper-pagination-bullet {
    width: 8px;
    height: 8px;
    background: #d1d5db;
    opacity: 1;
    margin: 0 3px;
}

.homepage-video-pagination .swiper-pagination-bullet-active {
    background: #3b82f6;
}

/* Make carousel arrows smaller */
/* Make carousel arrows the right size */
.swiper-button-next,
.swiper-button-prev,
.photo-prev, .photo-next,
.testimonial-video-prev, .testimonial-video-next {
    width: 50px !important;
    height: 50px !important;
    margin-top: -25px !important;
    color: #4B5563 !important;
}

.swiper-button-next:after,
.swiper-button-prev:after,
.photo-prev:after, .photo-next:after,
.testimonial-video-prev:after, .testimonial-video-next:after {
    font-size: 22px !important;
}

.swiper-button-next:hover,
.swiper-button-prev:hover,
.photo-prev:hover, .photo-next:hover,
.testimonial-video-prev:hover, .testimonial-video-next:hover {
    color: #1F2937 !important;
}

</style>
@endsection