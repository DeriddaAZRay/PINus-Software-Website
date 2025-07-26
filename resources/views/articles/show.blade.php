@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="mb-2">
            <a href="/articles" class="inline-flex items-center text-sm text-gray-600 hover:text-gray-800">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Articles
            </a>
        </div>
        <!-- Article Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold mb-4">{{ $article->title }}</h1>
            <div class="flex items-center text-gray-600 text-sm">
                <span>{{ $article->created_at->format('F d, Y') }}</span>
                <span class="mx-2">•</span>
                <span>By {{ $article->author }}</span>
            </div>
        </div>

        <!-- Featured Image -->
        @if($article->hasThumbnail)
        <div class="mb-6 flex justify-center">
            <img src="{{ $article->image }}" 
                 alt="{{ $article->title }}"
                 class="w-full max-w-3xl h-[400px] object-cover rounded-lg shadow-md">
        </div>
        @endif

        <!-- Article Content -->
        <div class="prose prose-lg max-w-none whitespace-pre-line trix-content">
            {!! $article->content !!}
        </div>

        <!-- Category -->
        @if($article->category)
            <div class="mt-6">
                <span class="px-3 py-1 bg-gray-200 rounded-full text-sm">
                    {{ $article->category->name }}
                </span>
            </div>
        @endif

        <!-- Share Buttons -->
        <div class="mt-8 border-t pt-8">
            <h3 class="text-xl font-semibold mb-4">Share this article</h3>
            <div class="flex space-x-4">
                <button onclick="copyToClipboard('{{ request()->url() }}')"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                    </svg>
                </button>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}" 
                   target="_blank"
                   class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-blue-500">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                   target="_blank"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
            </div>
        </div>

        <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Link copied to clipboard!');
            }).catch(function(err) {
                console.error('Failed to copy text: ', err);
            });
        }
        </script>

        <!-- Related Articles -->
        @if(isset($relatedArticles) && count($relatedArticles) > 0)
        <div class="mt-12 border-t pt-8">
            <h3 class="text-2xl font-bold mb-6">Related Articles</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($relatedArticles as $relatedArticle)
                <div class="border rounded-lg overflow-hidden">
                    @if($relatedArticle->featured_image)
                    <img src="{{ asset('storage/' . $relatedArticle->featured_image) }}" 
                         alt="{{ $relatedArticle->title }}"
                         class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h4 class="font-semibold mb-2">
                            <a href="{{ route('articles.show', $relatedArticle) }}" 
                               class="hover:text-blue-600">
                                {{ $relatedArticle->title }}
                            </a>
                        </h4>
                        <p class="text-gray-600 text-sm">
                            {{ Str::limit($relatedArticle->excerpt, 100) }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
