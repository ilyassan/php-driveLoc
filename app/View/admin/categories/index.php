<section class="p-6">
    <!-- Add Category Form Card -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Add New Category</h3>
        
        <form action="" method="POST" class="flex flex-col sm:flex-row gap-4">
            <!-- Category Name Input -->
            <div class="flex-1">
                <label for="category_name" class="block mb-2 text-sm font-medium text-gray-700">
                    Category Name
                </label>
                <input 
                    type="text" 
                    id="category_name" 
                    name="category_name" 
                    class="w-full rounded-lg border border-gray-300 p-2.5 text-gray-700 focus:ring-1 focus:ring-primary focus:border-primary outline-none"
                    placeholder="Enter category name"
                    required
                />
            </div>

            <!-- Submit Button -->
            <div class="flex items-end">
                <button 
                    type="submit"
                    name="add_category"
                    class="w-full sm:w-auto px-6 py-2.5 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 transition-colors"
                >
                    Add Category
                </button>
            </div>
        </form>
    </div>

    <!-- Categories List Card -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Vehicle Categories</h3>
            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm">
                <?= count($categories) ?> Categories
            </span>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php
            foreach ($categories as $category):
            ?>
            <div class="group shadow-md relative bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition-colors">
                <!-- Category Name -->
                <h4 class="text-gray-700 font-medium"><?= $category->getName() ?></h4>
                
                <!-- Delete Button -->
                <button 
                    onclick="confirmDelete('<?= $category->getId() ?>')"
                    class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity p-2 hover:text-red-600"
                >
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-sm mx-4">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Delete Category</h3>
        <p class="text-gray-600 mb-6">Are you sure you want to delete "<span id="categoryToDelete"></span>"? This action cannot be undone.</p>
        
        <div class="flex justify-end gap-4">
            <button 
                onclick="closeDeleteModal()"
                class="px-4 py-2 text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors"
            >
                Cancel
            </button>
            <button 
                onclick="deleteCategory()"
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors"
            >
                Delete
            </button>
        </div>
    </div>
</div>

<script>
    let categoryToDelete = '';

    function confirmDelete(category) {
        categoryToDelete = category;
        document.getElementById('categoryToDelete').textContent = category;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('flex');
        document.getElementById('deleteModal').classList.add('hidden');
        categoryToDelete = '';
    }

    function deleteCategory() {
        console.log('Deleting category:', categoryToDelete);
        
        closeDeleteModal();
    }

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });
</script>
