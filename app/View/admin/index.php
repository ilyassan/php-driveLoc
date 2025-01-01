<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<section>
    <!-- Stats Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Monthly Profit Card -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-gray-500">Monthly Profit</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2">$24,500</h3>
                </div>
                <div class="bg-primary/10 p-3 rounded-lg">
                    <i class="fas fa-dollar-sign text-primary text-xl"></i>
                </div>
            </div>
            <span class="text-sm font-medium text-green-600 flex items-center gap-1 mt-1">
                <i class="fas fa-arrow-up text-xs"></i> 12.5% from last month
            </span>
        </div>

        <!-- Monthly Reservations Card -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-gray-500">Monthly Reservations</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2">156</h3>
                </div>
                <div class="bg-blue-50 p-3 rounded-lg">
                    <i class="fas fa-calendar-check text-blue-500 text-xl"></i>
                </div>
            </div>
            <span class="text-sm font-medium text-green-600 flex items-center gap-1 mt-1">
                <i class="fas fa-arrow-up text-xs"></i> 8.2% from last month
            </span>
        </div>

        <!-- Total Clients Card -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-gray-500">Total Clients</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2">2,450</h3>
                </div>
                <div class="bg-purple-50 p-3 rounded-lg">
                    <i class="fas fa-users text-purple-500 text-xl"></i>
                </div>
            </div>
            <span class="text-sm font-medium text-green-600 flex items-center gap-1 mt-1">
                <i class="fas fa-arrow-up text-xs"></i> 4.6% from last month
            </span>
        </div>

        <!-- Average Rating Card -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-medium text-gray-500">Average Rating</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2">4.8</h3>
                    <div class="flex items-center gap-1 mt-1 text-yellow-400 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <div class="bg-yellow-50 p-3 rounded-lg">
                    <i class="fas fa-star text-yellow-500 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Monthly Revenue Chart -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Revenue Overview</h3>
            <canvas id="revenueChart" height="300"></canvas>
        </div>

        <!-- Vehicle Categories Distribution -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Popular Categories</h3>
            <canvas id="categoriesChart" height="300"></canvas>
        </div>
    </div>

    <!-- Highlights Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Top Rated Vehicle Card -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Highest Rated Vehicle</h3>
            <div class="flex gap-4">
                <img src="../images/porsche.webp" alt="Top Vehicle" class="w-32 h-32 object-cover rounded-lg">
                <div>
                    <h4 class="text-xl font-bold text-gray-800">Porsche 911 GT3</h4>
                    <div class="flex items-center gap-1 text-yellow-400 mt-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="text-gray-600 ml-2">5.0 (48 reviews)</span>
                    </div>
                    <p class="text-gray-600 mt-2">Luxury Sports Car</p>
                    <p class="text-primary font-semibold mt-2">$850/day</p>
                </div>
            </div>
        </div>

        <!-- Recent Activities Card -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Activities</h3>
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="bg-green-100 p-2 rounded-full">
                        <i class="fas fa-check text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-gray-800">New reservation: BMW M4</p>
                        <p class="text-sm text-gray-500">2 hours ago</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-blue-100 p-2 rounded-full">
                        <i class="fas fa-user text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-gray-800">New client registration</p>
                        <p class="text-sm text-gray-500">5 hours ago</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="bg-yellow-100 p-2 rounded-full">
                        <i class="fas fa-star text-yellow-600"></i>
                    </div>
                    <div>
                        <p class="text-gray-800">New 5-star review: Mercedes AMG GT</p>
                        <p class="text-sm text-gray-500">1 day ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Revenue',
                data: [18500, 22000, 19500, 24000, 21500, 24500],
                borderColor: '#EF4444',
                tension: 0.4,
                fill: true,
                backgroundColor: 'rgba(239, 68, 68, 0.1)'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    // Categories Chart
    const categoriesCtx = document.getElementById('categoriesChart').getContext('2d');
    new Chart(categoriesCtx, {
        type: 'doughnut',
        data: {
            labels: ['Sports Cars', 'Luxury Sedans', 'SUVs', 'Convertibles'],
            datasets: [{
                data: [35, 25, 20, 20],
                backgroundColor: [
                    '#EF4444',
                    '#3B82F6',
                    '#10B981',
                    '#F59E0B'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>