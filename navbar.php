<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo and Brand -->
        <a class="navbar-brand" href="/">
            <img src="assets/logo.png" height="32" class="me-2" alt="Teachify Logo">
            <span class="fs-4 fw-semibold">Teachify</span>
        </a>
        <?php session_start(); ?>
  
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
  
        <!-- Navigation Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/all-tutors">All Tutors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tutor_request.php">Tutor Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/store">Store</a>
                </li>
                <?php if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="request_tutor.php">Request a Tutor</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
            <?php endif; ?>
            <!-- Conditional Login/SignUp or Profile -->
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> 
                        <?php echo htmlspecialchars($_SESSION['email']); ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Login/SignUp
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="loginDropdown">
                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                        <li><a class="dropdown-item" href="signup.php">SignUp</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
  </nav>
  