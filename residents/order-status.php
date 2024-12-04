<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrocerEase</title>
    <link href="img/grlogo.png" rel="icon">
    <!-- FontAwesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            padding: 20px;
        }

        .status-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 30px auto; /* Added margin here for space between header and content */
        }

        .status-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .icon-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 30px;
        }

        .icon-box {
            text-align: center;
            padding: 20px;
            width: 80px;
            height: 80px;
            background-color: #f0f0f0;
            border-radius: 50%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .icon-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .icon-box i {
            font-size: 40px;
            color: #333;
        }

        .icon-box p {
            font-size: 14px;
            color: #333;
            margin-top: 10px;
        }

        .line {
            width: 100%;
            height: 1px;
            background-color: #ddd;
            margin-bottom: 30px;
            margin-top:80px;
        }

        @media (max-width: 768px) {
            .icon-container {
                justify-content: space-between;
            }

            .icon-box {
                width: 70px;
                height: 70px;
                padding: 15px;
            }

            .icon-box i {
                font-size: 30px;
            }

            .icon-box p {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
<?php include('header.php'); ?>

    <div class="status-container">
        <h2>Order Status</h2>

        <!-- Icons representing the stages of the order -->
        <div class="icon-container">
            <div class="icon-box">
                <i class="fas fa-check-circle"></i>
                <p>Accepted</p>
            </div>
            <div class="icon-box">
                <i class="fas fa-shopping-bag"></i>
                <p>Items Purchased</p>
            </div>
            <div class="icon-box">
                <i class="fas fa-motorcycle"></i>
                <p>Out for Delivery</p>
            </div>
            <div class="icon-box">
                <i class="fas fa-check"></i>
                <p>Delivered</p>
            </div>
        </div>

        <!-- Line separator -->
        <div class="line"></div>

        <!-- Status description or any other content below the line -->
        <div class="status-details">
            <p>Your order is on its way! Track the progress of your delivery above.</p>
        </div>
    </div>

</body>

</html>
