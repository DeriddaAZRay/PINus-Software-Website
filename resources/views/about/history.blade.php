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
                <div class="py-10 md:py-10 pt-16 md:pt-10 relative overflow-hidden">
                    <div class="container mx-auto relative z-10">
                        <div class="flex items-center justify-center mb-8 relative">
                            <div class="text-center">
                                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Our History</h1>
                                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content section -->
                <div class="px-6 py-6 md:px-6 md:py-6">
                    <div class="max-w-2xl mx-auto space-y-4">
                        <p class="text-gray-800 text-left leading-relaxed">
                            <b>PT. Performa Inti Nusantara</b> began its journey in 2005 as a small team of developers focused on creating inventory and accounting software for small and medium-sized businesses. With a strong commitment to quality and client satisfaction, the company quickly gained recognition and expanded its range of services.
                        </p>
                        <p class="text-gray-800 text-left leading-relaxed">
                            As the demand for customized software grew, we ventured into developing industry-specific solutions—ranging from hospital information systems and electronic medical records (eMR) to retail, logistics, and human resource applications.
                        </p>
                        <p class="text-gray-800 text-left leading-relaxed">
                            In 2017, to further strengthen our legal standing and professional identity, we officially established the business as a limited liability company under the name <b>PT. Performa Inti Nusantara</b>. This transformation marked a new chapter in our growth, enabling us to serve a broader market and scale our innovations.
                        </p>
                        <p class="text-gray-800 text-left leading-relaxed pb-8 md:pb-0">
                            To date, under the product name <b>PINus Software</b>, we have delivered integrated and practical solutions to various sectors, helping clients improve efficiency, transparency, and business performance. Our journey continues with a vision to lead in the field of information systems and digital transformation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection