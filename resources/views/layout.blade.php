<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Landing Page</title>
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

  <style>
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
  </style>

  <style>
  .swiper-button-prev::after,
  .swiper-button-next::after {
    color: #2C2C2C !important; /* or any color you want */
    font-size: 1.5rem; /* optional: control arrow size */
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
