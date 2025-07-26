<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <style>
    trix-editor {
        min-height: 200px;
        background-color: white;
        border-radius: 0.5rem;
        padding: 1rem;
    }
       /* Fix for bullet points and numbering */
    .trix-content ul {
        list-style-type: disc !important;
        padding-left: 2.5em !important;
    }

    .trix-content ol {
        list-style-type: decimal !important;
        padding-left: 2.5em !important;
    }

    .trix-content ul ul {
        list-style-type: circle !important;
    }

    .trix-content ul ul ul {
        list-style-type: square !important;
    }

    .trix-content ol ol {
        list-style-type: lower-alpha !important;
    }

    .trix-content ol ol ol {
        list-style-type: lower-roman !important;
    }
    </style>
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
                        <h1 class="text-2xl font-bold text-gray-800">Edit Product</h1>
                        <p class="text-gray-600 mt-1">Update your product information and features</p>
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
                <!-- Product Form Card -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg font-semibold text-gray-800">Update Product Details</h2>
                        </div>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('admin.products.update', $product->ID) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Title Field -->
                            <div>
                                <label for="cJudul" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Product Title
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
                                        placeholder="Enter product title"
                                        value="{{ $product->cJudul }}"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Order Field -->
                            <div>
                                <label for="nUrut" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Display Order
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        type="number" 
                                        name="nUrut" 
                                        id="nUrut"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                        placeholder="Enter display order (e.g., 1, 2, 3)"
                                        value="{{ $product->nUrut }}"
                                        required
                                        min="1"
                                    >
                                </div>
                            </div>

                            <!-- Description Field -->
                            <div>
                                <label for="cKeterangan" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Product Description
                                </label>
                                <input id="cKeterangan" type="hidden" name="cKeterangan" value="{{ old('cKeterangan', $product->cKeterangan ?? '') }}">
                                <trix-editor 
                                    input="cKeterangan" 
                                    class="trix-content bg-white border border-gray-300 rounded-lg p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="Write your product description here...">
                                </trix-editor>
                            </div>

                            <!-- Current Logo Display & Upload -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    Product Logo
                                </label>
                                
                                <!-- Current Logo -->
                                @if($product->cLogo)
                                <div class="mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <p class="text-xs text-gray-500 mb-2 uppercase tracking-wide font-medium">Current Logo</p>
                                    <div class="flex items-center space-x-4">
                                        <div class="h-20 w-28 rounded-lg overflow-hidden bg-gray-100 border border-gray-200 flex-shrink-0">
                                            <img 
                                                src="{{ $product->cLogo }}" 
                                                alt="Current logo" 
                                                class="h-full w-full object-cover"
                                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                            >
                                            <div class="h-full w-full items-center justify-center hidden">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-900">Current logo will be replaced if you upload a new one</p>
                                            <p class="text-xs text-gray-500 mt-1">Leave empty to keep the current logo</p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- New Logo Upload -->
                                <div class="relative">
                                    <div class="flex items-center justify-center w-full">
                                        <label for="cLogo" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload new logo</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500">PNG, JPG or GIF (MAX. 5MB)</p>
                                            </div>
                                            <input 
                                                id="cLogo" 
                                                name="cLogo" 
                                                type="file" 
                                                class="hidden" 
                                                accept="image/*"
                                            >
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Features Section -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    Product Features
                                </label>
                                <div id="features-container" class="space-y-3">
                                    @if($product->features && count($product->features) > 0)
                                        @foreach($product->features as $feature)
                                        <div class="feature-item flex items-center gap-3">
                                            <div class="flex-1">
                                                <input 
                                                    type="text" 
                                                    name="features[]" 
                                                    value="{{ $feature->cFitur }}"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                                    placeholder="Enter product feature"
                                                >
                                            </div>
                                            <button 
                                                type="button" 
                                                onclick="removeFeature(this)"
                                                class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-colors duration-200"
                                                title="Remove feature"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        @endforeach
                                    @else
                                        <div class="feature-item flex items-center gap-3">
                                            <div class="flex-1">
                                                <input 
                                                    type="text" 
                                                    name="features[]" 
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                                    placeholder="Enter product feature"
                                                >
                                            </div>
                                            <button 
                                                type="button" 
                                                onclick="removeFeature(this)"
                                                class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-colors duration-200"
                                                title="Remove feature"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                <button 
                                    type="button" 
                                    onclick="addFeature()"
                                    class="mt-3 bg-blue-100 hover:bg-blue-200 text-blue-700 font-medium py-2 px-4 rounded-lg transition-colors duration-200 flex items-center"
                                >
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add Feature
                                </button>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                                <a 
                                    href="{{ route('admin.products.index') }}" 
                                    class="inline-flex items-center text-gray-600 hover:text-gray-800 font-medium transition-colors duration-200"
                                >
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Cancel
                                </a>
                                
                                <div class="flex space-x-3">
                                    <button 
                                        type="button" 
                                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-4 focus:ring-gray-300"
                                    >
                                        Save as Draft
                                    </button>
                                    <button 
                                        type="submit" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-4 focus:ring-blue-300 flex items-center"
                                    >
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                        Update Product
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Back to Products Link -->
                <div class="mt-6">
                    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Products List
                    </a>
                </div>
            </main>
        </div>
    </div>

    <script>
        // File upload preview
        document.getElementById('cLogo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const label = e.target.closest('label');
                const fileName = file.name;
                label.querySelector('p').innerHTML = `<span class="font-semibold text-blue-600">Selected:</span> ${fileName}`;
            }
        });

        // Feature management functions
        function addFeature() {
            const container = document.getElementById('features-container');
            const featureItem = document.createElement('div');
            featureItem.className = 'feature-item flex items-center gap-3';
            featureItem.innerHTML = `
                <div class="flex-1">
                    <input 
                        type="text" 
                        name="features[]" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                        placeholder="Enter product feature"
                    >
                </div>
                <button 
                    type="button" 
                    onclick="removeFeature(this)"
                    class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg transition-colors duration-200"
                    title="Remove feature"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;
            container.appendChild(featureItem);
        }

        function removeFeature(button) {
            const featureItem = button.closest('.feature-item');
            featureItem.remove();
        }
    </script>
</body>
</html>
