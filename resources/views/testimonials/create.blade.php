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
            <div class="mb-4 relative">
                <label class="block font-semibold mb-1">Company Name <span class="text-red-500">*</span></label>
                <input type="text" id="company_name" name="cNmPerusahaan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" autocomplete="off" required>
                <div id="company-dropdown" class="absolute z-10 w-full bg-white border border-gray-300 rounded-b shadow-lg max-h-48 overflow-y-auto hidden">
                    @foreach($clients as $client)
                        <div class="company-option px-3 py-2 hover:bg-gray-100 cursor-pointer border-b border-gray-100 last:border-b-0" data-id="{{ $client->ID }}" data-value="{{ $client->cKeterangan }}">
                            {{ $client->cKeterangan }}
                        </div>
                    @endforeach
                </div>
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
                const dropdown = document.getElementById('company-dropdown');
                const options = document.querySelectorAll('.company-option');

                // Show dropdown on focus/input
                companyInput.addEventListener('focus', () => {
                    dropdown.classList.remove('hidden');
                    filterOptions();
                });

                companyInput.addEventListener('input', () => {
                    dropdown.classList.remove('hidden');
                    filterOptions();
                });

                // Hide dropdown when clicking outside
                document.addEventListener('click', (e) => {
                    if (!companyInput.contains(e.target) && !dropdown.contains(e.target)) {
                        dropdown.classList.add('hidden');
                    }
                });

                // Handle option selection
                options.forEach(option => {
                    option.addEventListener('click', () => {
                        companyInput.value = option.getAttribute('data-value');
                        clientIdInput.value = option.getAttribute('data-id');
                        dropdown.classList.add('hidden');
                    });
                });

                // Filter options based on input
                function filterOptions() {
                    const filter = companyInput.value.toLowerCase();
                    let hasVisibleOptions = false;

                    options.forEach(option => {
                        const text = option.getAttribute('data-value').toLowerCase();
                        if (text.includes(filter)) {
                            option.style.display = 'block';
                            hasVisibleOptions = true;
                        } else {
                            option.style.display = 'none';
                        }
                    });

                    // Hide dropdown if no options match
                    if (!hasVisibleOptions && filter !== '') {
                        dropdown.classList.add('hidden');
                    }
                }

                // Update client ID and validate selection
                function updateClientId() {
                    let found = false;
                    options.forEach(option => {
                        if (option.getAttribute('data-value') === companyInput.value) {
                            clientIdInput.value = option.getAttribute('data-id');
                            found = true;
                        }
                    });
                    if (!found) {
                        clientIdInput.value = '';
                    }
                }

                // Keyboard navigation
                let selectedIndex = -1;
                companyInput.addEventListener('keydown', (e) => {
                    const visibleOptions = Array.from(options).filter(opt => opt.style.display !== 'none');
                    
                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        selectedIndex = Math.min(selectedIndex + 1, visibleOptions.length - 1);
                        updateSelection(visibleOptions);
                    } else if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        selectedIndex = Math.max(selectedIndex - 1, -1);
                        updateSelection(visibleOptions);
                    } else if (e.key === 'Enter' && selectedIndex >= 0) {
                        e.preventDefault();
                        visibleOptions[selectedIndex].click();
                    } else if (e.key === 'Escape') {
                        dropdown.classList.add('hidden');
                        selectedIndex = -1;
                    }
                });

                function updateSelection(visibleOptions) {
                    // Remove previous selection
                    options.forEach(opt => opt.classList.remove('bg-blue-100'));
                    
                    // Add selection to current option
                    if (selectedIndex >= 0 && visibleOptions[selectedIndex]) {
                        visibleOptions[selectedIndex].classList.add('bg-blue-100');
                    }
                }

                // Reset selection when filtering
                companyInput.addEventListener('input', () => {
                    selectedIndex = -1;
                    updateClientId();
                });

                // Fallback: ensure value is set on form submit
                companyInput.form.addEventListener('submit', updateClientId);
            </script>
        </form>
    </div>
</div>
@endsection