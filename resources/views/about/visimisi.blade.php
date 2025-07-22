@extends('layout')
@section('content')
<div class="relative">
    <!-- Background image -->
    <div class="absolute left-0 top-0 h-full w-full md:w-1/2">
        <img src="{{ asset('images/about/history.png') }}" alt="Company Legality"
            class="h-full w-full object-cover md:object-left object-center">
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b md:bg-gradient-to-r from-transparent via-transparent to-white/40 md:to-white/40"></div>
        <!-- Mobile overlay -->
        <div class="absolute inset-0 bg-black/15 md:bg-transparent"></div>
    </div>
    
    <div class="container mx-auto relative">
        <div class="w-full md:ml-auto md:w-3/4 bg-white/10 backdrop-blur-md border border-white/30 shadow-lg min-h-screen md:min-h-auto">
            <div class="relative z-10 bg-gradient-to-b md:bg-gradient-to-r from-white/80 md:from-white/60 via-white/70 md:via-white/40 to-white/60 md:to-white/20 backdrop-blur-sm">
                <!-- Header -->
                <div class="py-6 md:py-6 pt-10 md:pt-6 relative overflow-hidden">
                    <div class="container mx-auto relative z-10">
                        <div class="flex items-center justify-center mb-4 relative">
                            <div class="text-center">
                                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Our History</h1>
                                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content section -->
                <div class="px-6 py-6 md:px-6 md:py-6">
                    <div class="max-w-2xl mx-auto space-y-4">
                        <div class="flex flex-col justify-center items-center gap-8 px-4">
                            <!-- Vision -->
                            <div class="bg-gray-200 rounded-lg shadow-lg p-6 sm:p-8 w-full max-w-2xl text-center">
                                <h3 class="text-2xl font-semibold mb-4">Vision</h3>
                                <p class="text-gray-800">To become a trusted and professional software house by delivering the best management information system solutions for our business partners.</p>
                            </div>
                            <!-- Mission -->
                            <div class="bg-gray-200 rounded-lg shadow-lg p-6 sm:p-8 w-full max-w-2xl text-center">
                                <h3 class="text-2xl font-semibold mb-4">Mission</h3>
                                <ol class="list-decimal ml-6 text-gray-800 space-y-2 text-left">
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
@endsection

@section('content')