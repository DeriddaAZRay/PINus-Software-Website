@extends('layout')

@section('content')

<section class="text-center">
  <div class="bg-white py-8 relative overflow-hidden">
      <div class="container mx-auto relative z-10">
          <div class="flex items-center justify-center mb-8 relative">
              <div class="text-center">
                  <h1 class="text-4xl md:text-4xl font-bold text-gray-800 mb-2">Our Products</h1>
                  <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
              </div>
          </div>
      </div>
  </div>

  <div class="container mx-auto px-10 py-8 relative" id="contentSection">
    <!-- Left Popup Panel -->
    <div id="productPopup" class="fixed left-0 h-full w-80 bg-white shadow-2xl z-50 transform -translate-x-full transition-transform duration-300 ease-in-out" style="top: var(--header-height, 0px);">
      <div class="p-6 h-full overflow-y-auto">
        <!-- Close Button -->
        <button id="closePopup" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>

        <!-- Popup Content -->
        <div id="popupContent" class="mt-8">
          <div class="flex items-center mb-6">
            <img id="popupLogo" src="" alt="" class="h-12 w-12 mr-4 flex-shrink-0">
            <h2 id="popupTitle" class="text-xl font-bold text-gray-800 text-left"></h2>
          </div>
          
          <div class="mb-6 text-left">
            <p id="popupDescription" class="text-gray-600 leading-relaxed"></p>
          </div>
          
          <div class="space-y-4 text-left">
            <h3 class="text-lg font-semibold text-gray-700">Key features</h3>
            <ul id="popupFeatures" class="space-y-3">
              <!-- Features will be populated here -->
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Overlay - positioned to cover only the products section -->
    <div id="overlay" class="absolute bg-black bg-opacity-50 z-40 opacity-0 invisible transition-all duration-300"></div>

    <!-- Product Grid -->
    <div id="productGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 transition-all duration-300 mb-16">
      @foreach($products as $product)
      <div class="product-card bg-gray-100 rounded-lg shadow-lg overflow-hidden transition-all duration-300 cursor-pointer group relative"
           data-product-id="{{ $product->id }}"
           data-title="{{ $product->cJudul }}"
           data-description="{{ $product->cKeterangan }}"
           data-logo="{{ base64_encode($product->cLogo) }}"
           data-features="{{ json_encode($product->features->pluck('cFitur')) }}"
           style="filter: drop-shadow(0 0 0 transparent); transition: all 0.3s ease;">
        
        <div class="p-6 h-36 flex flex-col justify-between relative">
          <div class="relative z-10">
            <!-- Icon and Title Row -->
            <div class="flex items-start mb-4">
              <img src="data:image/png;base64,{{ base64_encode($product->cLogo) }}" 
                   alt="{{ $product->cJudul }}" 
                   class="h-10 w-10 mr-4 flex-shrink-0">
              <h3 class="text-lg font-semibold text-gray-800 text-left leading-tight">{{ $product->cJudul }}</h3>
            </div>
          </div>
          <!-- Learn More Button -->
          <div class="relative z-10 flex items-center justify-start mt-4">
            <div class="learn-more-btn flex items-center text-blue-600 font-medium transition-all duration-300 group-hover:text-blue-700">
              <span class="mr-2 opacity-0 group-hover:opacity-100 transition-all duration-300 transform -translate-x-2 group-hover:translate-x-0">Learn more</span>
              <svg class="w-5 h-5 transform opacity-0 group-hover:opacity-100 transition-all duration-300 -translate-x-2 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const productCards = document.querySelectorAll('.product-card');
    const popup = document.getElementById('productPopup');
    const overlay = document.getElementById('overlay');
    const closePopup = document.getElementById('closePopup');
    const productGrid = document.getElementById('productGrid');
    const contentSection = document.getElementById('contentSection');
    
    // Calculate header height and set CSS variable
    function setHeaderHeight() {
        const header = document.querySelector('header') || document.querySelector('nav') || document.querySelector('.navbar');
        let headerHeight = 0;
        
        if (header) {
            headerHeight = header.offsetHeight;
        }
        
        // Set CSS custom property for header height
        document.documentElement.style.setProperty('--header-height', headerHeight + 'px');
        
        // Adjust popup height to account for header
        popup.style.height = `calc(100vh - ${headerHeight}px)`;
    }
    
    // Set header height on load and resize
    setHeaderHeight();
    window.addEventListener('resize', setHeaderHeight);
    
    // Popup content elements
    const popupLogo = document.getElementById('popupLogo');
    const popupTitle = document.getElementById('popupTitle');
    const popupDescription = document.getElementById('popupDescription');
    const popupFeatures = document.getElementById('popupFeatures');

    function openPopup(cardData) {
        // Populate popup content
        popupLogo.src = `data:image/png;base64,${cardData.logo}`;
        popupLogo.alt = cardData.title;
        popupTitle.textContent = cardData.title;
        popupDescription.textContent = cardData.description;
        
        // Clear and populate features
        popupFeatures.innerHTML = '';
        const features = JSON.parse(cardData.features);
        features.forEach(feature => {
            const li = document.createElement('li');
            li.className = 'flex items-start';
            li.innerHTML = `
                <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-gray-700">${feature}</span>
            `;
            popupFeatures.appendChild(li);
        });

        // Show overlay relative to content section only
        overlay.classList.remove('invisible', 'opacity-0');
        overlay.classList.add('opacity-100');
        
        // Show popup with animation
        popup.classList.add('translate-x-0');
        popup.classList.remove('-translate-x-full');
        
        // Adjust grid layout
        productGrid.style.marginLeft = '320px';
        
        // Prevent body scroll only in the content area
        contentSection.style.overflow = 'hidden';
    }

    function closePopupHandler() {
        // Hide overlay
        overlay.classList.add('invisible', 'opacity-0');
        overlay.classList.remove('opacity-100');
        
        // Hide popup with animation
        popup.classList.remove('translate-x-0');
        popup.classList.add('-translate-x-full');
        
        // Reset grid layout
        productGrid.style.marginLeft = '0';
        
        // Reset overlay styles
        overlay.style.height = '';
    }

    // Add click event to each product card
    productCards.forEach(card => {
        card.addEventListener('click', function() {
            const cardData = {
                title: this.dataset.title,
                description: this.dataset.description,
                logo: this.dataset.logo,
                features: this.dataset.features
            };
            openPopup(cardData);
        });
    });

    // Close popup events
    closePopup.addEventListener('click', closePopupHandler);
    overlay.addEventListener('click', closePopupHandler);
    
    // Close popup with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePopupHandler();
        }
    });
});
</script>

<style>

.product-card {
    transform: scale(1);
    transition: all 0.3s ease;
}

.product-card:hover {
    transform: scale(1.02);
    box-shadow: -8px 8px 20px rgba(62, 216, 255, 0.3),
                0 12px 25px rgba(255, 233, 254, 0.3),
                8px 8px 20px rgba(234, 63, 63, 0.3) !important;
}

.learn-more-btn span {
    white-space: nowrap;
}

/* Popup positioning adjustments */
#productPopup {
    top: var(--header-height, 0px);
    height: calc(100vh - var(--header-height, 0px));
}

/* Overlay positioning - stays within content section only */
#contentSection {
    position: relative;
}

#overlay {
    position: absolute;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    #productPopup {
        width: 100%;
    }
    
    #productGrid.popup-open {
        margin-left: 0 !important;
        display: none;
    }
}

/* Scrollbar styling for popup */
#productPopup::-webkit-scrollbar {
    width: 6px;
}

#productPopup::-webkit-scrollbar-track {
    background: #f1f1f1;
}

#productPopup::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

#productPopup::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}
</style>

@endsection