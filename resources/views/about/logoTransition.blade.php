@extends('layout')
@section('content')
<div class="relative w-full overflow-hidden min-h-screen flex justify-center">
    <div class="relative w-full max-w-7xl mx-auto flex">
        <!-- Background image -->
        <div class="absolute left-0 top-0 h-full w-full md:w-1/2">
            <img src="{{ asset('images/about/logo-transition.png') }}" alt="Logo Transition"
                class="h-full w-full object-cover md:object-left object-center">
            <!-- Gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-b md:bg-gradient-to-r from-transparent via-transparent to-white/40 md:to-white/40"></div>
            <!-- Mobile overlay -->
            <div class="absolute inset-0 bg-black/15 md:bg-transparent"></div>
        </div>
        
        <div class="relative min-h-screen flex items-center w-full">
            <div class="w-full md:ml-auto md:w-1/2 bg-white/10 backdrop-blur-md border border-white/30 shadow-lg min-h-screen md:min-h-auto">
                <div class="relative z-10 bg-gradient-to-b md:bg-gradient-to-r from-white/80 md:from-white/60 via-white/70 md:via-white/40 to-white/60 md:to-white/20 backdrop-blur-sm h-full">
                    <!-- Header -->
                    <div class="py-6 md:py-8 pt-12 md:pt-8 relative overflow-hidden">
                        <div class="container mx-auto relative z-10">
                            <div class="flex items-center justify-center mb-4 relative">
                                <div class="text-center">
                                    <h1 class="text-3xl md:text-3xl font-bold text-gray-800 mb-2">Logo Transition Announcement</h1>
                                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content section -->
                    <div class="px-6 py-6 md:px-8 md:py-8">
                        <div class="max-w-4xl mx-auto space-y-6">
                            <p class="text-base text-gray-800 mb-6 px-4 md:px-16 leading-relaxed">
                                As of July 1, 2025, we are pleased to announce the official update of our company logo and product branding. This change reflects our continued growth, innovation, and commitment to delivering enhanced value to our clients. While our look may be evolving, our dedication to Excellence remains the same.
                            </p>
                            
                            <!-- Logo Transitions -->
                            <div class="space-y-8">
                                <!-- Company Logo Transition -->
                                <div class="bg-white/70 backdrop-blur-sm rounded-lg p-4 md:p-6 shadow-md">
                                    <h3 class="text-lg md:text-xl font-semibold mb-4 text-gray-800 text-center">Company Logo Evolution</h3>
                                    
                                    <!-- Mobile Layout (Stack vertically) -->
                                    <div class="flex flex-col md:hidden space-y-4">
                                        <!-- Old Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-3 shadow-sm mb-2 mx-auto max-w-xs h-12 flex items-center justify-center">
                                                <img src="{{ asset('images/logo-company-lama.png') }}" alt="Old Logo" class="max-w-full max-h-8 object-contain">
                                            </div>
                                            <p class="text-sm text-gray-600">Previous Design</p>
                                        </div>
                                        
                                        <!-- Arrow -->
                                        <div class="text-red-600 text-xl font-bold text-center">↓</div>
                                        
                                        <!-- New Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-3 shadow-sm mb-2 mx-auto max-w-xs h-14 flex items-center justify-center">
                                                <img src="{{ asset('images/logo-footer.png') }}" alt="New Logo" class="max-w-full max-h-10 object-contain">
                                            </div>
                                            <p class="text-sm text-gray-600">New Design</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Desktop Layout (Side by side) -->
                                    <div class="hidden md:flex items-center justify-center space-x-12">
                                        <!-- Old Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-4 shadow-sm mb-3 w-56 h-16 flex items-center justify-center">
                                                <img src="{{ asset('images/logo-company-lama.png') }}" alt="Old Logo" class="w-48 h-10 object-contain">
                                            </div>
                                            <p class="text-sm text-gray-600">Previous Design</p>
                                        </div>
                                        
                                        <!-- Arrow -->
                                        <div class="text-red-600 text-2xl font-bold">→</div>
                                        
                                        <!-- New Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-4 shadow-sm mb-3 w-56 h-20 flex items-center justify-center">
                                                <img src="{{ asset('images/logo-footer.png') }}" alt="New Logo" class="w-48 h-12 object-contain">
                                            </div>
                                            <p class="text-sm text-gray-600">New Design</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Product Logo Transition -->
                                <div class="bg-white/70 backdrop-blur-sm rounded-lg p-4 md:p-6 shadow-md">
                                    <h3 class="text-lg md:text-xl font-semibold mb-4 text-gray-800 text-center">Product Logo Evolution</h3>
                                    
                                    <!-- Mobile Layout (Stack vertically) -->
                                    <div class="flex flex-col md:hidden space-y-4">
                                        <!-- Old Product Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-3 shadow-sm mb-2 mx-auto max-w-xs h-24 flex items-center justify-center">
                                                <img src="{{ asset('images/logo-product-lama.png') }}" alt="Old Product Logo" class="max-w-full max-h-20 object-contain">
                                            </div>
                                            <p class="text-sm text-gray-600">Previous Design</p>
                                        </div>
                                        
                                        <!-- Arrow -->
                                        <div class="text-red-600 text-xl font-bold text-center">↓</div>
                                        
                                        <!-- New Product Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-3 shadow-sm mb-2 mx-auto max-w-xs h-24 flex items-center justify-center">
                                                <img src="{{ asset('images/logo.png') }}" alt="New Product Logo" class="max-w-full max-h-20 object-contain">
                                            </div>
                                            <p class="text-sm text-gray-600">New Design</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Desktop Layout (Side by side) -->
                                    <div class="hidden md:flex items-center justify-center space-x-12">
                                        <!-- Old Product Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-4 shadow-sm mb-3 w-48 h-32 flex items-center justify-center">
                                                <img src="{{ asset('images/logo-product-lama.png') }}" alt="Old Product Logo" class="w-40 h-28 object-contain">
                                            </div>
                                            <p class="text-sm text-gray-600">Previous Design</p>
                                        </div>
                                        
                                        <!-- Arrow -->
                                        <div class="text-red-600 text-2xl font-bold">→</div>
                                        
                                        <!-- New Product Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-4 shadow-sm mb-3 w-48 h-32 flex items-center justify-center">
                                                <img src="{{ asset('images/logo.png') }}" alt="New Product Logo" class="w-40 h-28 object-contain">
                                            </div>
                                            <p class="text-sm text-gray-600">New Design</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection