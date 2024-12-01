<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocerease</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Sidebar Styling */
        .left-sidebar {
            background-color: #f8f9fa;
            height: calc(100vh - 60px);
            /* Adjust for header height */
            width: 250px;
            position: fixed;
            top: 60px;
            /* Below the header */
            left: 0;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: width 0.3s ease;
            z-index: 1000;
        }

        .sidebar-nav {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav li {
            margin: 10px 0;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .sidebar-nav a:hover {
            background-color: #787878;
            color: white;
        }

        .sidebar-nav a i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .sidebar-nav a span {
            white-space: nowrap;
            transition: opacity 0.3s ease;
        }

        /* Collapse labels when sidebar is small */
        @media (max-width: 768px) {
            .left-sidebar {
                width: 60px;
            }

            .sidebar-nav a span {
                display: none;
            }

            /* Show labels when sidebar is hovered over */
            .left-sidebar:hover a span {
                display: inline;
            }
        }

        .dropdown-menu {
            display: none;
            flex-direction: column;
            padding-left: 30px;
        }

        .sidebar-nav .has-arrow.active + .dropdown-menu {
            display: flex;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="left-sidebar" id="sidebar">
        <nav class="sidebar-nav">
            <ul>
                <li>
                    <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="residents.php"><i class="fa fa-home"></i><span>Residents</span></a>
                </li>
                <li>
                    <a href="riders.php"><i class="fa fa-motorcycle"></i><span>Riders</span></a>
                </li>
                <li>
                    <a href="all-category.php"><i class="fa fa-archive"></i><span>Categories</span></a>
                </li>
                <li>
                    <a href="add-category.php"><i class="fa fa-archive"></i><span>Add Categories</span></a>
                </li>
                <li>
                    <a href="all_orders.php"><i class="fa fa-shopping-cart"></i><span>Deliveries</span></a>
                </li>
            </ul>
        </nav>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sidebar = document.getElementById("sidebar");

            // Adjust sidebar visibility on window resize
            const updateSidebar = () => {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove("show");
                } else {
                    sidebar.classList.add("show");
                }
            };

            window.addEventListener("resize", updateSidebar);
            updateSidebar(); // Initial adjustment
        });

        function toggleDropdown(element) {
            element.classList.toggle("active");
        }
    </script>
</body>

</html>
