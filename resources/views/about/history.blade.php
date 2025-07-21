@extends('layout')

@section('content')

<div class="container mx-auto text-center py-6">
    <!-- Header -->
    <div class="bg-white py-10 relative overflow-hidden">
        <img src="{{ asset('images/title-bg-left.png') }}" alt=""
            class="h-24 md:h-32 absolute top-1/2 left-0 transform -translate-y-1/2 opacity-80 z-0">

        <img src="{{ asset('images/title-bg-right.png') }}" alt=""
            class="h-24 md:h-32 absolute top-1/2 right-0 transform -translate-y-1/2 opacity-80 z-0">

        <div class="container mx-auto relative z-10">
            <div class="flex items-center justify-center mb-8 relative">
                <div class="text-center">
                    <h1 class="text-4xl md:text-4xl font-bold text-gray-800 mb-2">Our History</h1>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
                </div>
            </div>
        </div>
    </div>
    <p class="max-w-2xl mx-auto text-gray-800 mb-4 text-left">
        <b>PT. Performa Inti Nusantara</b> began its journey in 2005 as a small team of developers focused on creating inventory and accounting software for small and medium-sized businesses. With a strong commitment to quality and client satisfaction, the company quickly gained recognition and expanded its range of services.
    </p>
    <p class="max-w-2xl mx-auto text-gray-800 mb-4 text-left">
        As the demand for customized software grew, we ventured into developing industry-specific solutions—ranging from hospital information systems and electronic medical records (eMR) to retail, logistics, and human resource applications.
    </p>
    <p class="max-w-2xl mx-auto text-gray-800 mb-4 text-left">
        In 2017, to further strengthen our legal standing and professional identity, we officially established the business as a limited liability company under the name <b>PT. Performa Inti Nusantara</b>. This transformation marked a new chapter in our growth, enabling us to serve a broader market and scale our innovations.
    </p>
    <p class="max-w-2xl mx-auto text-gray-800 text-left">
        To date, under the product name <b>PINus Software</b>, we have delivered integrated and practical solutions to various sectors, helping clients improve efficiency, transparency, and business performance. Our journey continues with a vision to lead in the field of information systems and digital transformation.
    </p>
</div>
</section>

@endsection