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

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        h2 {
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        .heading-border {
            width: 60px;
            height: 4px;
            background-color: #4CAF50;
            margin: 10px 0 30px;
        }

        /* Order Card Styles */
        .order-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-header h3 {
            font-size: 18px;
            margin: 0;
        }

        .order-header .order-id {
            font-size: 14px;
            color: #888;
        }

        .order-details,
        .payment-info {
            margin-top: 15px;
        }

        .order-details p,
        .payment-info p {
            margin: 5px 0;
        }

        .order-details p span,
        .payment-info p span {
            font-weight: 600;
        }

        .accept-btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .accept-btn:hover {
            background-color: #45A049;
        }

        .order-list {
            list-style: none;
            margin: 10px 0 0;
            padding: 0;
        }

        .order-list li {
            margin: 5px 0;
            padding: 8px;
            border-radius: 5px;
            background-color: #f9f9f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-list li span {
            font-size: 14px;
            color: #555;
        }

        .order-list li .category {
            font-size: 12px;
            color: #888;
        }

        .icon {
            color: #4CAF50;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Available Orders</h2>
        <div class="heading-border"></div>

        <!-- Order Card -->
        <div class="order-card">
            <div class="order-header">
                <h3>Order #101</h3>
                <p class="order-id">Resident: John Doe</p>
            </div>

            <!-- Order Details -->
            <div class="order-details">
                <h4>Order Details</h4>
                <p><span>Address:</span> 123 Elm Street</p>
                <ul class="order-list">
                    <li>
                        <span>Apples</span>
                        <span class="category">Fruits</span>
                    </li>
                    <li>
                        <span>Milk</span>
                        <span class="category">Dairy</span>
                    </li>
                    <li>
                        <span>Bread</span>
                        <span class="category">Bakery</span>
                    </li>
                </ul>
            </div>

            <!-- Payment Info -->
            <div class="payment-info">
                <h4>Payment Info</h4>
                <p><span>COD Amount:</span> ₱30.00</p>
            </div>

            <!-- Accept Button -->
            <button class="accept-btn">
                <i class="fas fa-check icon"></i> Accept Order
            </button>
        </div>

        <!-- Repeat Order Card for multiple orders -->
        <div class="order-card">
            <div class="order-header">
                <h3>Order #102</h3>
                <p class="order-id">Resident: Jane Smith</p>
            </div>
            <div class="order-details">
                <h4>Order Details</h4>
                <p><span>Address:</span> 456 Pine Avenue</p>
                <ul class="order-list">
                    <li>
                        <span>Bananas</span>
                        <span class="category">Fruits</span>
                    </li>
                    <li>
                        <span>Eggs</span>
                        <span class="category">Dairy</span>
                    </li>
                    <li>
                        <span>Butter</span>
                        <span class="category">Dairy</span>
                    </li>
                </ul>
            </div>
            <div class="payment-info">
                <h4>Payment Info</h4>
                <p><span>COD Amount:</span> ₱20.00</p>
            </div>
            <button class="accept-btn">
                <i class="fas fa-check icon"></i> Accept Order
            </button>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Jquery UI -->
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->

    <script>
        // Add event listener to the accept button
        document.querySelectorAll('.accept-btn').forEach(button => {
            button.addEventListener('click', function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to accept this order.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4CAF50',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, accept it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Simulate successful action
                        Swal.fire(
                            'Accepted!',
                            'The order has been accepted and is now in progress.',
                            'success'
                        );

                        // Here you can add functionality to mark the order as "In Progress"
                    }
                });
            });
        });
    </script>

</body>

</html>