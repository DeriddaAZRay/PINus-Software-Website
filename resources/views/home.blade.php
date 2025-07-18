@extends('layout')

@section('content')

{{-- Hero Section --}}
<section class="bg-white text-center px-0 py-0">
  <div class="relative bg-cover bg-center min-h-[500px] px-12 py-16" style="background-image: url('/images/hero-bg.png');">
    
    <div class="absolute inset-0 bg-white bg-opacity-70"></div>

    <div class="relative z-10 container mx-auto">
      <h1 class="text-4xl font-bold mb-4">PINus Software</h1>
      <p class="text-lg font-semibold max-w-2xl mx-auto mb-6">
        At PT. Performa Inti Nusantara, we are more than just a software provider —
        we are your partner in building smart, efficient, and integrated systems tailored to your business needs.
      </p>
      <div class="flex justify-center gap-4">
        <a href="#" class="border border-gray-600 px-6 py-2 rounded hover:bg-gray-300 hover:bg-opacity-60 transition">About Us</a>
        <a href="#" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">Watch Video</a>
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
    <div class="mt-8">
      <a href="#" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">Our Products</a>
    </div>
  </div>
</section>

{{-- Videos Section --}}
<section class="bg-white py-16 px-6">
  <div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold mb-10">Videos</h2>

    <div class="relative max-w-6xl mx-auto">
      <div class="relative px-16">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            @foreach ($videos as $video)
              @php
                $videoId = Str::before($video->youtube_link, '?');
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
                    <h3 class="text-lg font-semibold mb-1">{{ $video->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $video->description }}</p>
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
      @foreach (['client1.png', 'client2.png', 'client3.png', 'client4.png', 'client5.png', 'client6.png', 'client7.png', 'client8.png', 'client9.png', 'client10.png', 'client11.png', 'client12.png', 'client13.png'] as $logo)
        <img src="/images/clients/{{ $logo }}" class="h-12 inline-block" alt="Client Logo">
      @endforeach
      {{-- Repeat logos for seamless scroll --}}
      @foreach (['client1.png', 'client2.png', 'client3.png', 'client4.png', 'client5.png', 'client6.png', 'client7.png', 'client8.png', 'client9.png', 'client10.png', 'client11.png', 'client12.png', 'client13.png'] as $logo)
        <img src="/images/clients/{{ $logo }}" class="h-12 inline-block" alt="Client Logo">
      @endforeach
    </div>
  </div>

  {{-- Button --}}
  <div class="text-center mt-8 relative z-10">
    <a href="#" class="bg-blue-400 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
      Testimonials
    </a>
  </div>
</section>

{{-- Articles Section --}}
<section class="bg-white py-16 px-10">
  <div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold mb-10">JUDUL ARTIKEL</h2>
    <div class="relative">
      <img src="/images/article-sample.jpg" alt="Article" class="w-full h-64 object-cover rounded shadow">
      <div class="absolute bottom-0 bg-gradient-to-t from-black/70 to-transparent text-left p-4 w-full text-white">
        <p>Lorem ipsum dolor sit amet...</p>
        <p class="text-sm mt-2">by: User 1 | DD/MM/YYYY</p>
      </div>
    </div>
    <div class="mt-6">
      <a href="#" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">Read more articles</a>
    </div>
  </div>
</section>

@endsection
