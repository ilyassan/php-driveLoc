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
        <button id="filterBtn" class="flex items-center gap-2 w-fit mx-auto mt-4 px-6 py-1.5 bg-red-500 text-white font-semibold rounded-lg shadow-lg hover:bg-red-600">
            Apply Filters <i class="fa-solid fa-check"></i>
        </button>
    </div>

    <div id="alert" class="text-center py-12"></div>
    <!-- Reservation Cards -->
    <div id="reservationsContainer" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php if (empty($reservations)): ?>
            <p class="text-gray-600 text-center">No reservations found.</p>
        <?php else: ?>
            <?php foreach ($reservations as $reservation): ?>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <!-- Reservation Header -->
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-secondary"><?= $reservation["vehicle_name"] ?></h3>
                            <p class="text-gray-500 text-sm"><?= $reservation["category_name"] ?></p>
                            <p class="text-gray-500 text-sm">Location: <?= $reservation["place_name"] ?></p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-sm font-semibold
                            <?php
                            $pickupDate = new DateTime($reservation["from_date"]);
                            $returnDate = new DateTime($reservation["to_date"]);
                            $now = new DateTime();

                            $statusClass = '';
                            $statusText = '';

                            if ($pickupDate > $now) {
                                $statusClass = 'bg-yellow-100 text-yellow-800';
                                $statusText = 'Upcoming';
                            } elseif ($pickupDate <= $now && $returnDate >= $now) {
                                $statusClass = 'bg-green-100 text-green-800';
                                $statusText = 'Active';
                            } else {
                                $statusClass = 'bg-gray-100 text-gray-800';
                                $statusText = 'Completed';
                            }
                            echo $statusClass;
                            ?>">
                            <?php echo $statusText; ?>
                        </span>
                    </div>

                    <!-- Reservation Details -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-500 text-sm">Pickup Date</p>
                            <p class="font-semibold"><?php echo (new DateTime($reservation["from_date"]))->format('M j, Y'); ?></p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Return Date</p>
                            <p class="font-semibold"><?php echo (new DateTime($reservation["to_date"]))->format('M j, Y'); ?></p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Duration</p>
                            <?php
                                $diff = $pickupDate->diff($returnDate);
                                $duration = $diff->days + 1;
                            ?>
                            <p class="font-semibold"><?php echo $duration; ?> Days</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Cost</p>
                            <!-- You'll likely need to fetch the total cost associated with this reservation -->
                            <p class="font-semibold text-primary">$<?= $reservation["total_cost"] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
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

    document.getElementById('filterBtn').addEventListener('click', async function() {
        const selectedStatus = document.getElementById('selectedStatus').innerText;
        const startDate = document.getElementById('start_date').value;
        const endDate = document.getElementById('end_date').value;

        const reservationsContainer = document.getElementById('reservationsContainer');

        const res = await fetch("<?= URLROOT . 'api/getReservations'?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                status: selectedStatus,
                start_date: startDate,
                to_date: endDate
            })
        });

        const data = await res.json();
        const filteredReservations = data.data;

        reservationsContainer.innerHTML = '';
        document.getElementById("alert").innerHTML = '';

        if (filteredReservations.length === 0) {
            document.getElementById("alert").innerHTML = `
                    <i class="fa-solid fa-envelope text-6xl text-gray-400 mb-6"></i>
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">No Reservations Available</h2>
                    <p class="text-gray-500">Sorry, we couldn't find any reservations matching your criteria.</p>
            `;
           return;
        }

        filteredReservations.forEach(reservation => {
            const pickupDate = new Date(reservation.from_date);
            const returnDate = new Date(reservation.to_date);
            const now = new Date();
            let statusClass = '';
            let statusText = '';

            if (pickupDate > now) {
                statusClass = 'bg-yellow-100 text-yellow-800';
                statusText = 'Upcoming';
            } else if (pickupDate <= now && returnDate >= now) {
                statusClass = 'bg-green-100 text-green-800';
                statusText = 'Active';
            } else {
                statusClass = 'bg-gray-100 text-gray-800';
                statusText = 'Completed';
            }

            const cardHTML = `
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-6">
                        <!-- Reservation Header -->
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-bold text-secondary">${reservation.vehicle_name}</h3>
                                <p class="text-gray-500 text-sm">${reservation.category_name}</p>
                                <p class="text-gray-500 text-sm">Location: ${reservation.place_name}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold ${statusClass}">
                                ${statusText}
                            </span>
                        </div>

                        <!-- Reservation Details -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-gray-500 text-sm">Pickup Date</p>
                                <p class="font-semibold">${pickupDate.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Return Date</p>
                                <p class="font-semibold">${returnDate.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Duration</p>
                                <p class="font-semibold">${Math.ceil((returnDate - pickupDate) / (1000 * 60 * 60 * 24)) + 1} Days</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Total Cost</p>
                                <p class="font-semibold text-primary">$${reservation.total_cost ? parseFloat(reservation.total_cost).toFixed(2) : '0.00'}</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            reservationsContainer.innerHTML += cardHTML;
        });

    });
</script>