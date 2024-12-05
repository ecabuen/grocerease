<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrocerEase Dashboard</title>
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
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2, h3 {
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .heading-border {
            width: 50px;
            height: 4px;
            background-color: #4CAF50;
            margin: 10px auto 30px;
        }

        /* Overview Section */
        .overview-grid {
            display: flex;
            gap: 20px;
            justify-content: space-between;
            margin-top: 20px;
        }

        .card {
            flex: 1;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            margin: 10px 0;
            font-size: 18px;
            color: #555;
        }

        .card p {
            font-size: 24px;
            color: #4CAF50;
            font-weight: bold;
        }

        /* Orders Table Section */
        .table-section {
            margin-top: 40px;
        }

        .table-section h3 {
            margin-bottom: 15px;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .order-table th,
        .order-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .order-table th {
            background-color: #4CAF50;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
        }

        .order-table tr:last-child td {
            border-bottom: none;
        }

        .order-table td {
            color: #555;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .overview-grid {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>

    <section class="dashboard">
        <div class="container">
            <h2 class="text-center">Dashboard</h2>
            <div class="heading-border"></div>

            <!-- Overview Section -->
            <div class="overview-grid">
                <div class="card">
                    <h3>Active Orders</h3>
                    <p>10</p>
                </div>
                <div class="card">
                    <h3>Completed Orders</h3>
                    <p>50</p>
                </div>
                <div class="card">
                    <h3>Pending Orders</h3>
                    <p>5</p>
                </div>
                <div class="card">
                    <h3>Total Deliveries</h3>
                    <p>60</p>
                </div>
            </div>

            <!-- Orders Tables -->
            <div class="table-section">
                <h3>Available Orders</h3>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#101</td>
                            <td>Pickup from Store A</td>
                            <td>Available</td>
                        </tr>
                        <tr>
                            <td>#102</td>
                            <td>Pickup from Store B</td>
                            <td>Available</td>
                        </tr>
                        <tr>
                            <td>#103</td>
                            <td>Pickup from Store C</td>
                            <td>Available</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-section">
                <h3>Active Orders</h3>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#104</td>
                            <td>En Route to Customer</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>#105</td>
                            <td>Pickup Completed</td>
                            <td>Active</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-section">
                <h3>Order History</h3>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#99</td>
                            <td>Delivered</td>
                            <td>Completed</td>
                        </tr>
                        <tr>
                            <td>#100</td>
                            <td>Delivered</td>
                            <td>Completed</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Jquery UI -->
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>
</body>

</html>
