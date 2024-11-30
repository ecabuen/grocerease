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
    <!-- Navigation Section Start -->
    <header class="navbar">
        <nav id="site-top-nav" class="navbar-menu navbar-fixed-top">
            <div class="container">
                <!-- Logo -->
                <div class="logo">
                    <a href="index.php" title="Logo">
                        <img src="img/logo.png" alt="Logo" class="img-responsive">
                    </a>
                </div>
                <!-- Main Menu -->
                <div class="menu text-right">
                    <ul>
                        <li><a class="hvr-underline-from-center" href="index.php">Home</a></li>
                        <li><a class="hvr-underline-from-center" href="categories.php">Categories</a></li>
                        <!-- <li><a class="hvr-underline-from-center" href="foods.php">Foods</a></li> -->
                        <li><a class="hvr-underline-from-center" href="order.php">List</a></li>
                        <li><a class="hvr-underline-from-center" href="login.php">Login</a></li>
                        <li>
                            <a id="shopping-cart" class="shopping-cart">
                                <i class="fa fa-cart-arrow-down"></i>
                            </a>
                            <div id="cart-content" class="cart-content">
                                <h3 class="text-center">Shopping Cart</h3>
                                <table class="cart-table" border="0">
                                    <tr>
                                        <th>Food</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td><img src="img/food/p1.jpg" alt="Food"></td>
                                        <td>Pizza</td>
                                        <td>$ 8.00</td>
                                        <td>1</td>
                                        <td>$ 8.00</td>
                                        <td><a href="#" class="btn-delete">&times;</a></td>
                                    </tr>
                                    <tr>
                                        <td><img src="img/food/s1.jpg" alt="Food"></td>
                                        <td>Sandwich</td>
                                        <td>$ 8.00</td>
                                        <td>1</td>
                                        <td>$ 8.00</td>
                                        <td><a href="#" class="btn-delete">&times;</a></td>
                                    </tr>
                                    <tr>
                                        <td><img src="img/food/b1.jpg" alt="Food"></td>
                                        <td>Burger</td>
                                        <td>$ 8.00</td>
                                        <td>1</td>
                                        <td>$ 8.00</td>
                                        <td><a href="#" class="btn-delete">&times;</a></td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th>$24.00</th>
                                        <th></th>
                                    </tr>
                                </table>
                                <a href="order.php" class="btn-primary">Confirm Order</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Navigation Section End -->
