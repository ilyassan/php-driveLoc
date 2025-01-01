<footer class="bg-primary py-8 text-white">
        <div class="container flex justify-between flex-col gap-7 sm:flex-row sm:gap-0">
            <div class="text-3xl text-center sm:text-left font-lux font-bold">CAREX</div>
            <div class="flex flex-1 justify-center gap-10 sm:justify-evenly sm:gap-0">
                <div class="flex flex-col text-based">
                    <h3 class="text-xl font-bold mb-4">Links</h3>
                    <div class="flex flex-col gap-3">
                        <span>Home</span>
                        <span>Vehicles</span>
                        <span>Reservations</span>
                    </div>
                </div>
                <div class="flex flex-col text-based">
                    <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                    <div class="flex flex-col gap-3">
                        <span>Email</span>
                        <span>Phone</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const burgerMenu = document.getElementById("burger-menu");
    const menu = document.getElementById("menu");
    burgerMenu.onclick = () => {
      menu.classList.toggle("-top-[500%]");
      menu.classList.toggle("top-full");
      burgerMenu.classList.toggle("text-primary");
      burgerMenu.classList.toggle("text-based");
    };

    let successMessage = <?= json_encode(flash("success")); ?>;
    if (successMessage) {
        Swal.fire("Success", successMessage, "success");
    }

    let errorMessage = <?= json_encode(flash("error")); ?>;
    if (errorMessage) {
        Swal.fire("Error", errorMessage, "error");
    }

    let warningMessage = <?= json_encode(flash("warning")); ?>;
    if (warningMessage) {
        Swal.fire("Warning", warningMessage, "warning");
    }
  </script>
  </body>
</html>
