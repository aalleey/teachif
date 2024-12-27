<nav class="bg-white shadow-md">
    <div class="container mx-auto flex justify-between items-center p-4">
        <!-- Logo and Brand -->
        <a href="/" class="flex items-center space-x-2">
            <img src="assets/logo.png" alt="Teachify Logo" class="h-8">
            <span class="text-lg font-semibold">Teachify</span>
        </a>

        <!-- Mobile Toggle Button -->
        <button id="menu-toggle" class="md:hidden text-gray-500 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

        <!-- Navigation Items -->
        <div id="menu" class="hidden md:flex space-x-6">
            <a href="index.php" class="text-gray-700 hover:text-blue-500">Home</a>
            <a href="all-tutors.php" class="text-gray-700 hover:text-blue-500">All Tutors</a>
            <a href="tutor_request.php" class="text-gray-700 hover:text-blue-500">Tutor Requests</a>
            <a href="store.php" class="text-gray-700 hover:text-blue-500">Store</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="request_tutor.php" class="text-gray-700 hover:text-blue-500">Request a Tutor</a>
            <?php else: ?>
                <a href="/contact" class="text-gray-700 hover:text-blue-500">Contact</a>
            <?php endif; ?>
        </div>

        <!-- Conditional Login/SignUp or Profile -->
        <div class="hidden md:flex items-center space-x-4">
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="relative">
                    <button id="profile-toggle" class="text-gray-700 hover:text-blue-500 focus:outline-none">
                        <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['email']); ?>
                    </button>
                    <div id="profile-menu" class="hidden absolute right-0 mt-2 bg-white shadow-lg rounded-md py-2 w-48">
                        <a href="profile.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href="logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="relative">
                    <button id="login-toggle" class="text-blue-500 border border-blue-500 px-4 py-2 rounded-md hover:bg-blue-500 hover:text-white focus:outline-none">
                        Login/SignUp
                    </button>
                    <div id="login-menu" class="hidden absolute right-0 mt-2 bg-white shadow-lg rounded-md py-2 w-48">
                        <a href="login.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Login</a>
                        <a href="signup.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">SignUp</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white shadow-md">
        <a href="index.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Home</a>
        <a href="all-tutors.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">All Tutors</a>
        <a href="tutor_request.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Tutor Requests</a>
        <a href="store.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Store</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="request_tutor.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Request a Tutor</a>
        <?php else: ?>
            <a href="/contact" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Contact</a>
        <?php endif; ?>
    </div>
</nav>

<script>
    // Toggle Menu Visibility
    document.getElementById('menu-toggle').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // Toggle Profile Menu
    document.getElementById('profile-toggle')?.addEventListener('click', () => {
        document.getElementById('profile-menu').classList.toggle('hidden');
    });

    // Toggle Login Menu
    document.getElementById('login-toggle')?.addEventListener('click', () => {
        document.getElementById('login-menu').classList.toggle('hidden');
    });
</script>
