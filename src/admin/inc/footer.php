</div>
    </main>

    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const main = document.querySelector('main');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        document.addEventListener('click', (e) => {
            if (window.innerWidth < 1024) { 
                if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                }
            }
        });

        function updateHeaderTitle() {
            const currentPage = window.location.pathname.split('/').pop().split('.')[0];
            const title = document.querySelector('header h1');
            
            const titles = {
                'dashboard': 'Dashboard',
                'vehicles': 'Vehicles Management',
                'add-vehicle': 'Add New Vehicle',
                'reservations': 'Reservations',
                'upcoming': 'Upcoming Reservations',
                'users': 'Users Management'
            };

            title.textContent = titles[currentPage] || 'Dashboard';
        }

        updateHeaderTitle();
    </script>
</body>
</html>