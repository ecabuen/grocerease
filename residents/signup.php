<?php
include('../connection/connect.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    if ($password !== $confirm_password) {
        $alertMessage = "<script>
            Swal.fire({
                icon: 'error',
                title: 'Passwords do not match',
                text: 'Please confirm your password again!',
            });
        </script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT); 

        $sql = "INSERT INTO residents (firstname, lastname, email, password, contact, address) 
                VALUES ('$firstname', '$lastname', '$email', '$hashed_password', '$contact', '$address')";

        if (mysqli_query($db, $sql)) {
            $alertMessage = "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Account Created',
                    text: 'You have successfully signed up!',
                }).then(() => {
                    window.location.href = 'login.php'; // Redirect to login page
                });
            </script>";
        } else {
            $alertMessage = "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again later.',
                });
            </script>";
        }
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
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
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

    <!-- Signup Section Start -->
    <section class="signup">
        <div class="container">
            <h2 class="text-center" style="padding-top: 5%;">Sign Up</h2>
            <div class="heading-border"></div>

            <form action="" method="POST" class="form">
                <fieldset>
                    <legend>Sign Up</legend>
                    <p class="label">First Name</p>
                    <input type="text" name="firstname" placeholder="Enter your first name..." required>

                    <p class="label">Last Name</p>
                    <input type="text" name="lastname" placeholder="Enter your last name..." required>

                    <p class="label">Email</p>
                    <input type="email" name="email" placeholder="Enter your email..." required>

                    <p class="label">Password</p>
                    <input type="password" name="password" placeholder="Enter your password..." required>

                    <p class="label">Confirm Password</p>
                    <input type="password" name="confirm_password" placeholder="Confirm your password..." required>

                    <p class="label">Contact</p>
                    <input type="text" name="contact" placeholder="Enter your contact number..." required>

                    <p class="label">Address</p>
                    <textarea name="address" placeholder="Enter your address..." required></textarea>

                    <input type="submit" name="submit" value="Sign Up" class="btn-primary">
                </fieldset>
            </form>

        </div>
    </section>
    <!-- Signup Section End -->

    <?php if (isset($alertMessage)) echo $alertMessage; ?>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Jquery UI -->
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>

</body>

</html>