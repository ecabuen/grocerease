<?php
include('../connection/connect.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $contact = $_POST['contact'];

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

        $sql = "INSERT INTO rider (firstname, lastname, contact, email, password, status) 
                VALUES ('$firstname', '$lastname', '$contact', '$email', '$hashed_password', 'unapproved')";

        if (mysqli_query($db, $sql)) {
            $alertMessage = "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Account Created',
                    text: 'Your account has been created! Please wait for admin approval.',
                }).then(() => {
                    window.location.href = 'index.php'; // Redirect to login page
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
    <title>GrocerEase Rider Signup</title>
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
    /* Your existing CSS styles here */
</style>

<body>

    <!-- Signup Section Start -->
    <section class="signup">
        <div class="container">
            <h2 class="text-center" style="padding-top: 5%;">Rider Sign Up</h2>
            <div class="heading-border"></div>

            <form action="" method="POST" class="form">
                <fieldset>
                    <legend>Rider Sign Up</legend>
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
