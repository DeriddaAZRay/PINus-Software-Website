@extends('layout')
@section('content')
<div class="relative w-full overflow-hidden min-h-screen flex justify-center">
    <div class="relative w-full max-w-7xl mx-auto flex">
        <!-- Background image -->
        <div class="absolute left-0 top-0 h-auto w-full md:w-1/2">
            <img src="{{ asset('images/about/visimisi.png') }}" alt="Vision Mission"
                class="w-full object-contain md:object-left object-top">
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
                                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Vision & Mission</h1>
                                    <div class="w-20 md:w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content section -->
                    <div class="px-4 py-1 md:px-8 md:py-1 overflow-y-auto h-[calc(100vh-140px)] md:h-auto">
                        <div class="max-w-2xl mx-auto space-y-3 md:space-y-4">
                            <div class="flex flex-col justify-center items-center gap-4 md:gap-8 px-0 md:px-4">
                                <!-- Vision -->
                                <div class="bg-gray-100 rounded-lg shadow-lg p-4 md:p-6 lg:p-8 w-full max-w-2xl text-center">
                                    <h3 class="text-lg md:text-2xl font-semibold mb-2 md:mb-4">Vision</h3>
                                    <p class="text-gray-800 text-sm md:text-base leading-relaxed">To become a trusted and professional software house by delivering the best management information system solutions for our business partners.</p>
                                </div>
                                <!-- Mission -->
                                <div class="bg-gray-100 rounded-lg shadow-lg p-4 md:p-6 lg:p-8 w-full max-w-2xl text-center pb-4 md:pb-8">
                                    <h3 class="text-lg md:text-2xl font-semibold mb-2 md:mb-4">Mission</h3>
                                    <ol class="list-decimal ml-4 md:ml-6 text-gray-800 space-y-2 text-left text-sm md:text-base leading-relaxed">
                                        <li>To develop high-performing human resources and foster a strong corporate culture through the implementation of world-class management systems.</li>
                                        <li>To provide added value through our products by enhancing the operational performance of our clients.</li>
                                        <li>To build mutually beneficial partnerships with clients and collaborators, and grow together in the strategic development of their management information systems.</li>
                                    </ol>
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