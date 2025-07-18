@extends('layout')

@section('content')

<section class="py-10">
<div class="container mx-auto px-6 text-center">
    <div class="flex items-center justify-center mb-4">
    <img src="{{ asset('images/title-bg-left.png') }}" alt="" class="h-32 mr-6 flex-shrink-0 absolute left-0">
        <h2 class="text-3xl font-bold flex-shrink-0 relative z-10">Our History</h2>
        <img src="{{ asset('images/title-bg-right.png') }}" alt="" class="h-32 ml-6 flex-shrink-0 absolute right-0">
    </div>
    <p class="max-w-2xl mx-auto text-gray-700 mb-4">
        <b>PT. Performa Inti Nusantara</b> began its journey in 2005 as a small team of developers focused on creating inventory and accounting software for small and medium-sized businesses. With a strong commitment to quality and client satisfaction, the company quickly gained recognition and expanded its range of services.
    </p>
    <p class="max-w-2xl mx-auto text-gray-700 mb-4">
        As the demand for customized software grew, we ventured into developing industry-specific solutions—ranging from hospital information systems and electronic medical records (eMR) to retail, logistics, and human resource applications.
    </p>
    <p class="max-w-2xl mx-auto text-gray-700 mb-4">
        In 2017, to further strengthen our legal standing and professional identity, we officially established the business as a limited liability company under the name <b>PT. Performa Inti Nusantara</b>. This transformation marked a new chapter in our growth, enabling us to serve a broader market and scale our innovations.
    </p>
    <p class="max-w-2xl mx-auto text-gray-700">
        To date, under the product name <b>PINus Software</b>, we have delivered integrated and practical solutions to various sectors, helping clients improve efficiency, transparency, and business performance. Our journey continues with a vision to lead in the field of information systems and digital transformation.
    </p>
</div>
</section>

@endsection