@extends('layout')
@section('content')
<div class="relative w-full overflow-hidden min-h-screen flex justify-center">
    <div class="relative w-full max-w-7xl mx-auto flex">
        <!-- Background image -->
        <div class="absolute left-0 top-0 h-full w-full md:w-1/2">
            <img src="{{ asset('images/about/logo-transition.png') }}" alt="Logo Transition"
                class="h-full w-full object-cover md:object-left object-center">
            <!-- Mobile overlay -->
            <div class="absolute inset-0 bg-black/15 md:bg-transparent"></div>
        </div>
        
        <div class="relative min-h-screen flex items-center w-full">
            <div class="w-full md:ml-auto md:w-1/2 bg-white/10 backdrop-blur-md border border-white/30 shadow-lg min-h-screen md:min-h-auto">
                <div class="relative z-10 bg-gradient-to-b md:bg-gradient-to-r from-white/80 md:from-white/60 via-white/70 md:via-white/40 to-white/60 md:to-white/20 backdrop-blur-sm h-full">
                    <!-- Header -->
                    <div class="py-1 md:py-1 pt-2 md:pt-8 relative overflow-hidden">
                        <div class="container mx-auto relative z-10 px-4 md:px-0">
                            <div class="flex items-center justify-center mb-3 md:mb-4 relative">
                                <div class="text-center">
                                    <h1 class="text-xl md:text-3xl font-bold text-gray-800 mb-2 leading-tight">Logo Transition Announcement</h1>
                                    <div class="w-20 md:w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content section -->
                    <div class="px-4 py-1 md:px-8 md:py-1 overflow-y-auto h-[calc(100vh-140px)] md:h-auto">
                        <div class="max-w-4xl mx-auto space-y-4 md:space-y-6">
                            <p class="text-sm md:text-base text-gray-800 mb-4 md:mb-6 px-0 md:px-16 leading-relaxed">
                                As of July 1, 2025, we are pleased to announce the official update of our company logo and product branding. This change reflects our continued growth, innovation, and commitment to delivering enhanced value to our clients. While our look may be evolving, our dedication to Excellence remains the same.
                            </p>
                            
                            <!-- Logo Transitions -->
                            <div class="space-y-6 md:space-y-8">
                                <!-- Company Logo Transition -->
                                <div class="bg-white/70 backdrop-blur-sm rounded-lg p-3 md:p-6 shadow-md">
                                    <h3 class="text-base md:text-xl font-semibold mb-3 md:mb-4 text-gray-800 text-center">Company Logo Transition</h3>
                                    
                                    <div class="flex flex-col space-y-3 md:space-y-4">
                                        <!-- Old Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-2 md:p-3 shadow-sm mb-2 mx-auto max-w-xs h-12 md:h-16 lg:h-24 flex items-center justify-center">
                                                <img src="{{ asset('images/logo-company-lama.png') }}" alt="Old Logo" class="max-w-full max-h-8 md:max-h-12 lg:max-h-16 object-contain">
                                            </div>
                                            <p class="text-xs md:text-sm text-gray-600">Previous Design</p>
                                        </div>
                                        
                                        <!-- Arrow -->
                                        <div class="text-red-600 text-2xl md:text-4xl lg:text-5xl font-bold text-center">↓</div>
                                        
                                        <!-- New Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-2 md:p-3 shadow-sm mb-2 mx-auto max-w-xs h-12 md:h-16 lg:h-24 flex items-center justify-center">
                                                <img src="{{ asset('images/logo-footer.png') }}" alt="New Logo" class="max-w-full max-h-8 md:max-h-12 lg:max-h-16 object-contain">
                                            </div>
                                            <p class="text-xs md:text-sm text-gray-600">New Design</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Product Logo Transition -->
                                <div class="bg-white/70 backdrop-blur-sm rounded-lg p-3 md:p-6 shadow-md">
                                    <h3 class="text-base md:text-xl font-semibold mb-3 md:mb-4 text-gray-800 text-center">Product Logo Transition</h3>
                                    
                                    <div class="flex flex-col space-y-3 md:space-y-4">
                                        <!-- Old Product Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-2 md:p-3 shadow-sm mb-2 mx-auto max-w-xs h-16 md:h-24 lg:h-32 flex items-center justify-center">
                                                <img src="{{ asset('images/logo-product-lama.png') }}" alt="Old Product Logo" class="max-w-full max-h-12 md:max-h-20 lg:max-h-28 object-contain">
                                            </div>
                                            <p class="text-xs md:text-sm text-gray-600">Previous Design</p>
                                        </div>
                                        
                                        <!-- Arrow -->
                                        <div class="text-red-600 text-2xl md:text-4xl lg:text-5xl font-bold text-center">↓</div>
                                        
                                        <!-- New Product Logo -->
                                        <div class="text-center">
                                            <div class="bg-white rounded-lg p-2 md:p-3 shadow-sm mb-2 mx-auto max-w-xs h-16 md:h-24 lg:h-32 flex items-center justify-center">
                                                <img src="{{ asset('images/logo.png') }}" alt="New Product Logo" class="max-w-full max-h-12 md:max-h-20 lg:max-h-28 object-contain">
                                            </div>
                                            <p class="text-xs md:text-sm text-gray-600">New Design</p>
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