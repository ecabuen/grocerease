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
    <!-- Hover CSS -->
    <link rel="stylesheet" href="css/hover-min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<?php include('header.php'); ?>

    <!-- Login Section Start -->
    <section class="login">
        <div class="container">
            <h2 class="text-center">Login</h2>
            <div class="heading-border"></div>

            <form action="" class="form">
                <fieldset>
                    <legend>Login</legend>
                    <p class="label">Email</p>
                    <input type="email" placeholder="Enter your email..." required>
                    <p class="label">Password</p>
                    <input type="password" placeholder="Enter your password..." required>
                    <input type="submit" value="Login" class="btn-primary">
                </fieldset>
            </form>
        </div>
    </section>
    <!-- Login Section End -->

    <?php include('footer.php'); ?>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Jquery UI -->
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>
</body>
</html>