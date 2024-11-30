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

    <!-- Foods Section Start -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <div class="heading-border"></div>
            <div class="grid-2">
                <div class="food-menu-box">
                    <form action="">
                        <div class="food-menu-img">
                            <img src="img/food/p1.jpg" alt="" class="img-responsive img-curve">
                        </div>
                        <div class="food-menu-desc">
                            <h4>Pizza</h4>
                            <p class="food-price">$8.00</p>
                            <p class="food-details">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus excepturi porro.</p>
                            <input type="number" value="1" min="1">
                            <input type="submit" class="btn-primary" value="Add To Cart">
                        </div>
                    </form>
                </div>
                <div class="food-menu-box">
                    <form action="">
                        <div class="food-menu-img">
                            <img src="img/food/s1.jpg" alt="" class="img-responsive img-curve">
                        </div>
                        <div class="food-menu-desc">
                            <h4>Sandwich</h4>
                            <p class="food-price">$8.00</p>
                            <p class="food-details">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus excepturi porro.</p>
                            <input type="number" value="1" min="1">
                            <input type="submit" class="btn-primary" value="Add To Cart">
                        </div>
                    </form>
                </div>
                <div class="food-menu-box">
                    <form action="">
                        <div class="food-menu-img">
                            <img src="img/food/b1.jpg" alt="" class="img-responsive img-curve">
                        </div>
                        <div class="food-menu-desc">
                            <h4>Burger</h4>
                            <p class="food-price">$8.00</p>
                            <p class="food-details">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus excepturi porro.</p>
                            <input type="number" value="1" min="1">
                            <input type="submit" class="btn-primary" value="Add To Cart">
                        </div>
                    </form>
                </div>
                <div class="food-menu-box">
                    <form action="">
                        <div class="food-menu-img">
                            <img src="img/food/p1.jpg" alt="" class="img-responsive img-curve">
                        </div>
                        <div class="food-menu-desc">
                            <h4>Pizza</h4>
                            <p class="food-price">$8.00</p>
                            <p class="food-details">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus excepturi porro.</p>
                            <input type="number" value="1" min="1">
                            <input type="submit" class="btn-primary" value="Add To Cart">
                        </div>
                    </form>
                </div>
                <div class="food-menu-box">
                    <form action="">
                        <div class="food-menu-img">
                            <img src="img/food/s1.jpg" alt="" class="img-responsive img-curve">
                        </div>
                        <div class="food-menu-desc">
                            <h4>Sandwich</h4>
                            <p class="food-price">$8.00</p>
                            <p class="food-details">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus excepturi porro.</p>
                            <input type="number" value="1" min="1">
                            <input type="submit" class="btn-primary" value="Add To Cart">
                        </div>
                    </form>
                </div>
                <div class="food-menu-box">
                    <form action="">
                        <div class="food-menu-img">
                            <img src="img/food/b1.jpg" alt="" class="img-responsive img-curve">
                        </div>
                        <div class="food-menu-desc">
                            <h4>Burger</h4>
                            <p class="food-price">$8.00</p>
                            <p class="food-details">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus excepturi porro.</p>
                            <input type="number" value="1" min="1">
                            <input type="submit" class="btn-primary" value="Add To Cart">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Foods Section End -->

    <?php include('footer.php'); ?>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Jquery UI -->
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>
</body>
</html>