<?php
// Include database connection file
include('../connection/connect.php');

// Start session to store error message
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database for the rider
    $sql = "SELECT id, firstname, lastname, contact, email, profile_pic, password, status FROM rider WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email); // Bind email parameter
    $stmt->execute();              // Execute the query
    $result = $stmt->get_result(); // Get the result

    // Check if the rider exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the rider data

        // Check the rider's status
        if ($row['status'] == 'unapproved') {
            // If status is 'unapproved', show a SweetAlert2 notice
            $_SESSION['error_message'] = 'Your account is under review. Please wait for approval.';
            header("Location: index.php"); // Redirect back to login page
            exit;
        }

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Correct password and approved status, set session variables and redirect
            $_SESSION['rider_id'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];

                        // Redirect to homepage
            // Redirect back to the login page with user details as query parameters
            header("Location: home.php?user_id=" . urlencode($_SESSION['user_id']) . "&firstname=" . urlencode($_SESSION['firstname']) . "&lastname=" . urlencode($_SESSION['lastname']));
            exit;

        } else {
            // Incorrect password, set session error message
            $_SESSION['error_message'] = 'Invalid password.';
            header("Location: index.php"); // Redirect back to login page
            exit;
        }
    } else {
        // Email not found, set session error message
        $_SESSION['error_message'] = 'Email not found.';
        header("Location: index.php"); // Redirect back to login page
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrocerEase</title>
    <link href="img/grlogo.png" rel="icon">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <!-- Hover CSS -->
    <link rel="stylesheet" href="css/hover-min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

<style>
    .signup-link a {
        color: #007bff;
        /* Default link color */
        text-decoration: none;
        /* Remove underline */
        transition: color 0.3s ease;
        /* Smooth transition for color change */
    }

    .signup-link a:hover {
        color: #cd853f;
        /* Color on hover */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        .form {
            width: 100%;
            max-width: 100%;
            /* Make the form take full width on smaller screens */
            padding: 20px;
            /* Ensure the form retains its padding */
        }

        .text-center {
            font-size: 22px;
            /* Adjust heading size for better readability */
        }

        .heading-border {
            width: 80px;
            /* Slightly smaller border for heading */
        }

        form input[type="email"],
        form input[type="password"] {
            font-size: 14px;
            /* Adjust input font size */
        }

        form input[type="submit"] {
            width: 100%;
            /* Make button full width for tablets */
            font-size: 16px;
            /* Adjust font size */
            padding: 10px;
            /* Maintain button size */
        }

        .signup-link {
            font-size: 14px;
            /* Adjust the font size for the signup link */
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 10px;
        }

        .form {
            padding: 15px;
            /* Slightly reduce padding for very small screens */
        }

        .text-center {
            font-size: 18px;
            /* Further reduce the size for small devices */
        }

        .heading-border {
            width: 60px;
            /* Smaller border for heading */
        }

        form input[type="email"],
        form input[type="password"] {
            font-size: 12px;
            /* Adjust input font size for better fit */
            padding: 8px;
            /* Adjust padding for input fields */
        }

        form input[type="submit"] {
            width: 100%;
            /* Make button full width for tablets */
            font-size: 14px;
            /* Adjust font size */
            padding: 8px;
            /* Maintain button size */
        }

        .signup-link {
            font-size: 12px;
            /* Adjust the font size for the signup link */
        }
    }
</style>

<body>

     <!-- Login Section Start -->
     <section class="login">
        <div class="container">
            <h2 class="text-center">GrocerEase</h2>
            <form action="index.php" method="POST" class="form">
                <fieldset>
                    <legend>Login</legend>
                    <p class="label">Email</p>
                    <input type="email" name="email" placeholder="Enter your email..." required>
                    <p class="label">Password</p>
                    <input type="password" name="password" placeholder="Enter your password..." required>
                    <input type="submit" value="Login" class="btn-primary">
                    <p class="signup-link">Don't have an account? <a href="signup.php">Sign Up</a></p>
                </fieldset>
            </form>
        </div>
    </section>
    <!-- Login Section End -->

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <?php
    // Check if there's an error message from the session
    if (isset($_SESSION['error_message'])) {
        // Show SweetAlert2 with the error message
        echo "<script>
                Swal.fire({
                    title: 'Notice',
                    text: '" . $_SESSION['error_message'] . "',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
              </script>";

        // Clear the session error message after displaying it
        unset($_SESSION['error_message']);
    }
    ?>

</body>

</html>