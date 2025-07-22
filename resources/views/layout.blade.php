<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>PT. Performa Inti Nusantara</title>
  <link rel="icon" type="image/webp" href="{{ asset('images/logo-footer.webp') }}">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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
  </style>
  
  <style>
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
  </style>

<!-- Floating WhatsApp Button -->
<style>
  .floating-whatsapp {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 50;
    display: flex;
    align-items: center;
    cursor: pointer;
    flex-direction: row-reverse;
  }
  .whatsapp-circle {
    background: #25d366;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    transition: box-shadow 0.2s;
  }
  .whatsapp-circle:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.25);
  }
  .contact-label {
    background: #fff;
    color: #25d366;
    font-weight: 600;
    border-radius: 20px;
    margin-right: 12px;
    padding: 8px 16px;
    opacity: 0;
    pointer-events: none;
    transform: translateX(10px);
    transition: opacity 0.2s, transform 0.2s;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    white-space: nowrap;
  }
  .floating-whatsapp:hover .contact-label {
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
  }
</style>
<div class="floating-whatsapp" onclick="window.open('https://wa.me/6287813271683','_blank')" title="Contact Us on WhatsApp">
    <div class="whatsapp-circle">
        <!-- Fixed WhatsApp SVG Logo -->
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" viewBox="0 0 24 24">
            <path d="M20.52 3.49A11.79 11.79 0 0012 0C5.48 0 .19 5.29.19 11.81c0 2.08.54 4.11 1.56 5.9L0 24l6.46-1.69c1.71.93 3.63 1.42 5.58 1.42h.01c6.52 0 11.81-5.29 11.81-11.81 0-3.15-1.23-6.12-3.46-8.35zM12 21.58c-1.76 0-3.49-.47-5.01-1.36l-.36-.21-3.76.99 1-3.67-.23-.38A9.64 9.64 0 012.4 11.81C2.4 6.5 6.69 2.21 12 2.21s9.6 4.29 9.6 9.6-4.29 9.77-9.6 9.77zm5.27-7.19c-.29-.14-1.7-.84-1.97-.94-.26-.1-.45-.14-.64.14-.19.29-.74.94-.91 1.13-.17.19-.34.22-.62.07-.29-.14-1.21-.45-2.31-1.43-.85-.76-1.43-1.7-1.6-1.99-.17-.29-.02-.44.13-.59.13-.13.29-.34.43-.5.14-.17.19-.29.29-.48.1-.19.05-.36-.03-.5-.07-.14-.64-1.56-.88-2.13-.23-.56-.47-.48-.64-.49-.17-.01-.36-.01-.55-.01s-.5.07-.76.36c-.26.29-1.01.99-1.01 2.41s1.03 2.79 1.17 2.98c.14.19 2.03 3.1 4.92 4.35.69.3 1.22.47 1.64.6.69.22 1.32.19 1.81.11.55-.08 1.7-.7 1.94-1.37.24-.67.24-1.25.17-1.37-.07-.12-.26-.19-.55-.33z"/>
        </svg>
    </div>
    <span class="contact-label">Contact Us</span>
</div>

</head>
<body class="bg-white-100 text-gray-900">

  @include('partials.header')

  <main class="min-h-screen">
    @yield('content')
  </main>

  @include('partials.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
        breakpoints: {
        768: {
            slidesPerView: 3,
        }
        }
    });
    </script>

    <script>
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
    </script>

    
    
</body>
</html>