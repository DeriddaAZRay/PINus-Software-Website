@extends('layout')

@section('content')

<div class="container mx-auto py-6">
    <div class="bg-white py-10 relative overflow-hidden">
        <img src="{{ asset('images/title-bg-left.png') }}" alt=""
            class="h-24 md:h-32 absolute top-1/2 left-0 transform -translate-y-1/2 opacity-80 z-0">

        <img src="{{ asset('images/title-bg-right.png') }}" alt=""
            class="h-24 md:h-32 absolute top-1/2 right-0 transform -translate-y-1/2 opacity-80 z-0">

        <div class="container mx-auto relative z-10">
            <div class="flex items-center justify-center mb-8 relative">
                <div class="text-center">
                    <h1 class="text-4xl md:text-4xl font-bold text-gray-800 mb-2">Company Legality</h1>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
                </div>
            </div>
        </div>
    </div>
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
</section>

@endsection