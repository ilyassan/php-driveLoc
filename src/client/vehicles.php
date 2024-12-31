<?php include("../inc/header.php") ?>

<section class="container bg-gray-50 py-10">
    <!-- Hero Section -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-800">Find Your Perfect Ride</h1>
        <p class="text-lg text-gray-600 mt-4">Explore a wide range of vehicles to suit your needs and budget.</p>
        <a href="#filter" class="mt-6 inline-block px-6 py-2 bg-red-500 text-white font-semibold rounded-lg shadow-lg hover:bg-red-600">
            Start Browsing
        </a>
    </div>

    <!-- Filter Bar -->
    <div id="filter" class="bg-white shadow-lg p-6 rounded-lg mb-8">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">

            <!-- Car Name Search -->
            <div class="flex items-center border border-gray-300 rounded-md px-4 py-2">
                <i class="fas fa-car text-gray-500"></i>
                <input type="text" placeholder="Search by name" class="ml-2 text-gray-500 focus:outline-none w-full" />
            </div>

            <!-- Number of Seats (Custom Dropdown) -->
            <div class="relative">
                <button
                    id="seatsDropdown"
                    class="flex items-center border border-gray-300 rounded-md px-4 py-2 w-full bg-white text-gray-500 focus:outline-none"
                >
                    <i class="fas fa-chair text-gray-500 mr-2"></i>
                    <span id="selectedSeats">Seats</span>
                    <i class="fas fa-chevron-down ml-auto text-gray-400"></i>
                </button>
                <!-- Dropdown Options -->
                <ul
                    id="seatsDropdownMenu"
                    class="absolute dropdown-menu hidden bg-white shadow-md rounded-md w-full mt-2 z-10"
                >
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="selectOption('seatsDropdown', 'selectedSeats', '2')">2</li>
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="selectOption('seatsDropdown', 'selectedSeats', '4')">4</li>
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="selectOption('seatsDropdown', 'selectedSeats', '6+')">6+</li>
                </ul>
            </div>
            
            <!-- Min Price -->
            <div class="flex items-center border border-gray-300 rounded-md px-4 py-2">
                <i class="fas fa-dollar-sign text-gray-500"></i>
                <input type="number" placeholder="Min Price" class="ml-2 text-gray-500 focus:outline-none w-full" />
            </div>

            <!-- Max Price -->
            <div class="flex items-center border border-gray-300 rounded-md px-4 py-2">
                <i class="fas fa-dollar-sign text-gray-500"></i>
                <input type="number" placeholder="Max Price" class="ml-2 text-gray-500 focus:outline-none w-full" />
            </div>
        </div>

        <!-- Search Button -->
        <button class="flex items-center gap-2 w-fit mx-auto mt-4 px-6 py-1.5 bg-red-500 text-white font-semibold rounded-lg shadow-lg hover:bg-red-600">
            Search <i class="fa-solid fa-search"></i>
        </button>
    </div>
</section>



<script>
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
    document.getElementById('seatsDropdown').addEventListener('click', function (event) {
        event.stopPropagation();
        toggleDropdown('seatsDropdown', 'seatsDropdownMenu');
    });

    document.addEventListener('click', function () {
        closeAllDropdowns();
    });
</script>




<?php include("../inc/footer.php") ?>
