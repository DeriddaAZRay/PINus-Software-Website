@extends('layout')

@section('content')

{{-- Hero Section --}}
<section class="bg-white text-center px-0 py-0">
  <div class="relative bg-cover bg-center min-h-[500px] px-12 py-16" style="background-image: url('/images/hero-bg.png');">
    
    <div class="absolute inset-0 bg-white bg-opacity-70"></div>

    <div class="relative z-10 container mx-auto">
      <h1 class="text-4xl font-bold mb-4">PINus Software</h1>
      <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
      <p class="text-lg font-semibold max-w-2xl mx-auto mb-6">
        At PT. Performa Inti Nusantara, we are more than just a software provider —
        we are your partner in building smart, efficient, and integrated systems tailored to your business needs.
      </p>
      <div class="flex justify-center gap-4">
        <a 
          href="{{ url('/about/introduction') }}" 
          class="inline-flex items-center border border-gray-600 text-gray-800 font-semibold px-8 py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-gray-300 hover:bg-gray-300 hover:bg-opacity-60"
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
      <img src="/images/logo-footer.webp" alt="PINus Logo" class="mx-auto mt-10 h-52">
    </div>
  </div>
</section>


{{-- Why Choose Section --}}
<section style="background-color: #F2F2F2" class="bg-gray-50 py-16 px-10">
  <div class="container mx-auto text-center">
    <h2 class="text-2xl font-bold mb-12">WHY CHOOSE <span class="text-red-600">PINUS SOFTWARE?</span></h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
        <img src="/icons/flexible.png" class="mx-auto h-12 mb-2">
        <h3 class="font-bold text-red-600">Modular & Flexible</h3>
        <p class="text-sm text-gray-600">Each module can be implemented individually or fully integrated.</p>
      </div>
      <div>
        <img src="/icons/custom.png" class="mx-auto h-12 mb-2">
        <h3 class="font-bold text-red-600">Consultation & Customization</h3>
        <p class="text-sm text-gray-600">We provide IT consulting and tailored feature development.</p>
      </div>
      <div>
        <img src="/icons/trust.png" class="mx-auto h-12 mb-2">
        <h3 class="font-bold text-red-600">Experienced & Trusted</h3>
        <p class="text-sm text-gray-600">Over 15 years of experience across clinics, pharmacies, factories.</p>
      </div>
      <div>
        <img src="/icons/motto.png" class="mx-auto h-12 mb-2">
        <h3 class="font-bold text-red-600">Our Motto: Provide Better Performance</h3>
        <p class="text-sm text-gray-600">Helping your business operate faster and more efficiently.</p>
      </div>
    </div>
    <div class="text-center mt-8">
      <a 
        href="{{ url('/articles') }}" 
        class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-red-300"
        aria-label="Read more articles"
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
<section id="videos-section" class="bg-white py-16 px-6">
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
              <div class="swiper-slide flex justify-center">
                <div 
                  class="bg-white rounded-xl shadow-lg overflow-hidden w-72 sm:w-80 cursor-pointer group"
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

{{-- Carousel Clients --}}
<section class="bg-gray-100 py-10 px-4 overflow-hidden">
  {{-- Heading --}}
  <div class="container mx-auto mb-8">
    <h2 class="text-xl font-semibold text-center">Hear more from our clients</h2>
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
        aria-label="View all testimonials"
      >
        View All Testimonials
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
                <span class="font-medium">{{ $article->author }}</span>
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
        href="{{ url('/articles') }}" 
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

<style>
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
</style>
@endsection


