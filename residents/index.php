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
<?php include('header.php'); ?>
<body>
<?php include('search.php'); ?>

    <!-- Category Section Start -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categories</h2>
            <div class="heading-border"></div>

            <div class="grid-3">
            <a href="category-foods.php">
                    <div class="float-container">
                        <img src="img/category/fresh-produce.png" class="img-responsive" alt="">
                        <h3 class="float-text text-white">Fresh Products</h3>
                    </div>
                </a>
                <a href="category-foods.php">
                    <div class="float-container">
                        <img src="img/category/dairy-products.jpg" class="img-responsive" alt="">
                        <h3 class="float-text text-white">Dairy Products</h3>
                    </div>
                </a>
                <a href="category-foods.php">
                    <div class="float-container">
                        <img src="img/category/meat-and-seafood.jpg" class="img-responsive" alt="">
                        <h3 class="float-text text-white">Meat and Seafood</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- Category Section End -->
    <!-- Foods Section Start -->
    <section class="food-menu">
        <p class="text-center">
            <a href="categories.php" class="btn-primary">See All Categories</a>
        </p>
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