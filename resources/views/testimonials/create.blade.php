@extends('layout')
@section('content')
<div class="flex justify-center items-center mt-10">
    <div class="w-full max-w-2xl bg-white p-8 rounded shadow">
        <h1 class="text-3xl font-bold text-center mb-8">Testimonial</h1>
        <form action="{{ route('testimonials.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold mb-1">Full Name <span class="text-red-500">*</span></label>
                <input type="text" name="cNmLengkap" class="w-full border rounded px-3 py-2" required>
                <span class="text-xs text-gray-500">What is your full name?</span>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Email <span class="text-red-500">*</span></label>
                <input type="email" name="cEmail" class="w-full border rounded px-3 py-2" required>
                <span class="text-xs text-gray-500">What is your email address?</span>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Company Name <span class="text-red-500">*</span></label>
                <input list="company-list" id="company_name" name="cNmPerusahaan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" autocomplete="off" required>
                <datalist id="company-list">
                    @foreach($clients as $client)
                        <option value="{{ $client->cKeterangan }}" data-id="{{ $client->ID }}"></option>
                    @endforeach
                </datalist>
                <input type="hidden" id="nID_Client" name="nID_Client" />
                <span class="text-xs text-gray-500">What is your company name?</span>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Position <span class="text-red-500">*</span></label>
                <input type="text" name="cPosisi" class="w-full border rounded px-3 py-2" required>
                <span class="text-xs text-gray-500">What is your company name?</span>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Headline <span class="text-red-500">*</span></label>
                <input type="text" name="cHeadline" class="w-full border rounded px-3 py-2" required>
                <span class="text-xs text-gray-500">A headline for your testimonial.</span>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Testimonial <span class="text-red-500">*</span></label>
                <textarea name="cTestimonial" class="w-full border rounded px-3 py-2" rows="5" required></textarea>
                <span class="text-xs text-gray-500">What do you think about us?</span>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-cyan-600">Submit Testimonial</button>
            </div>
            <script>
                const companyInput = document.getElementById('company_name');
                const clientIdInput = document.getElementById('nID_Client');
                const datalist = document.getElementById('company-list');
                function updateClientId() {
                    let found = false;
                    for (const option of datalist.options) {
                        if (option.value === companyInput.value) {
                            clientIdInput.value = option.getAttribute('data-id');
                            found = true;
                            break;
                        }
                    }
                    if (!found) {
                        clientIdInput.value = '';
                    }
                }
                companyInput.addEventListener('input', updateClientId);
                companyInput.addEventListener('change', updateClientId);
                // Fallback: ensure value is set on form submit
                companyInput.form.addEventListener('submit', updateClientId);
            </script>
        </form>
    </div>
</div>
@endsection