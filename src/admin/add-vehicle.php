<?php include("./inc/header.php"); ?>

<div class="container mx-auto py-6">
    <form action="" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-center mb-4">
            <div class="flex relative justify-center w-80 h-60">
                <img id="menu-image" class="border-2 border-gray-300 rounded-lg w-full h-full" src="../../assets/images/dishes/23808324.jpg" alt="Menu">
                <label for="image" class="cursor-pointer border-2 border-gray-300 rounded-lg absolute w-full h-full bg-gray-50 text-gray-500 flex justify-center items-center">Upload an Image</label>
                <input type="file" id="image" class="hidden" accept="image/gif, image/jpeg, image/png">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Vehicle Name -->
            <div>
                <label for="vehicle_name" class="block mb-2 text-sm font-medium text-gray-700">Vehicle Name</label>
                <input type="text" id="vehicle_name" name="vehicle_name" class="outline-primary bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Porsche" required />
            </div>

            <!-- Vehicle Model -->
            <div>
                <label for="vehicle_model" class="block mb-2 text-sm font-medium text-gray-700">Vehicle Model</label>
                <input type="text" id="vehicle_model" name="vehicle_model" class="outline-primary bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="911 GT3" required />
            </div>

           <!-- Category menu -->
           <div class="relative">
                <label for="vehicle_model" class="block mb-2 text-sm font-medium text-gray-700">Vehicle Category</label>

                <span
                    id="categoriesDropdown"
                    class="flex items-center border border-gray-300 rounded-md px-4 py-2 w-full bg-gray-50 text-gray-500 focus:outline-none"
                >
                    <i class="fas fa-chair text-gray-500 mr-2"></i>
                    <span id="selectedCategories">Categories</span>
                    <i class="fas fa-chevron-down ml-auto text-gray-400"></i>
                </span>
                <!-- Dropdown Options -->
                <ul
                    id="categoriesDropdownMenu"
                    class="absolute dropdown-menu hidden bg-white shadow-md rounded-md w-full mt-2 z-10"
                >
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="selectOption('categoriesDropdown', 'selectedCategories', '2')">2</li>
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="selectOption('categoriesDropdown', 'selectedCategories', '4')">4</li>
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="selectOption('categoriesDropdown', 'selectedCategories', '6+')">6+</li>
                </ul>
            </div>

            <!-- Number of Seats -->
            <div>
                <label for="seats" class="block mb-2 text-sm font-medium text-gray-700">Number of Seats</label>
                <input type="number" id="seats" name="seats" class="outline-primary bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="4" required />
            </div>

             <!-- Price per Day -->
            <div>
                <label for="price_per_day" class="block mb-2 text-sm font-medium text-gray-700">Price per Day</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                       <span class="text-gray-500 text-sm">$</span>
                   </div>
                   <input type="number" id="price_per_day" name="price_per_day" class="outline-primary bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-7" placeholder="250" required />
                 </div>
            </div>
        </div>

        <button type="submit" class="mt-6 w-full bg-primary text-white py-2.5 rounded-lg hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary">Add Vehicle</button>
    </form>
</div>

<script>
    const label = document.querySelector("[for='image']");
    const imageInput = document.getElementById("image");
    const imageElement = document.getElementById("menu-image");

    imageInput.onchange = () => {
        if (imageInput.files && imageInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imageElement.src = e.target.result;
                label.classList.add("opacity-0");
            };

            reader.readAsDataURL(imageInput.files[0]);
        }
    };
   
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
    document.getElementById('categoriesDropdown').addEventListener('click', function (event) {
        event.stopPropagation();
        toggleDropdown('categoriesDropdown', 'categoriesDropdownMenu');
    });

    document.addEventListener('click', function () {
        closeAllDropdowns();
    });
</script>

<?php include("./inc/footer.php"); ?>