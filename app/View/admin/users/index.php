<section class="p-6 flex justify-center">
    <!-- Clients List -->
    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-5xl">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-semibold text-gray-800">Clients</h3>
            <span class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-medium">
                5 Clients
            </span>
        </div>

        <!-- Clients Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left table-auto">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-sm font-semibold text-center">First Name</th>
                        <th class="px-6 py-3 text-sm font-semibold text-center">Last Name</th>
                        <th class="px-6 py-3 text-sm font-semibold text-center">Email</th>
                        <th class="px-6 py-3 text-sm font-semibold text-center">Registration Date</th>
                        <th class="px-6 py-3 text-sm font-semibold text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <!-- Client 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-center">John</td>
                        <td class="px-6 py-4 text-sm text-center">Doe</td>
                        <td class="px-6 py-4 text-sm text-center">john.doe@example.com</td>
                        <td class="px-6 py-4 text-sm text-center">Jan 15, 2023</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-600">
                                Active
                            </span>
                        </td>
                    </tr>

                    <!-- Client 2 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-center">Jane</td>
                        <td class="px-6 py-4 text-sm text-center">Smith</td>
                        <td class="px-6 py-4 text-sm text-center">jane.smith@example.com</td>
                        <td class="px-6 py-4 text-sm text-center">Feb 20, 2023</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-600">
                                Active
                            </span>
                        </td>
                    </tr>

                    <!-- Client 3 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-center">Alice</td>
                        <td class="px-6 py-4 text-sm text-center">Johnson</td>
                        <td class="px-6 py-4 text-sm text-center">alice.johnson@example.com</td>
                        <td class="px-6 py-4 text-sm text-center">Mar 10, 2023</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-600">
                                Inactive
                            </span>
                        </td>
                    </tr>

                    <!-- Client 4 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-center">Bob</td>
                        <td class="px-6 py-4 text-sm text-center">Brown</td>
                        <td class="px-6 py-4 text-sm text-center">bob.brown@example.com</td>
                        <td class="px-6 py-4 text-sm text-center">Apr 5, 2023</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-600">
                                Active
                            </span>
                        </td>
                    </tr>

                    <!-- Client 5 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-center">Charlie</td>
                        <td class="px-6 py-4 text-sm text-center">Davis</td>
                        <td class="px-6 py-4 text-sm text-center">charlie.davis@example.com</td>
                        <td class="px-6 py-4 text-sm text-center">May 12, 2023</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-600">
                                Inactive
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <!-- Pagination -->
        <div class="flex justify-center mt-8">
            <nav role="navigation" aria-label="Pagination Navigation">
                <ul class="flex items-center space-x-2">
                    <li>
                        <a href="#" class="px-4 py-2 rounded-md bg-white text-gray-500 hover:bg-gray-100 relative block">
                            <span class="sr-only">Previous</span>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="px-4 py-2 rounded-md bg-primary text-white hover:bg-primary-dark relative block">
                            1
                        </a>
                    </li>
                    <li>
                        <a href="#" class="px-4 py-2 rounded-md bg-white text-gray-700 hover:bg-gray-100 relative block">
                            2
                        </a>
                    </li>
                    <li>
                        <a href="#" class="px-4 py-2 rounded-md bg-white text-gray-700 hover:bg-gray-100 relative block">
                            3
                        </a>
                    </li>
                    <li>
                        <span class="px-4 py-2 rounded-md bg-gray-100 text-gray-700 relative block">
                            ...
                        </span>
                    </li>
                    <li>
                        <a href="#" class="px-4 py-2 rounded-md bg-white text-gray-700 hover:bg-gray-100 relative block">
                            8
                        </a>
                    </li>
                    <li>
                        <a href="#" class="px-4 py-2 rounded-md bg-white text-gray-500 hover:bg-gray-100 relative block">
                            <span class="sr-only">Next</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
