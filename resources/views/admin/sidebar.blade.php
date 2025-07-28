<!-- Sidebar -->
<div class="w-64 bg-white shadow-xl border-r border-gray-100 fixed h-screen z-50">
    <!-- Main sidebar content with padding bottom for logout button -->
    <div class="h-full pb-20 overflow-y-auto hover:overflow-y-auto scrollbar-hide">
        <!-- Logo/Header -->
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h2 class="text-lg font-bold text-gray-800">Admin Panel</h2>
                    <p class="text-xs text-gray-500">Management System</p>
                </div>
            </div>
        </div>

        <!-- User Info -->
        <div class="p-6 border-b border-gray-100 bg-indigo-50">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-semibold text-gray-800">Welcome back,</p>
                    <p class="text-sm text-indigo-700 font-medium">{{ session('admin_user') }}</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="p-4">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-indigo-50 hover:text-indigo-700 transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-50 text-indigo-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-indigo-50 hover:text-indigo-700 transition-colors duration-200 {{ request()->routeIs('admin.users*') ? 'bg-indigo-50 text-indigo-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Users
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.articles.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-indigo-50 hover:text-indigo-700 transition-colors duration-200 {{ request()->routeIs('admin.articles*') ? 'bg-indigo-50 text-indigo-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        Article
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-indigo-50 hover:text-indigo-700 transition-colors duration-200 {{ request()->routeIs('admin.products*') ? 'bg-indigo-50 text-indigo-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Product
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-indigo-50 hover:text-indigo-700 transition-colors duration-200 {{ request()->routeIs('admin.testimonials*') ? 'bg-indigo-50 text-indigo-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Testimonial & Clients
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-indigo-50 hover:text-indigo-700 transition-colors duration-200 {{ request()->routeIs('admin.videos*') ? 'bg-indigo-50 text-indigo-700' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Gallery
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Logout Button -->
    <div class="absolute bottom-0 left-0 w-64 p-4 border-t border-gray-100 bg-white">
        <a href="{{ route('logout') }}" class="flex items-center p-3 text-red-600 rounded-lg hover:bg-red-50 transition-colors duration-200 w-full">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            Logout
        </a>
    </div>
</div>

<style>
/* Hide scrollbar by default */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

/* Show scrollbar on hover */
.scrollbar-hide:hover::-webkit-scrollbar {
    display: block;
    width: 8px;
}

.scrollbar-hide::-webkit-scrollbar-track {
    background: transparent;
}

.scrollbar-hide::-webkit-scrollbar-thumb {
    background: #cbd5e0;
    border-radius: 4px;
}

.scrollbar-hide::-webkit-scrollbar-thumb:hover {
    background: #a0aec0;
}
</style>
