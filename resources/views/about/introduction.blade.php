@extends('layout')

@section('content')

<section class="text-center">
  <div class="bg-white py-16 relative overflow-hidden">
      <img src="{{ asset('images/title-bg-left.png') }}" alt=""
          class="h-24 md:h-32 absolute top-1/2 left-0 transform -translate-y-1/2 opacity-80 z-0">

      <img src="{{ asset('images/title-bg-right.png') }}" alt=""
          class="h-24 md:h-32 absolute top-1/2 right-0 transform -translate-y-1/2 opacity-80 z-0">

      <div class="container mx-auto relative z-10">
          <div class="flex items-center justify-center mb-8 relative">
              <div class="text-center">
                  <h1 class="text-4xl md:text-4xl font-bold text-gray-800 mb-2">Introduction</h1>
                  <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-4"></div>
              </div>
          </div>
      </div>
  </div>
    <p class="max-w-2xl mx-auto text-gray-800 mb-4 text-left">
      Established in 2005 and officially incorporated in 2017, <b>PT. Performa Inti Nusantara</b> is a trusted software development company (software house) providing integrated management information systems. Our flagship product, <b>PINus Software</b>, offers comprehensive solutions including inventory, accounting, and financial reporting, as well as specialized systems for hospitals, clinics, pharmacies, logistics, property, HR/payroll, and manufacturing.
    </p>
    <p class="max-w-2xl mx-auto text-gray-800 mb-4 text-left">
      We also develop advanced modules such as Electronic Medical Records (eMR), online queue systems, and production management software tailored for manufacturing businesses.
    </p>
    <p class="max-w-2xl mx-auto text-gray-800 mb-4 text-left">
      With the motto "Provide Better Performance", we aim to deliver practical, reliable, and user-friendly solutions that enhance operational efficiency. Beyond software development, we provide IT consulting services to ensure each solution fits our clients’ specific needs.
    </p>
  </div>
</section>

@endsection