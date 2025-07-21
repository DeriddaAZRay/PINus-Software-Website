<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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