<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocerease</title>
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .header {
            background-color: #009903;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .header .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
        }

        .header .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .header .profile-section {
            display: flex;
            align-items: center;
            position: relative;
        }

        .header .profile-section img {
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        .header .dropdown-menu {
            position: absolute;
            top: 50px;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: none;
            z-index: 10;
        }

        .header .dropdown-menu.show {
            display: block;
        }

        .header .dropdown-menu .dropdown-item {
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            transition: background 0.3s;
        }

        .header .dropdown-menu .dropdown-item:hover {
            background: #f3f4f6;
            color: #009903;
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="dashboard.php" class="navbar-brand">
            <img src="images/grlogo.png" alt="Logo"> Grocerease
        </a>
        <div class="profile-section">
            <img src="images/bookingSystem/user-icn.png" alt="User" onclick="toggleDropdown()">
            <div class="dropdown-menu" id="profileDropdown">
                <a href="javascript:void(0);" onclick="logout()" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Function to toggle the dropdown visibility
        function toggleDropdown() {
            var dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('show'); // Toggle the class to show/hide dropdown
        }

        // Function to handle logout with a confirmation dialog
        function logout() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will be logged out!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php'; // Redirect to login page after logout
                }
            });
        }
    </script>
</body>

</html>
