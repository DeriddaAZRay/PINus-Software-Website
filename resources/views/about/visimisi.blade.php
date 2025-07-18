@extends('layout')

@section('content')

<section class="py-10">
    <div class="container mx-auto px-6">
        <div class="flex items-center justify-center mb-4">
            <img src="{{ asset('images/title-bg-left.png') }}" alt="" class="h-32 mr-6 flex-shrink-0 absolute left-0">
            <h2 class="text-3xl font-bold flex-shrink-0 relative z-10">Vision & Mission</h2>
            <img src="{{ asset('images/title-bg-right.png') }}" alt="" class="h-32 ml-6 flex-shrink-0 absolute right-0">
        </div>
        <div class="flex flex-col justify-center items-center gap-8 px-4">
            <!-- Vision -->
            <div class="bg-white rounded-lg shadow-lg p-6 sm:p-8 w-full max-w-md text-center">
                <h3 class="text-2xl font-semibold mb-4">Vision</h3>
                <p class="text-gray-700">To become a trusted and professional software house by delivering the best management information system solutions for our business partners.</p>
            </div>
            <!-- Mission -->
            <div class="bg-white rounded-lg shadow-lg p-6 sm:p-8 w-full max-w-md text-center">
                <h3 class="text-2xl font-semibold mb-4">Mission</h3>
                <ol class="list-decimal ml-6 text-gray-700 space-y-2 text-left">
                    <li>To develop high-performing human resources and foster a strong corporate culture through the implementation of world-class management systems.</li>
                    <li>To provide added value through our products by enhancing the operational performance of our clients.</li>
                    <li>To build mutually beneficial partnerships with clients and collaborators, and grow together in the strategic development of their management information systems.</li>
                </ol>
            </div>
        </div>
    </div>
</section>

@endsection