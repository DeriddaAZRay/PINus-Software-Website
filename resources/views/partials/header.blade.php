<header class="bg-white border-b-2 shadow-md sticky top-0 z-50">
  <div class="container mx-auto flex justify-between items-center p-4 px-10">
    <a href="{{ url('/') }}">
      <img src="/images/logo.webp" alt="PINUS Logo" class="h-16">
    </a>
    <nav class="space-x-6">
      <a href="{{ request()->is('/') ? '#' : url('/') }}" class="font-medium {{ request()->is('/') ? 'underline' : 'text-gray-700' }}">Home</a>
      <div class="relative inline-block">
        <button 
          class="font-medium flex items-center {{ request()->is('about*') ? 'underline' : 'text-gray-700' }}" 
          id="aboutDropdownButton" 
          type="button"
          onclick="document.getElementById('aboutDropdownMenu').classList.toggle('hidden')"
        >
          About Us
          <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
        <path d="M5.25 7.5l4.25 4.25L13.75 7.5" />
          </svg>
        </button>
        <div 
          id="aboutDropdownMenu"
          class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-md border border-gray-200 hidden z-50"
        >
          <a href="{{ url('/about/introduction') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Introduction</a>
          <hr class="border-t border-gray-200">
          <a href="{{ url('/about/legality') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Company Legality</a>
          <hr class="border-t border-gray-200">
          <a href="{{ url('/about/history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Our History</a>
          <hr class="border-t border-gray-200">
          <a href="{{ url('/about/visimisi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Vision &amp; Mission</a>
        </div>
      </div>
      <script>
        // Optional: Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
          var button = document.getElementById('aboutDropdownButton');
          var menu = document.getElementById('aboutDropdownMenu');
          if (!button.contains(event.target) && !menu.contains(event.target)) {
        menu.classList.add('hidden');
          }
        });
      </script>
      <a href="{{ request()->is('articles') ? '#' : url('/articles') }}" class="font-medium {{ request()->is('articles') ? 'underline' : 'text-gray-700' }}">Articles</a>
      <a href="{{ request()->is('products') ? '#' : url('/products') }}" class="font-medium {{ request()->is('products') ? 'underline' : 'text-gray-700' }}">Our Products</a>
      <a href="{{ request()->is('testimonials') ? '#' : url('/testimonials') }}" class="font-medium {{ request()->is('testimonials') ? 'underline' : 'text-gray-700' }}">Testimonials</a>
    </nav>
  </div>
</header>
