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
            background-color: #ffb566;
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
            cursor: pointer;
        }

        .header .profile-section i {
            font-size: 1.5rem;
            margin-right: 8px;
        }

        .header .profile-section span {
            font-size: 1rem;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="dashboard.php" class="navbar-brand">
            <img src="images/grlogo.png" alt="Logo"> Grocerease
        </a>
        <div class="profile-section" onclick="logout()">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
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
