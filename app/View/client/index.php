<main class="container py-12">
    <!-- Hero Section -->
    <div class="hero flex flex-col md:flex-row items-center gap-8">
        <div class="text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-bold text-secondary mb-4">
                Get your dream <span class="text-primary">Car now</span>
            </h1>
            <p class="text-lg text-secondary font-semibold mb-6">
                Buy and sell reputable cars. Renting a car is easy and fast with Topcar.
            </p>
            <div class="flex justify-center md:justify-start gap-5 text-3xl font-bold">
                <div>
                    <p class="text-secondary">50+</p>
                    <p class="text-base font-semibold text-secondary">Car brands</p>
                </div>
                <div class="min-h-full w-0.5 bg-gray-200"></div>
                <div>
                    <p class="text-secondary">10k+</p>
                    <p class="text-base font-semibold text-secondary">Clients</p>
                </div>
            </div>
        </div>
        <div class="hidden sm:block">
            <img src=<?= ASSETSROOT . "images/car-hero.jpg"?> alt="Car Hero" class="max-w-xl -scale-x-100 mx-auto">
        </div>
    </div>

    <h1 class="font-bold text-3xl text-center text-secondary">Our Collection</h1>

    <!-- Sport Cars -->
    <section class="bg-white py-12">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-secondary">Sport Cars</h2>
            <a href="#" class="text-primary font-medium hover:underline flex items-center">
                See all <span class="ml-1"><i class="fa-solid fa-arrow-right"></i></span>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <img src=<?= ASSETSROOT . "images/porsche.webp" ?> alt="Porsche Cayenne 2020" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">Porsche Cayenne 2020</h3>
                    <p class="text-sm text-gray-500 flex items-center mb-2">
                        <span class="text-yellow-500">&#9733;</span>
                        4.8 (2,436 Reviews)
                    </p>
                    <p class="text-sm text-gray-500 mb-4 flex items-center">
                        <span class="mr-1">&#x1F4CD;</span> Hoan Kiem district, Ha Noi city
                    </p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span>4 seats</span>
                        <span>Gas</span>
                        <span>Auto</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-secondary">$400<span class="text-sm font-medium">/day</span></p>
                        <a href="#" class="bg-secondary text-white px-4 py-2 text-sm font-medium rounded-md">See more</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <img src=<?= ASSETSROOT . "images/maserati.webp"?>  alt="Maserati Levante 2021" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">Maserati Levante 2021</h3>
                    <p class="text-sm text-gray-500 flex items-center mb-2">
                        <span class="text-yellow-500">&#9733;</span>
                        4.8 (2,436 Reviews)
                    </p>
                    <p class="text-sm text-gray-500 mb-4 flex items-center">
                        <span class="mr-1">&#x1F4CD;</span> Hoan Kiem district, Ha Noi city
                    </p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span>4 seats</span>
                        <span>Gas</span>
                        <span>Auto</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-secondary">$500<span class="text-sm font-medium">/day</span></p>
                        <a href="#" class="bg-secondary text-white px-4 py-2 text-sm font-medium rounded-md">See more</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <img src=<?= ASSETSROOT . "images/bentley.webp" ?> alt="Bentley Flying Spur 2019" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">Bentley Flying Spur 2019</h3>
                    <p class="text-sm text-gray-500 flex items-center mb-2">
                        <span class="text-yellow-500">&#9733;</span>
                        4.8 (2,436 Reviews)
                    </p>
                    <p class="text-sm text-gray-500 mb-4 flex items-center">
                        <span class="mr-1">&#x1F4CD;</span> Hoan Kiem district, Ha Noi city
                    </p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span>4 seats</span>
                        <span>Gas</span>
                        <span>Auto</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-secondary">$700<span class="text-sm font-medium">/day</span></p>
                        <a href="#" class="bg-secondary text-white px-4 py-2 text-sm font-medium rounded-md">See more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Luxury Cars -->
    <section class="bg-white py-12">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-secondary">Sport Cars</h2>
            <a href="#" class="text-primary font-medium hover:underline flex items-center">
                See all <span class="ml-1"><i class="fa-solid fa-arrow-right"></i></span>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <img src=<?= ASSETSROOT . "images/porsche.webp" ?> alt="Porsche Cayenne 2020" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">Porsche Cayenne 2020</h3>
                    <p class="text-sm text-gray-500 flex items-center mb-2">
                        <span class="text-yellow-500">&#9733;</span>
                        4.8 (2,436 Reviews)
                    </p>
                    <p class="text-sm text-gray-500 mb-4 flex items-center">
                        <span class="mr-1">&#x1F4CD;</span> Hoan Kiem district, Ha Noi city
                    </p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span>4 seats</span>
                        <span>Gas</span>
                        <span>Auto</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-secondary">$400<span class="text-sm font-medium">/day</span></p>
                        <a href="#" class="bg-secondary text-white px-4 py-2 text-sm font-medium rounded-md">See more</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <img src=<?= ASSETSROOT . "images/maserati.webp"?>  alt="Maserati Levante 2021" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">Maserati Levante 2021</h3>
                    <p class="text-sm text-gray-500 flex items-center mb-2">
                        <span class="text-yellow-500">&#9733;</span>
                        4.8 (2,436 Reviews)
                    </p>
                    <p class="text-sm text-gray-500 mb-4 flex items-center">
                        <span class="mr-1">&#x1F4CD;</span> Hoan Kiem district, Ha Noi city
                    </p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span>4 seats</span>
                        <span>Gas</span>
                        <span>Auto</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-secondary">$500<span class="text-sm font-medium">/day</span></p>
                        <a href="#" class="bg-secondary text-white px-4 py-2 text-sm font-medium rounded-md">See more</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <img src=<?= ASSETSROOT . "images/bentley.webp" ?> alt="Bentley Flying Spur 2019" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">Bentley Flying Spur 2019</h3>
                    <p class="text-sm text-gray-500 flex items-center mb-2">
                        <span class="text-yellow-500">&#9733;</span>
                        4.8 (2,436 Reviews)
                    </p>
                    <p class="text-sm text-gray-500 mb-4 flex items-center">
                        <span class="mr-1">&#x1F4CD;</span> Hoan Kiem district, Ha Noi city
                    </p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span>4 seats</span>
                        <span>Gas</span>
                        <span>Auto</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-secondary">$700<span class="text-sm font-medium">/day</span></p>
                        <a href="#" class="bg-secondary text-white px-4 py-2 text-sm font-medium rounded-md">See more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OffRoad Cars -->
    <section class="bg-white py-12">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-secondary">Sport Cars</h2>
            <a href="#" class="text-primary font-medium hover:underline flex items-center">
                See all <span class="ml-1"><i class="fa-solid fa-arrow-right"></i></span>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <img src=<?= ASSETSROOT . "images/porsche.webp" ?> alt="Porsche Cayenne 2020" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">Porsche Cayenne 2020</h3>
                    <p class="text-sm text-gray-500 flex items-center mb-2">
                        <span class="text-yellow-500">&#9733;</span>
                        4.8 (2,436 Reviews)
                    </p>
                    <p class="text-sm text-gray-500 mb-4 flex items-center">
                        <span class="mr-1">&#x1F4CD;</span> Hoan Kiem district, Ha Noi city
                    </p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span>4 seats</span>
                        <span>Gas</span>
                        <span>Auto</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-secondary">$400<span class="text-sm font-medium">/day</span></p>
                        <a href="#" class="bg-secondary text-white px-4 py-2 text-sm font-medium rounded-md">See more</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <img src=<?= ASSETSROOT . "images/maserati.webp"?>  alt="Maserati Levante 2021" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">Maserati Levante 2021</h3>
                    <p class="text-sm text-gray-500 flex items-center mb-2">
                        <span class="text-yellow-500">&#9733;</span>
                        4.8 (2,436 Reviews)
                    </p>
                    <p class="text-sm text-gray-500 mb-4 flex items-center">
                        <span class="mr-1">&#x1F4CD;</span> Hoan Kiem district, Ha Noi city
                    </p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span>4 seats</span>
                        <span>Gas</span>
                        <span>Auto</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-secondary">$500<span class="text-sm font-medium">/day</span></p>
                        <a href="#" class="bg-secondary text-white px-4 py-2 text-sm font-medium rounded-md">See more</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <img src=<?= ASSETSROOT . "images/bentley.webp" ?> alt="Bentley Flying Spur 2019" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-2">Bentley Flying Spur 2019</h3>
                    <p class="text-sm text-gray-500 flex items-center mb-2">
                        <span class="text-yellow-500">&#9733;</span>
                        4.8 (2,436 Reviews)
                    </p>
                    <p class="text-sm text-gray-500 mb-4 flex items-center">
                        <span class="mr-1">&#x1F4CD;</span> Hoan Kiem district, Ha Noi city
                    </p>
                    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                        <span>4 seats</span>
                        <span>Gas</span>
                        <span>Auto</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-secondary">$700<span class="text-sm font-medium">/day</span></p>
                        <a href="#" class="bg-secondary text-white px-4 py-2 text-sm font-medium rounded-md">See more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a href="#" class="bg-primary mx-auto block w-fit text-white px-3 py-2 rounded-lg font-semibold">Explore All Cars</a>

</main>