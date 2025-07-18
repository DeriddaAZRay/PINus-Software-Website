@extends('layout')

@section('content')

  <section class="py-10 px-16 text-center">
    <div class="container mx-auto px-6">
      <div class="flex items-center justify-center mb-4">
        <img src="{{ asset('images/title-bg-left.png') }}" alt="" class="h-32 mr-6 flex-shrink-0 absolute left-0">
        <h2 class="text-3xl font-bold flex-shrink-0 relative z-10">Introduction</h2>
        <img src="{{ asset('images/title-bg-right.png') }}" alt="" class="h-32 ml-6 flex-shrink-0 absolute right-0">
      </div>
      <p class="max-w-2xl mx-auto text-gray-700 mb-4">
        Established in 2005 and officially incorporated in 2017, <b>PT. Performa Inti Nusantara</b> is a trusted software development company (software house) providing integrated management information systems. Our flagship product, <b>PINus Software</b>, offers comprehensive solutions including inventory, accounting, and financial reporting, as well as specialized systems for hospitals, clinics, pharmacies, logistics, property, HR/payroll, and manufacturing.
      </p>
      <p class="max-w-2xl mx-auto text-gray-700 mb-4">
        We also develop advanced modules such as Electronic Medical Records (eMR), online queue systems, and production management software tailored for manufacturing businesses.
      </p>
      <p class="max-w-2xl mx-auto text-gray-700 mb-4">
        With the motto "Provide Better Performance", we aim to deliver practical, reliable, and user-friendly solutions that enhance operational efficiency. Beyond software development, we provide IT consulting services to ensure each solution fits our clients’ specific needs.
      </p>
    </div>
  </section>

@endsection