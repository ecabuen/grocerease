<?php
// Start the session to access session variables
session_start();

// Check if user is logged in by verifying the session
$user_logged_in = isset($_SESSION['rider_id']); // true if logged in
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocerease</title>
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/hover-min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Ensure all images and elements are responsive */
        img.img-responsive {
            max-width: 100%;
            height: auto;
        }

        /* Make the navigation menu responsive */
        .navbar-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .navbar-menu .menu {
            flex: 1;
        }

        .navbar-menu .logo {
            flex: 0 0 auto;
        }

        .navbar-menu .user-info {
            display: flex;
            align-items: center;
            font-size: 16px;
            position: relative;
            cursor: pointer;
        }

        .navbar-menu .user-info img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Add arrow button next to user info */
        .user-info .dropdown-arrow {
            margin-left: 5px;
            font-size: 14px;
            transform: rotate(0deg);
            transition: transform 0.3s ease;
        }

        /* Dropdown menu styling */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            min-width: 150px;
            padding: 10px;
        }

        .dropdown-menu a {
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-menu a:hover {
            background-color: #ddd;
        }

        /* Show dropdown menu when clicked */
        .user-info.open .dropdown-menu {
            display: block;
        }

        .user-info img {
            margin-left: 10px;
            /* Space between image and name */
        }


        /* Adjust the menu for smaller screens */
        @media (max-width: 768px) {
            .navbar-menu .menu {
                display: none;
                /* Hidden by default */
                width: 100%;
            }

            .navbar-menu .menu.active {
                display: block;
                /* Show the menu when 'active' class is added */
                text-align: center;
            }

            .navbar-menu .menu ul {
                display: block;
                padding: 0;
            }

            .navbar-menu .menu li {
                display: block;
                margin: 10px 0;
            }

            .navbar-menu .logo {
                margin-bottom: 15px;
            }

            .navbar-menu .logo a {
                display: block;
                text-align: center;
            }

            /* Hamburger menu for small screens */
            .hamburger {
                display: none;
                /* Hidden by default for larger screens */
                cursor: pointer;
                position: absolute;
                top: 20px;
                /* Adjust as per your layout */
                right: 20px;
                /* Adjust as per your layout */
                z-index: 10;
                /* Ensure it's above other elements */
            }

            .hamburger span {
                display: block;
                width: 30px;
                height: 3px;
                background-color: #333;
                /* Adjust to contrast with your background */
                margin: 5px 0;
                transition: all 0.3s ease-in-out;
            }

            /* Show hamburger icon only for small screens */
            @media (max-width: 768px) {
                .hamburger {
                    display: block;
                }
            }

        }
    </style>
</head>

<body>
    <!-- Navigation Section Start -->
    <header class="navbar">
        <nav id="site-top-nav" class="navbar-menu navbar-fixed-top">
            <div class="container">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.php" title="Logo">
                        <img src="img/grlogo.png" alt="Logo" class="img-responsive" style="height: 80px; width: 80px; padding:0;">
                    </a>
                </div>

                <!-- Hamburger Icon for Small Screens -->
                <div class="hamburger" onclick="toggleMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <!-- Main Menu -->
                <div class="menu text-right">
                    <ul>
                        <li><a class="hvr-underline-from-center" href="home.php">Home</a></li>
                        <li><a class="hvr-underline-from-center" href="available.php">Available Orders</a></li>
                        <li><a class="hvr-underline-from-center" href="order-manage.php">Deliver Management</a></li>
                        <li><a class="hvr-underline-from-center" href="order-history.php">History</a></li>

                        <!-- Check if user is logged in and display user name and icon -->
                        <?php if ($user_logged_in): ?>
                            <li class="user-info" onclick="toggleDropdown()">
                                <span><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></span>
                                <img src="img/icon.png" alt="User Icon">
                                <i class="fa fa-chevron-down dropdown-arrow" aria-hidden="true"></i> <!-- Down arrow icon -->
                                <div class="dropdown-menu">
                                    <a href="profile.php">Profile</a>
                                    <a href="index.php">Logout</a>
                                </div>
                            </li>
                        <?php else: ?>
                            <li><a class="hvr-underline-from-center" href="index.php">Login</a></li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navigation Section End -->

    <!-- JavaScript to Toggle Menu and Dropdown Visibility -->
    <script>
        // Toggle the dropdown visibility when user info is clicked
        function toggleDropdown() {
            const userInfo = document.querySelector('.user-info');
            userInfo.classList.toggle('open');
        }

        // Toggle the menu visibility for smaller screens
        function toggleMenu() {
            const menu = document.querySelector('.navbar-menu .menu');
            menu.classList.toggle('active');
        }
    </script>
</body>

</html>