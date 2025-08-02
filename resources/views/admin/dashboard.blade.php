<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="flex min-h-screen relative">
        <!-- Include Sidebar -->
        @include('admin.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col ml-64">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
                        <p class="text-gray-600 mt-1">Welcome to your admin control panel</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Today</p>
                            <p class="text-sm font-medium text-gray-800" id="current-date"></p>
                        </div>
                        <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Users Card -->
                    <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow cursor-pointer" onclick="showDetails('users')">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Users</p>
                                <p class="text-2xl font-bold text-gray-800" id="total-users">1,234</p>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Un-Shown Testimonials Card -->
                    <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow cursor-pointer" onclick="showDetails('testimonials')">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Un-Shown Testimonials</p>
                                <p class="text-2xl font-bold text-gray-800" id="unshown-testimonials">27</p>
                            </div>
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Total Clients Card -->
                    <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow cursor-pointer" onclick="showDetails('clients')">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Clients</p>
                                <p class="text-2xl font-bold text-gray-800" id="total-clients">89</p>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Total Articles Card -->
                    <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow cursor-pointer" onclick="showDetails('articles')">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Articles</p>
                                <p class="text-2xl font-bold text-gray-800" id="total-articles">156</p>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Section -->
                <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
                        <div class="flex items-center space-x-2">
                            <button onclick="refreshActivity()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="space-y-4" id="activity-list">
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">New user "john.doe@email.com" registered</p>
                                <p class="text-xs text-gray-500">2 minutes ago</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">New testimonial submitted by "Sarah M."</p>
                                <p class="text-xs text-gray-500">15 minutes ago</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">Article "Web Design Trends 2025" published</p>
                                <p class="text-xs text-gray-500">1 hour ago</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">New client "TechCorp Inc." added</p>
                                <p class="text-xs text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="w-2 h-2 bg-orange-500 rounded-full mr-3"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">System backup completed successfully</p>
                                <p class="text-xs text-gray-500">3 hours ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 text-center">
                        <button onclick="loadMoreActivity()" class="px-4 py-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors text-sm font-medium">
                            Load More Activities
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal for Details -->
    <div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
            <div class="flex items-center justify-between mb-4">
                <h3 id="modalTitle" class="text-lg font-semibold text-gray-800"></h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="modalContent" class="text-gray-600">
                <!-- Content will be dynamically inserted here -->
            </div>
        </div>
    </div>

    <script>
        // Display current date
        document.getElementById('current-date').textContent = new Date().toLocaleDateString('en-US', {
            weekday: 'short',
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });

        // Global data storage
        let statsData = {};
        let activitiesData = [];

        // Load initial data
        async function loadStats() {
            try {
                const response = await fetch("{{ route('admin.api.stats') }}");
                const data = await response.json();
                statsData = data;
                
                // Update the display
                document.getElementById('total-users').textContent = data.total_users.toLocaleString();
                document.getElementById('unshown-testimonials').textContent = data.unshown_testimonials;
                document.getElementById('total-clients').textContent = data.total_clients;
                document.getElementById('total-articles').textContent = data.total_articles;
                
                // Update growth indicators (you may need to adjust these based on your data structure)
                updateGrowthIndicators(data);
            } catch (error) {
                console.error('Failed to load stats:', error);
                // Fallback to default values if API fails
                document.getElementById('total-users').textContent = '0';
                document.getElementById('unshown-testimonials').textContent = '0';
                document.getElementById('total-clients').textContent = '0';
                document.getElementById('total-articles').textContent = '0';
            }
        }

        // Load activities from API
        async function loadActivities() {
            try {
                const response = await fetch("{{ route('admin.api.activities') }}");
                const activities = await response.json();
                activitiesData = activities;
                updateActivityDisplay(activities);
            } catch (error) {
                console.error('Failed to load activities:', error);
            }
        }

        // Update activity display
        function updateActivityDisplay(activities) {
            const activityList = document.getElementById('activity-list');
            activityList.innerHTML = '';
            
            activities.forEach(activity => {
                const activityElement = document.createElement('div');
                activityElement.className = 'flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors';
                activityElement.innerHTML = `
                    <div class="w-2 h-2 bg-${activity.color}-500 rounded-full mr-3"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">${activity.message}</p>
                        <p class="text-xs text-gray-500">${activity.time}</p>
                    </div>
                `;
                activityList.appendChild(activityElement);
            });
        }

        // Update growth indicators
        function updateGrowthIndicators(data) {
            // You can customize these based on your actual data structure
            const growthElements = document.querySelectorAll('.text-green-500, .text-red-500');
            // This is a simplified version - you might want to make this more dynamic
        }

        // Function to show details modal with API data
        async function showDetails(type) {
            const modal = document.getElementById('detailModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalContent = document.getElementById('modalContent');
            
            try {
                const response = await fetch("{{ route('admin.api.detailed-stats', ['type' => ':type']) }}".replace(':type', type));
                const detailData = await response.json();
                
                let title, content;
                
                switch(type) {
                    case 'users':
                        title = 'Total Users Details';
                        content = `
                            <p class="mb-3">Current total: <strong>${detailData.total || statsData.total_users}</strong></p>
                            <p class="mb-3">Growth: <span class="text-green-500">${statsData.user_growth || '+0%'}</span> from last month</p>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm"><strong>New This Month:</strong> ${detailData.new_this_month || 0}</p>
                                <p class="text-sm"><strong>Total Registered:</strong> ${detailData.total || 0}</p>
                            </div>
                        `;
                        break;
                    case 'testimonials':
                        title = 'Un-Shown Testimonials';
                        content = `
                            <p class="mb-3">Pending review: <strong>${detailData.pending || statsData.unshown_testimonials}</strong></p>
                            <p class="mb-3">Status: <span class="text-yellow-500">${statsData.testimonial_growth || '+0 new'}</span> pending review</p>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm"><strong>This Week:</strong> ${detailData.new_this_week || 0} new testimonials</p>
                                <p class="text-sm"><strong>Approved:</strong> ${detailData.approved || 0}</p>
                                <p class="text-sm"><strong>Needs Approval:</strong> ${detailData.pending || 0}</p>
                            </div>
                        `;
                        break;
                    case 'clients':
                        title = 'Total Clients Details';
                        content = `
                            <p class="mb-3">Total clients: <strong>${detailData.total || statsData.total_clients}</strong></p>
                            <p class="mb-3">New this month: <span class="text-green-500">+${detailData.new_this_month || 0}</span></p>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm"><strong>Total Clients:</strong> ${detailData.total || 0}</p>
                                <p class="text-sm"><strong>New This Month:</strong> ${detailData.new_this_month || 0}</p>
                            </div>
                        `;
                        break;
                    case 'articles':
                        title = 'Total Articles Details';
                        content = `
                            <p class="mb-3">Published articles: <strong>${detailData.published || statsData.total_articles}</strong></p>
                            <p class="mb-3">New this month: <span class="text-green-500">+${detailData.new_this_month || 0}</span></p>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm"><strong>Total Articles:</strong> ${detailData.published || 0}</p>
                                <p class="text-sm"><strong>New This Month:</strong> ${detailData.new_this_month || 0}</p>
                            </div>
                        `;
                        break;
                }
                
                modalTitle.textContent = title;
                modalContent.innerHTML = content;
                modal.classList.remove('hidden');
            } catch (error) {
                console.error('Failed to load detailed stats:', error);
                modalTitle.textContent = 'Error';
                modalContent.innerHTML = '<p class="text-red-500">Failed to load detailed information.</p>';
                modal.classList.remove('hidden');
            }
        }

        // Function to close modal
        function closeModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        // Function to refresh activity
        async function refreshActivity() {
            await loadActivities();
        }

        // Function to load more activities (you may want to implement pagination)
        function loadMoreActivity() {
            // For now, we'll just reload the activities
            // You might want to implement pagination in your controller
            loadActivities();
        }

        // Close modal when clicking outside
        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Load initial data when page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadStats();
            loadActivities();
        });

        // Auto-refresh data every 30 seconds
        setInterval(() => {
            loadStats();
            loadActivities();
        }, 30000); // 30 seconds
    </script>
</body>
</html>