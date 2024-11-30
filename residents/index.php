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
                <?php
                // Include database connection file
                include("../connection/connect.php");  // Ensure this file contains your database connection code

                // Query to fetch categories
                $sql = "SELECT * FROM categories ORDER BY name ASC LIMIT 3"; // Limit to 3 categories
                $result = mysqli_query($db, $sql);

                // Check if there are categories
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $categoryName = htmlspecialchars($row['name']); // Escaping to prevent XSS
                        $categoryImage = htmlspecialchars($row['image']);

                        // Generate the category link and content
                        echo '
                        <a href="items.php">
                            <div class="float-container">
                                <img src="img/category/' . $categoryImage . '" class="img-responsive" alt="' . $categoryName . '">
                                <h3 class="float-text text-white">' . $categoryName . '</h3>
                            </div>
                        </a>';
                    }
                } else {
                    echo '<p>No categories found.</p>';
                }
 
                // Close database connection
                mysqli_close($db);
                ?>
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
