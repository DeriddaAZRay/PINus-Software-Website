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
                    <h1 class="text-4xl md:text-4xl font-bold text-gray-800 mb-2">Vision & Mission</h1>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col justify-center items-center gap-8 px-4">
        <!-- Vision -->
        <div class="bg-gray-100 rounded-lg shadow-lg p-6 sm:p-8 w-full max-w-2xl text-center">
            <h3 class="text-2xl font-semibold mb-4">Vision</h3>
            <p class="text-gray-800">To become a trusted and professional software house by delivering the best management information system solutions for our business partners.</p>
        </div>
        <!-- Mission -->
        <div class="bg-gray-100 rounded-lg shadow-lg p-6 sm:p-8 w-full max-w-2xl text-center">
            <h3 class="text-2xl font-semibold mb-4">Mission</h3>
            <ol class="list-decimal ml-6 text-gray-800 space-y-2 text-left">
                <li>To develop high-performing human resources and foster a strong corporate culture through the implementation of world-class management systems.</li>
                <li>To provide added value through our products by enhancing the operational performance of our clients.</li>
                <li>To build mutually beneficial partnerships with clients and collaborators, and grow together in the strategic development of their management information systems.</li>
            </ol>
        </div>
    </div>
</div>

@endsection