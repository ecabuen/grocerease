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

    <!-- Food Order Section Start -->
    <section class="order">
        <div class="container">
            <h2 class="text-center">Fill this form to confirm your order.</h2>
            <table class="tbl-full" border="0">
                <tr>
                    <th>S.N.</th>
                    <th>Food</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><img src="img/food/p1.jpg" alt="Food"></td>
                    <td>Pizza</td>
                    <td>$ 8.00</td>
                    <td>1</td>
                    <td>$ 8.00</td>
                    <td><a href="#" class="btn-delete">&times;</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><img src="img/food/s1.jpg" alt="Food"></td>
                    <td>Sandwich</td>
                    <td>$ 8.00</td>
                    <td>1</td>
                    <td>$ 8.00</td>
                    <td><a href="#" class="btn-delete">&times;</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><img src="img/food/b1.jpg" alt="Food"></td>
                    <td>Burder</td>
                    <td>$ 8.00</td>
                    <td>1</td>
                    <td>$ 8.00</td>
                    <td><a href="#" class="btn-delete">&times;</a></td>
                </tr>
                <tr>
                    <th colspan="5">Total</th>
                    <th>$24.00</th>
                    <th></th>
                </tr>
            </table>
            <form action="" class="form">
                <fieldset>
                    <legend>Delivery Details</legend>
                    <p class="label">Full Name</p>
                    <input type="text" placeholder="Enter your name..." required>
                    <p class="label">Phone Number</p>
                    <input type="contact" placeholder="Enter your phone..." required>
                    <p class="label">Email</p>
                    <input type="email" placeholder="Enter your email..." required>
                    <p class="label">Address</p>
                    <input type="text" placeholder="Enter your address..." required>
                    <input type="submit" value="Confirm Order" class="btn-primary">
                </fieldset>
            </form>
        </div>
    </section>
    <!-- Food Order Section End -->

    <?php include('footer.php'); ?>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Jquery UI -->
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>
</body>
</html>