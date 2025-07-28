<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
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
            <!-- Rest of the header and content remains the same -->
            <header class="bg-white shadow-sm border-b border-gray-100 p-6">
                <!-- Header content remains unchanged -->
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Create New Article</h1>
                        <p class="text-gray-600 mt-1">Add a new article to your content library</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Status</p>
                            <p class="text-sm font-medium text-orange-600">Draft</p>
                        </div>
                        <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 p-6">
                <!-- Article Form Card -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg font-semibold text-gray-800">Article Details</h2>
                        </div>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf

                            <!-- Form fields remain the same -->
                            <!-- Title Field -->
                            <div>
                                <label for="cJudul" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Article Title (Indonesia)
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
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200"
                                        placeholder="Enter article title"
                                        required
                                    >
                                </div>
                            </div>

                            <div>
                                <label for="cTitle" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Article Title (English)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        name="cTitle" 
                                        id="cTitle"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200"
                                        placeholder="Enter article title"
                                        required
                                    >
                                </div>
                            </div>

                            <!-- Category Field -->
                            <div>
                                <label for="nID_Kategori" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Category
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                    </div>
                                    <select 
                                        name="nID_Kategori" 
                                        id="nID_Kategori"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200 appearance-none bg-white"
                                        required
                                    >
                                        <option value="">Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->ID }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Field with Updated Trix Editor -->
                            <div>
                                <label for="cKeterangan" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Article Content (Indonesia)
                                </label>
                                <input id="cKeterangan" type="hidden" name="cKeterangan">
                                <trix-editor input="cKeterangan" class="trix-content"></trix-editor>
                            </div>

                            <div>
                                <label for="cContent" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Article Content (English)
                                </label>
                                <input id="cContent" type="hidden" name="cContent">
                                <trix-editor input="cContent" class="trix-content"></trix-editor>
                            </div>

                            <!-- Rest of the form remains the same -->
                            <!-- Thumbnail Upload -->
                            <div>
                                <label for="cThumbnail" class="block text-sm font-semibold text-gray-700 mb-3">
                                    Thumbnail Image (Optional)
                                </label>
                                <div class="relative">
                                    <div class="flex items-center justify-center w-full">
                                        <label for="cThumbnail" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500">PNG, JPG or GIF (MAX. 5MB)</p>
                                            </div>
                                            <input 
                                                id="cThumbnail" 
                                                name="cThumbnail" 
                                                type="file" 
                                                class="hidden" 
                                                accept="image/*"
                                            >
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                                <a 
                                    href="{{ route('admin.articles.index') }}" 
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
                                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-4 focus:ring-green-300 flex items-center"
                                    >
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Publish Article
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Back to Articles Link -->
                <div class="mt-6">
                    <a href="{{ route('admin.articles.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Articles
                    </a>
                </div>
            </main>
        </div>
    </div>

    <script>
        // File upload preview
        document.getElementById('cThumbnail').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const label = e.target.closest('label');
                const fileName = file.name;
                label.querySelector('p').innerHTML = `<span class="font-semibold text-green-600">Selected:</span> ${fileName}`;
            }
        });
    </script>
</body>
</html>