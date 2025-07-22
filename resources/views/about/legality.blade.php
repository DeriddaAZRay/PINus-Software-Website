@extends('layout')
@section('content')
<div class="relative">
    <!-- Background image -->
    <div class="absolute left-0 top-0 h-full w-full md:w-1/2">
        <img src="{{ asset('images/about/legality.png') }}" alt="Company Legality"
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
                                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Company Legality</h1>
                                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content section -->
                <div class="px-6 py-6 md:px-6 md:py-6">
                    <div class="max-w-2xl mx-auto space-y-4">
                        <p class="text-base text-gray-800 mb-4 px-16">
                            As a commitment to transparency, professionalism, and compliance with national regulations in the field of digital technology and information systems, PT. Performa Inti Nusantara has fulfilled all necessary legal requirements and is officially registered as a legal business entity and electronic system provider.
                        </p>
                        <div class="grid px-16">
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Legal Credentials</h3>
                                <ul class="list-disc ml-6 text-gray-800">
                                    <li><strong>Company Name:</strong> PT. Performa Inti Nusantara</li>
                                    <li><strong>Business Identification Number (NIB):</strong> 0507220028003</li>
                                    <li><strong>Tax Identification Number (NPWP):</strong> 83.012.733.8-606.000</li>
                                    <li><strong>Registered Product Name:</strong> PINus Software</li>
                                    <li><strong>Electronic System Provider (PSE):</strong> 009043.01/DJAI.PSE/02/2023</li>
                                    <li><strong>Officially Integrated with SATUSEHAT</strong> by the Indonesian Ministry of Health</li>
                                </ul>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-800 px-16 ">
                            PT. Performa Inti Nusantara (PINus Software) is a recognized developer integrated into the SATUSEHAT ecosystem, enabling PINus Software to securely interact with the national health data platform in accordance with regulatory standards.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection