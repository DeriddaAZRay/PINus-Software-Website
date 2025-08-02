<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Video</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="flex min-h-screen">
        <!-- Include Sidebar -->
        @include('admin.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col ml-64">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Edit Video</h1>
                        <p class="text-gray-600 mt-1">Update your video information</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Status</p>
                            <p class="text-sm font-medium text-blue-600">Published</p>
                        </div>
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 p-6">
                <!-- Video Form Card -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg font-semibold text-gray-800">Update Video Details</h2>
                        </div>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('admin.videos.update', $video->id) }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Title Field -->
                            <div>
                                <label for="cJudul" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Video Title
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        name="cJudul" 
                                        id="cJudul"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                        placeholder="Enter video title"
                                        value="{{ old('cJudul', $video->cJudul) }}"
                                        required
                                    >
                                </div>
                                @error('cJudul')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- YouTube Video ID Field -->
                            <div>
                                <label for="cLink" class="block text-sm font-semibold text-gray-700 mb-3">
                                    YouTube Video ID
                                </label>
                                
                                <!-- Current Video Preview -->
                                @if($video->cLink)
                                <div class="mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <p class="text-xs text-gray-500 mb-2 uppercase tracking-wide font-medium">Current Video</p>
                                    <div class="flex items-center space-x-4">
                                        <div class="w-32 h-18 rounded-lg overflow-hidden bg-gray-100 border border-gray-200 flex-shrink-0">
                                            <img 
                                                src="https://img.youtube.com/vi/{{ $video->cLink }}/maxresdefault.jpg" 
                                                alt="Current video thumbnail" 
                                                class="w-full h-full object-cover"
                                            >
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-900">Video ID: {{ $video->cLink }}</p>
                                            <p class="text-xs text-gray-500 mt-1">Update the field below to change the video</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        name="cLink" 
                                        id="cLink"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                        placeholder="e.g., dQw4w9WgXcQ"
                                        value="{{ old('cLink', $video->cLink) }}"
                                        onblur="updatePreview()"
                                        required
                                    >
                                </div>
                                <div class="mt-2 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div class="text-sm text-blue-700">
                                            <p class="font-medium mb-1">How to get YouTube Video ID:</p>
                                            <p>From URL: <code class="bg-blue-100 px-1 rounded">https://www.youtube.com/watch?v=<strong>dQw4w9WgXcQ</strong></code></p>
                                            <p>Only input the ID part: <code class="bg-blue-100 px-1 rounded">dQw4w9WgXcQ</code></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- New Video Preview -->
                                <div id="video-preview" class="mt-4 hidden">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">New Preview</label>
                                    <div class="w-full max-w-md">
                                        <div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-lg overflow-hidden">
                                            <img id="preview-thumbnail" src="" alt="New video thumbnail" class="w-full h-full object-cover">
                                        </div>
                                    </div>
                                </div>
                                @error('cLink')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description Field -->
                            <div>
                                <label for="cDeskripsi" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Video Description
                                </label>
                                <textarea
                                    name="cDeskripsi"
                                    id="cDeskripsi"
                                    rows="6"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="Write your video description here..."
                                >{{ old('cDeskripsi', $video->cDeskripsi) }}</textarea>
                                @error('cDeskripsi')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Video Type Field -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    Video Type
                                </label>
                                <div class="space-y-4">
                                    <label for="video-type-v" class="block cursor-pointer">
                                        <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                            <div class="flex items-center">
                                                <input
                                                    id="video-type-v"
                                                    name="cJenis"
                                                    type="radio"
                                                    value="v"
                                                    class="h-4 w-4 text-green-600 border-gray-300"
                                                    {{ old('cJenis', 'v') == 'v' ? 'checked' : '' }}
                                                >
                                                <div class="ml-3 flex items-center">
                                                    <div class="flex items-center">
                                                        <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                        </svg>
                                                        <div>
                                                            <p class="text-sm font-medium text-gray-900">Regular Video (Default)</p>
                                                            <p class="text-xs text-gray-500">Standard video content for gallery</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Video
                                            </span>
                                        </div>
                                    </label>

                                    <label for="video-type-t" class="block cursor-pointer">
                                        <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                            <div class="flex items-center">
                                                <input
                                                    id="video-type-t"
                                                    name="cJenis"
                                                    type="radio"
                                                    value="t"
                                                    class="h-4 w-4 text-green-600 border-gray-300"
                                                    {{ old('cJenis') == 't' ? 'checked' : '' }}
                                                >
                                                <div class="ml-3 flex items-center">
                                                    <div class="flex items-center">
                                                        <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                                        </svg>
                                                        <div>
                                                            <p class="text-sm font-medium text-gray-900">Testimonial Video</p>
                                                            <p class="text-xs text-gray-500">Customer testimonials and reviews</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                Testimonial
                                            </span>
                                        </div>
                                    </label>
                            </div>
                                @error('cJenis')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                                <a 
                                    href="{{ route('admin.videos.index') }}" 
                                    class="inline-flex items-center text-gray-600 hover:text-gray-800 font-medium transition-colors duration-200"
                                >
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Cancel
                                </a>
                                
                                <div class="flex space-x-3">
                                    <button 
                                        type="submit" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-4 focus:ring-blue-300 flex items-center"
                                    >
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                        Update Video
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Back to Videos Link -->
                <div class="mt-6">
                    <a href="{{ route('admin.videos.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Videos List
                    </a>
                </div>
            </main>
        </div>
    </div>

    <script>
        function updatePreview() {
            const videoId = document.getElementById('cLink').value.trim();
            const previewDiv = document.getElementById('video-preview');
            const thumbnail = document.getElementById('preview-thumbnail');
            const originalValue = '{{ $video->cLink }}';
            
            if (videoId && videoId !== originalValue) {
                thumbnail.src = `https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`;
                previewDiv.classList.remove('hidden');
            } else {
                previewDiv.classList.add('hidden');
            }
        }

        // Auto-update preview as user types
        document.getElementById('cLink').addEventListener('input', function() {
            clearTimeout(this.timeout);
            this.timeout = setTimeout(updatePreview, 500);
        });
    </script>
</body>
</html>