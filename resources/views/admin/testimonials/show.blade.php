<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonial Details</title>
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
                        <h1 class="text-2xl font-bold text-gray-800">Testimonial Details</h1>
                        <p class="text-gray-600 mt-1">View testimonial information</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Status</p>
                            <p class="text-sm font-medium text-blue-600">Published</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 p-6">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-lg font-semibold text-gray-800">Testimonial Information</h2>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Title -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Testimonial Title</h3>
                            <p class="text-gray-800 bg-gray-50 p-3 rounded-lg">{{ $testimonial->cHeadline }}</p>
                        </div>

                        <!-- Name -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Name</h3>
                            <p class="text-gray-800 bg-gray-50 p-3 rounded-lg">{{ $testimonial->cNmLengkap }}</p>
                        </div>

                        <!-- Company Name -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Company Name</h3>
                            <div class="text-gray-800 bg-gray-50 p-3 rounded-lg min-h-[100px]">
                                {{ $testimonial->cNmPerusahaan }}
                            </div>
                        </div>

                        <!-- Position -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Position</h3>
                            <div class="text-gray-800 bg-gray-50 p-3 rounded-lg min-h-[100px]">
                                {{ $testimonial->cPosisi }}
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Email</h3>
                            <div class="text-gray-800 bg-gray-50 p-3 rounded-lg min-h-[100px]">
                                {{ $testimonial->cEmail }}
                            </div>
                        </div>

                        <!-- Testimonial -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Testimonial</h3>
                            <div class="text-gray-800 bg-gray-50 p-3 rounded-lg min-h-[100px]">
                                {{ $testimonial->cTestimonial }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back to Products Link -->
                <div class="mt-6">
                    <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Testimonials List
                    </a>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
