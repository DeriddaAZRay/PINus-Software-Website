@extends('layout')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Latest Posts Section -->
        <section class="mb-12">
            <h1 class="text-4xl md:text-4xl font-bold text-gray-800 mb-2 text-center">Latest Articles</h1>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-8"></div>
            
            <!-- Featured Article Carousel -->
            @if(!empty($featuredArticles) && $featuredArticles->count() > 0)
            <div class="relative bg-white rounded-lg shadow-lg overflow-hidden mb-8">
                <div class="carousel-container relative" id="carousel">
                    @foreach($featuredArticles as $index => $featuredArticle)
                    <div class="carousel-slide {{ $index === 0 ? 'active' : '' }}">
                        <div class="w-full md:w-1/2 relative">
                            <div class="image-container">
                                <img src="{{ $featuredArticle->image }}" 
                                     alt="{{ $featuredArticle->title }}" 
                                     class="w-full h-64 md:h-80 object-cover transition-opacity duration-300"
                                     loading="{{ $index === 0 ? 'eager' : 'lazy' }}">                              
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 p-6 md:p-8 flex flex-col justify-center">
                            <h2 class="text-xl font-bold text-red-600 mb-3">        
                                <a href="{{ route('articles.show', $featuredArticle->ID) }}" 
                                   class="hover:text-red-700 transition-colors">
                                   {{ $featuredArticle->title }}
                                </a>
                            </h2>
                            <p class="text-gray-600 mb-6">{{ $featuredArticle->excerpt }}</p>
                            <p class="text-sm text-gray-500">
                                by: {{ $featuredArticle->author }}<br>
                                {{ $featuredArticle->created_at ? $featuredArticle->created_at->format('d/m/Y') : 'N/A' }}
                                @if($featuredArticle->category_name)
                                <br>Category: {{ $featuredArticle->category_name }}
                                @endif
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                @if($featuredArticles->count() > 1)
                <!-- Carousel Navigation -->
                <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-75 p-2 rounded-full transition-all z-10" 
                        id="prevBtn" aria-label="Previous article">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-75 p-2 rounded-full transition-all z-10" 
                        id="nextBtn" aria-label="Next article">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                
                <!-- Carousel Dots -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                    @foreach($featuredArticles as $index => $featuredArticle)
                    <button class="w-3 h-3 rounded-full carousel-dot {{ $index === 0 ? 'active-dot bg-gray-700' : 'bg-gray-300' }}" 
                            data-slide="{{ $index }}" aria-label="Go to slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
                @endif
            </div>
            @endif
        </section>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Search -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Search Articles</h3>
                    <form action="{{ route('articles') }}" method="GET" class="relative">
                        @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}" 
                               placeholder="Search articles..." 
                               class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="submit" 
                                class="absolute right-2 top-2 bg-blue-200 hover:bg-blue-500 p-2 rounded-lg transition-colors">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                    @if(request('search') || request('category'))
                    <div class="mt-3 flex flex-wrap gap-2">
                        @if(request('search'))
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800">
                            Search: {{ request('search') }}
                            <a href="{{ route('articles', array_filter(request()->except('search'))) }}" 
                               class="ml-2 text-teal-600 hover:text-teal-800">×</a>
                        </span>
                        @endif
                        @if(request('category'))
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-red-100 text-red-800">
                            Category: {{ request('category') }}
                            <a href="{{ route('articles', array_filter(request()->except('category'))) }}" 
                               class="ml-2 text-red-600 hover:text-red-800">×</a>
                        </span>
                        @endif
                    </div>
                    @endif
                </div>

                <!-- All Articles Button -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <a href="{{ route('articles') }}" 
                       class="block w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg font-medium transition-colors text-center {{ !request('search') && !request('category') ? 'opacity-50 cursor-not-allowed' : '' }}">
                        All Articles
                    </a>
                </div>

                <!-- Categories -->
                @if(!empty($categories) && $categories->count() > 0)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 text-center">Categories</h3>
                    <div class="space-y-1">
                        @foreach($categories as $category)
                        <a href="{{ route('articles', array_merge(request()->except('page'), ['category' => $category])) }}" 
                           class="block py-2 px-3 text-gray-600 hover:text-red-600 hover:bg-gray-50 rounded border-b border-gray-100 last:border-b-0 transition-colors {{ request('category') === $category ? 'text-red-600 bg-red-50' : '' }}">
                            {{ $category }}
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Article Stats -->
                @if(!empty($articles))
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Article Stats</h3>
                    <div class="text-sm text-gray-600">
                        @if(method_exists($articles, 'total'))
                            <p>Total articles: {{ $articles->total() }}</p>
                            <p>Showing {{ $articles->firstItem() ?? 0 }} to {{ $articles->lastItem() ?? 0 }} of {{ $articles->total() }}</p>
                        @else
                            <p>Total articles: {{ $articles->count() }}</p>
                        @endif
                        @if(request('search'))
                            <p class="mt-2 text-teal-600">Search results for "{{ request('search') }}"</p>
                        @endif
                        @if(request('category'))
                            <p class="mt-2 text-red-600">Category: {{ request('category') }}</p>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            <!-- Articles List -->
            <div class="lg:col-span-2 space-y-6">
                @forelse($articles as $article)
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow hover-lift">
                    <div class="md:flex">
                        <div class="md:w-1/3 relative">
                            <div class="image-container h-48">
                                <img src="{{ $article->image }}" 
                                     alt="{{ $article->title }}" 
                                     class="w-full h-full object-cover transition-opacity duration-300"
                                     loading="lazy">
                            </div>
                        </div>
                        <div class="md:w-2/3 p-6">
                            <h3 class="text-xl font-bold text-red-600 mb-3">
                                <a href="{{ route('articles.show', $article->ID) }}" 
                                   class="hover:text-red-700 transition-colors">
                                   {{ $article->title }}
                                </a>
                            </h3>
                            <p class="text-gray-600 mb-4">{{ $article->excerpt }}</p>
                            <div class="text-sm text-gray-500">
                                <p>by: {{ $article->author }}</p>
                                <p>{{ $article->created_at ? $article->created_at->format('d/m/Y') : 'N/A' }}</p>
                                @if($article->category_name)
                                <p class="mt-2">
                                    <a href="{{ route('articles', array_merge(request()->except('page'), ['category' => $article->category_name])) }}"
                                       class="inline-block bg-gray-200 hover:bg-gray-300 rounded-full px-3 py-1 text-xs text-gray-700 transition-colors">
                                        {{ $article->category_name }}
                                    </a>
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
                @empty
                <!-- No Articles Message -->
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <div class="text-gray-400 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" 
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No articles found</h3>
                    <p class="text-gray-600">
                        @if(request('search'))
                            No articles match your search for "{{ request('search') }}".
                        @elseif(request('category'))
                            No articles found in the "{{ request('category') }}" category.
                        @else
                            There are no articles available at the moment.
                        @endif
                    </p>
                    @if(request('search') || request('category'))
                    <div class="mt-4">
                        <a href="{{ route('articles') }}" 
                           class="inline-flex items-center px-4 py-2 bg-teal-500 hover:bg-teal-600 text-white rounded-lg transition-colors">
                            View All Articles
                        </a>
                    </div>
                    @endif
                </div>
                @endforelse

                @if(!empty($articles) && method_exists($articles, 'links'))
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $articles->appends(request()->query())->links() }}
                </div>
                @endif
            </div>
        </div>
    </main>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Carousel functionality
    const carousel = document.getElementById('carousel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    let currentSlide = 0;
    let autoPlayInterval;

    if (slides.length > 1) {
        function showSlide(index) {
            // Hide all slides
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => {
                dot.classList.remove('active-dot', 'bg-gray-700');
                dot.classList.add('bg-gray-300');
            });

            // Show current slide
            if (slides[index]) {
                slides[index].classList.add('active');
            }
            if (dots[index]) {
                dots[index].classList.add('active-dot', 'bg-gray-700');
                dots[index].classList.remove('bg-gray-300');
            }
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        function startAutoPlay() {
            autoPlayInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
        }

        function stopAutoPlay() {
            if (autoPlayInterval) {
                clearInterval(autoPlayInterval);
            }
        }

        // Event listeners
        if (nextBtn) {
            nextBtn.addEventListener('click', function() {
                stopAutoPlay();
                nextSlide();
                startAutoPlay();
            });
        }
        
        if (prevBtn) {
            prevBtn.addEventListener('click', function() {
                stopAutoPlay();
                prevSlide();
                startAutoPlay();
            });
        }

        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                stopAutoPlay();
                currentSlide = index;
                showSlide(currentSlide);
                startAutoPlay();
            });
        });

        // Pause on hover
        if (carousel) {
            carousel.addEventListener('mouseenter', stopAutoPlay);
            carousel.addEventListener('mouseleave', startAutoPlay);
        }

        // Start auto-play
        startAutoPlay();
    }

    // Image loading error handler
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('error', function() {
            this.src = '/images/default-article.jpg';
            this.alt = 'Default article image';
        });
    });

    // Search form enhancement
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener('keyup', function(e) {
            // Optional: Add debounced search functionality here
        });
    }
});
</script>

<style>
.active-dot {
    background-color: #374151 !important;
}

.carousel-slide {
    display: none;
    flex-direction: column;
}

.carousel-slide.active {
    display: flex;
}

@media (min-width: 768px) {
    .carousel-slide {
        flex-direction: row;
    }
}

/* Mobile responsive adjustments */
@media (max-width: 768px) {
    .carousel-slide .w-full.md\:w-1\/2:first-child {
        order: 1;
    }
    
    .carousel-slide .w-full.md\:w-1\/2:last-child {
        order: 2;
    }
}

/* Loading state for images */
img[src=""], img[src*="default"] {
    background-color: #f3f4f6;
    background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d1d5db' fill-opacity='0.4'%3E%3Cpath d='M20 20c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10zm10 0c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10z'/%3E%3C/g%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 40px 40px;
}

/* Smooth transitions */
.carousel-slide {
    transition: opacity 0.3s ease-in-out;
}

/* Loading spinner for images */
.loading-image {
    position: relative;
    overflow: hidden;
}

.loading-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Pagination styling improvements */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
}

/* Focus states for accessibility */
button:focus, a:focus {
    outline: 2px solid #0d9488;
    outline-offset: 2px;
}

/* Hover effects */
.hover-lift:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}
</style>
@endsection