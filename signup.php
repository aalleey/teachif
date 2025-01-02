<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up as a Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    // signup.php

    include 'navbar.php';
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="process_signup.php" method="POST" class="p-4 border rounded shadow">
                    <h2 class="text-center mb-4">Sign Up as a Teacher</h2>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text"
                                class="form-control"
                                id="first_name"
                                name="first_name"
                                placeholder="Enter first name"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text"
                                class="form-control"
                                id="last_name"
                                name="last_name"
                                placeholder="Enter last name"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="age" class="form-label">Age</label>
                            <input type="number"
                                class="form-control"
                                id="age"
                                name="age"
                                placeholder="Enter your age"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel"
                                class="form-control"
                                id="phone"
                                name="phone"
                                placeholder="123-45-678"

                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="location" class="form-label">Location</label>
                            <input type="text"
                                class="form-control"
                                id="location"
                                name="location"
                                placeholder="Karachi, Pakistan"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="experience" class="form-label">Experience</label>
                            <input type="text"
                                class="form-control"
                                id="experience"
                                name="experience"
                                placeholder="2 Years"
                                required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="john.doe@example.com"
                            required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Enter password"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password"
                                class="form-control"
                                id="confirm_password"
                                name="confirm_password"
                                placeholder="Confirm password"
                                required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Describe your self</label>
                        <input type="text"
                            class="form-control h-24 outline-none focus:ring-2 focus:ring-blue-300"
                            id="description"
                            name="description"
                            placeholder="Your Description here"
                            required>

                        </input>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox"
                            class="form-check-input"
                            id="terms"
                            name="terms"
                            required>
                        <label class="form-check-label" for="terms">
                            I agree with the <a href="#">terms and conditions</a>
                        </label>
                    </div>


                    <div class="text-center">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">SignUp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    // signup.php

    include 'footer.php';
    ?>


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>