<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class="bg-white border-b-2 shadow-md sticky top-0 z-50">
  <div class="container mx-auto px-4 sm:px-6 lg:px-10">
    <div class="flex justify-between items-center py-3 sm:py-4">
      <!-- Logo -->
      <div class="flex-shrink-0">
        <a href="/">
          <img src="/images/logo.webp" alt="PINUS Logo" class="h-12 sm:h-14 lg:h-16 w-auto">
        </a>
      </div>

      <!-- Desktop Navigation -->
      <nav class="hidden lg:flex items-center space-x-6 xl:space-x-8">
        <a href="/" class="font-medium text-sm xl:text-base transition-colors duration-200 hover:text-blue-600 {{ request()->is('/') ? 'border-b-2 border-blue-600' : '' }}">Home</a>
        
        <!-- About Us Dropdown -->
        <div class="relative group">
          <button 
            class="font-medium text-sm xl:text-base flex items-center transition-colors duration-200 hover:text-blue-600 text-gray-700 group-hover:text-blue-600 {{ request()->is('about/*') ? 'border-b-2 border-blue-600' : '' }}" 
            id="aboutDropdownButton" 
            type="button"
          >
            About Us
            <svg class="ml-1 w-4 h-4 transition-transform duration-200 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
          </button>
          <div 
            id="aboutDropdownMenu"
            class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-2 group-hover:translate-y-0">
            <a href="/about/history" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-150">Our History</a>
            <hr class="border-t border-gray-100">
            <a href="/about/legality" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-150">Company Legality</a>
            <hr class="border-t border-gray-100">
            <a href="/about/visimisi" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-150 rounded-b-lg">Vision & Mission</a>
          </div>
        </div>

        <a href="/articles" class="font-medium text-sm xl:text-base transition-colors duration-200 hover:text-blue-600 text-gray-700 {{ request()->is('articles') ? 'border-b-2 border-blue-600' : '' }}">Articles</a>
        <a href="/products" class="font-medium text-sm xl:text-base transition-colors duration-200 hover:text-blue-600 text-gray-700 {{ request()->is('products') ? 'border-b-2 border-blue-600' : '' }}">Our Products</a>
        <a href="/testimonials" class="font-medium text-sm xl:text-base transition-colors duration-200 hover:text-blue-600 text-gray-700 {{ request()->is('testimonials') ? 'border-b-2 border-blue-600' : '' }}">Testimonials</a>
      </nav>

      <!-- Mobile Menu Button -->
      <button 
        id="mobileMenuButton" 
        class="lg:hidden p-2 rounded-md text-gray-700 hover:text-blue-600 hover:bg-gray-100 transition-colors duration-200"
        aria-label="Toggle navigation menu"
      >
        <svg class="w-6 h-6" id="hamburgerIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <svg class="w-6 h-6 hidden" id="closeIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobileMenu" class="lg:hidden hidden border-t border-gray-200">
      <nav class="py-4 space-y-1">
        <a href="/" class="block px-4 py-3 text-base font-medium text-blue-600 bg-blue-50 rounded-md">Home</a>
        
        <!-- Mobile About Us Section -->
        <div>
          <button 
            id="mobileAboutButton"
            class="w-full text-left px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md transition-colors duration-200 flex items-center justify-between"
          >
            About Us
            <svg class="w-5 h-5 transition-transform duration-200" id="mobileAboutIcon" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
          </button>
          <div id="mobileAboutMenu" class="hidden pl-4 space-y-1 mt-1">
            <a href="/about/introduction" class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-colors duration-150">Introduction</a>
            <a href="/about/legality" class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-colors duration-150">Company Legality</a>
            <a href="/about/history" class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-colors duration-150">Our History</a>
            <a href="/about/visimisi" class="block px-4 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-colors duration-150">Vision & Mission</a>
          </div>
        </div>

        <a href="/articles" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md transition-colors duration-200">Articles</a>
        <a href="/products" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md transition-colors duration-200">Our Products</a>
        <a href="/testimonials" class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-md transition-colors duration-200">Testimonials</a>
      </nav>
    </div>
  </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Mobile menu toggle
  const mobileMenuButton = document.getElementById('mobileMenuButton');
  const mobileMenu = document.getElementById('mobileMenu');
  const hamburgerIcon = document.getElementById('hamburgerIcon');
  const closeIcon = document.getElementById('closeIcon');
  
  mobileMenuButton.addEventListener('click', function() {
    const isHidden = mobileMenu.classList.contains('hidden');
    
    if (isHidden) {
      mobileMenu.classList.remove('hidden');
      hamburgerIcon.classList.add('hidden');
      closeIcon.classList.remove('hidden');
    } else {
      mobileMenu.classList.add('hidden');
      hamburgerIcon.classList.remove('hidden');
      closeIcon.classList.add('hidden');
    }
  });

  // Mobile about us submenu toggle
  const mobileAboutButton = document.getElementById('mobileAboutButton');
  const mobileAboutMenu = document.getElementById('mobileAboutMenu');
  const mobileAboutIcon = document.getElementById('mobileAboutIcon');
  
  mobileAboutButton.addEventListener('click', function() {
    const isHidden = mobileAboutMenu.classList.contains('hidden');
    
    if (isHidden) {
      mobileAboutMenu.classList.remove('hidden');
      mobileAboutIcon.style.transform = 'rotate(90deg)';
    } else {
      mobileAboutMenu.classList.add('hidden');
      mobileAboutIcon.style.transform = 'rotate(0deg)';
    }
  });

  // Close mobile menu when window is resized to desktop
  window.addEventListener('resize', function() {
    if (window.innerWidth >= 1024) {
      mobileMenu.classList.add('hidden');
      hamburgerIcon.classList.remove('hidden');
      closeIcon.classList.add('hidden');
    }
  });

  // Desktop dropdown functionality (improved)
  const aboutDropdownButton = document.getElementById('aboutDropdownButton');
  const aboutDropdownMenu = document.getElementById('aboutDropdownMenu');
  let dropdownTimeout;

  // Show dropdown on hover with slight delay
  aboutDropdownButton.parentElement.addEventListener('mouseenter', function() {
    clearTimeout(dropdownTimeout);
    aboutDropdownMenu.classList.remove('opacity-0', 'invisible');
    aboutDropdownMenu.classList.add('opacity-100', 'visible');
  });

  // Hide dropdown on mouse leave with delay
  aboutDropdownButton.parentElement.addEventListener('mouseleave', function() {
    dropdownTimeout = setTimeout(function() {
      aboutDropdownMenu.classList.add('opacity-0', 'invisible');
      aboutDropdownMenu.classList.remove('opacity-100', 'visible');
    }, 100);
  });

  // Click functionality for desktop dropdown (alternative to hover)
  aboutDropdownButton.addEventListener('click', function() {
    const isVisible = aboutDropdownMenu.classList.contains('opacity-100');
    
    if (isVisible) {
      aboutDropdownMenu.classList.add('opacity-0', 'invisible');
      aboutDropdownMenu.classList.remove('opacity-100', 'visible');
    } else {
      aboutDropdownMenu.classList.remove('opacity-0', 'invisible');
      aboutDropdownMenu.classList.add('opacity-100', 'visible');
    }
  });

  // Close dropdown when clicking outside
  document.addEventListener('click', function(event) {
    const aboutSection = aboutDropdownButton.parentElement;
    if (!aboutSection.contains(event.target)) {
      aboutDropdownMenu.classList.add('opacity-0', 'invisible');
      aboutDropdownMenu.classList.remove('opacity-100', 'visible');
    }
  });
});
</script>
</body>
</html>