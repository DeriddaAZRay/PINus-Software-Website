@extends('layout')

@section('content')

<section class="py-10">
<div class="container mx-auto px-6">
    <div class="flex items-center justify-center mb-4">
        <img src="{{ asset('images/title-bg-left.png') }}" alt="" class="h-32 mr-6 flex-shrink-0 absolute left-0">
        <h2 class="text-3xl font-bold flex-shrink-0 relative z-10">Company Legality</h2>
        <img src="{{ asset('images/title-bg-right.png') }}" alt="" class="h-32 ml-6 flex-shrink-0 absolute right-0">
    </div>
    <div class="grid md:grid-cols-2 gap-8">
    <p class="text-base text-gray-800 mb-4">
        As a commitment to transparency, professionalism, and compliance with national regulations in the field of digital technology and information systems, PT. Performa Inti Nusantara has fulfilled all necessary legal requirements and is officially registered as a legal business entity and electronic system provider.
    </p>
    <div>
        <h3 class="text-xl font-semibold mb-2">Legal Credentials</h3>
        <ul class="list-disc ml-6 text-gray-700">
            <li><strong>Company Name:</strong> PT. Performa Inti Nusantara</li>
            <li><strong>Business Identification Number (NIB):</strong> 0507220028003</li>
            <li><strong>Tax Identification Number (NPWP):</strong> 83.012.733.8-606.000</li>
            <li><strong>Registered Product Name:</strong> PINus Software</li>
            <li><strong>Electronic System Provider (PSE):</strong> 009043.01/DJAI.PSE/02/2023</li>
            <li><strong>Officially Integrated with SATUSEHAT</strong> by the Indonesian Ministry of Health</li>
        </ul>
        <p class="mt-4 text-gray-800">
            PT. Performa Inti Nusantara (PINus Software) is a recognized developer integrated into the SATUSEHAT ecosystem, enabling PINus Software to securely interact with the national health data platform in accordance with regulatory standards.
        </p>
    </div>
    </div>
</div>
</section>

@endsection