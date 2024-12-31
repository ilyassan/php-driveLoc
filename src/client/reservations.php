<?php include("./inc/header.php") ?>

<section class="container bg-gray-50 py-10">
    <!-- Hero Section -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-800">My Reservations</h1>
        <p class="text-lg text-gray-600 mt-4">Track your vehicle bookings</p>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white shadow-lg p-6 rounded-lg mb-8">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <!-- Status Filter -->
            <div class="relative">
                <button
                    id="statusDropdown"
                    class="flex items-center border border-gray-300 rounded-md px-4 py-2 w-full bg-white text-gray-500 focus:outline-none"
                >
                    <i class="fas fa-filter text-gray-500 mr-2"></i>
                    <span id="selectedStatus">All Status</span>
                    <i class="fas fa-chevron-down ml-auto text-gray-400"></i>
                </button>
                <ul
                    id="statusDropdownMenu"
                    class="absolute dropdown-menu hidden bg-white shadow-md rounded-md w-full mt-2 z-10"
                >
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="selectOption('statusDropdown', 'selectedStatus', 'All Status')">All Status</li>
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="selectOption('statusDropdown', 'selectedStatus', 'Upcoming')">Upcoming</li>
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="selectOption('statusDropdown', 'selectedStatus', 'Active')">Active</li>
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="selectOption('statusDropdown', 'selectedStatus', 'Completed')">Completed</li>
                </ul>
            </div>

            <!-- Date Range Filters -->
            <div class="flex items-center border border-gray-300 rounded-md px-4 py-2">
                <i class="fas fa-calendar text-gray-500 mr-2"></i>
                <input type="text" id="start_date" class="flatpickr text-gray-500 focus:outline-none w-full" placeholder="Start Date"/>
            </div>

            <div class="flex items-center border border-gray-300 rounded-md px-4 py-2">
                <i class="fas fa-calendar text-gray-500 mr-2"></i>
                <input type="text" id="end_date" class="flatpickr text-gray-500 focus:outline-none w-full" placeholder="End Date"/>
            </div>
        </div>

        <!-- Apply Filters Button -->
        <button class="flex items-center gap-2 w-fit mx-auto mt-4 px-6 py-1.5 bg-red-500 text-white font-semibold rounded-lg shadow-lg hover:bg-red-600">
            Apply Filters <i class="fa-solid fa-check"></i>
        </button>
    </div>

    <!-- Reservation Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php for ($i = 0; $i < 4; $i++): ?>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <!-- Reservation Header -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-secondary">Porsche 911 GT3</h3>
                        <p class="text-gray-500 text-sm">Reservation #REF<?php echo sprintf('%04d', $i+1); ?></p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm font-semibold
                        <?php echo $i % 3 == 0 ? 'bg-yellow-100 text-yellow-800' : 
                               ($i % 3 == 1 ? 'bg-green-100 text-green-800' : 
                               'bg-gray-100 text-gray-800'); ?>">
                        <?php echo $i % 3 == 0 ? 'Upcoming' : 
                               ($i % 3 == 1 ? 'Active' : 
                               'Completed'); ?>
                    </span>
                </div>

                <!-- Reservation Details -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-500 text-sm">Pickup Date</p>
                        <p class="font-semibold">Dec 15, 2024</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Return Date</p>
                        <p class="font-semibold">Dec 20, 2024</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Duration</p>
                        <p class="font-semibold">5 Days</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Cost</p>
                        <p class="font-semibold text-primary">$1,250.00</p>
                    </div>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- Include flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Include flatpickr JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    // Initialize flatpickr
    flatpickr(".flatpickr", {
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "F j, Y",
        allowInput: true
    });

    function toggleDropdown(dropdownId, menuId) {
        closeAllDropdowns();
        const menu = document.getElementById(menuId);
        menu.classList.toggle('hidden');
    }

    function selectOption(dropdownId, labelId, value) {
        document.getElementById(labelId).innerText = value;
        document.getElementById(`${dropdownId}Menu`).classList.add('hidden');
    }

    function closeAllDropdowns() {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
    }

    // Event listeners for dropdown toggles
    document.getElementById('statusDropdown').addEventListener('click', function(event) {
        event.stopPropagation();
        toggleDropdown('statusDropdown', 'statusDropdownMenu');
    });

    document.addEventListener('click', function() {
        closeAllDropdowns();
    });
</script>

<?php include("./inc/footer.php") ?>