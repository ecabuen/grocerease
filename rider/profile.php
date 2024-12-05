<?php
// Include database connection
include('../connection/connect.php');

// Start session to access rider_id
session_start();

// Check if the rider is logged in
if (!isset($_SESSION['rider_id'])) {
    echo "Please log in to access your information.";
    exit;
}

// Get the rider ID from the session
$rider_id = $_SESSION['rider_id'];

// Query to fetch rider details
$sql = "SELECT * FROM rider WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $rider_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch rider details
if ($result->num_rows > 0) {
    $rider = $result->fetch_assoc();
    $firstname = $rider['firstname'];
    $lastname = $rider['lastname'];
    $contact = $rider['contact'];
    $email = $rider['email'];
    $profile_pic = $rider['profile_pic'] ?: 'img/icon.jpg';
} else {
    echo "No rider found.";
    exit;
}
?>
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
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f4f7fc;
            color: #333;
            line-height: 1.6;
            font-size: 16px;
        }

        h2,
        h3 {
            color: #333;
            font-weight: 600;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Container Styles */
        .form-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 20px;
            margin-bottom: 20px;
        }

        .profile-container img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-container p {
            font-size: 18px;
        }

        .earnings-summary {
            margin-top: 40px;
            border-top: 2px solid #ddd;
            padding-top: 20px;
        }

        .earnings-summary h3 {
            font-size: 20px;
            color: #555;
            margin-bottom: 15px;
        }

        .earnings-summary select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f7f7f7;
        }

        .earnings-summary ul {
            list-style-type: none;
            padding: 0;
        }

        .earnings-summary ul li {
            padding: 10px 0;
            border-bottom: 1px solid #f1f1f1;
            font-size: 16px;
        }

        .earnings-summary ul li span {
            display: inline-block;
            width: 100%;
            font-size: 16px;
            color: #333;
        }

        /* Form Styles */
        form {
            margin-top: 30px;
        }

        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 16px;
            color: #333;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f7f7f7;
        }

        form button {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            color: #fff;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #2980b9;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 15px;
            }

            .profile-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                /* Center content horizontally */
                justify-content: center;
                /* Center content vertically, if necessary */
                text-align: center;
                /* Ensures text inside is centered too */
                gap: 10px;
                /* Adds space between elements */
            }

            .profile-container img {
                width: 120px;
                height: 120px;
                border-radius: 50%;
                object-fit: cover;
                margin-bottom: 15px;
                /* Add space below the image */
            }

        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <div class="form-container">
        <h2>Welcome, <?php echo $firstname; ?></h2>
        <div class="profile-container">
            <img src="<?php echo $profile_pic; ?>" alt="Profile Picture">
            <!-- <p>Name: <?php echo $firstname . " " . $lastname; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Contact: <?php echo $contact; ?></p> -->
        </div>


        <!-- Update Info Form -->
        <form action="update_info.php" method="POST" enctype="multipart/form-data">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first-name" value="<?php echo $firstname; ?>" required>
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last-name" value="<?php echo $lastname; ?>" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            <label for="profile-picture">Profile Picture</label>
            <input type="file" id="profile-picture" name="profile-picture" accept="image/*">
            <button type="submit">Update Info</button>
        </form>

        <!-- Earnings Summary -->
        <div class="earnings-summary">
            <h3>Earnings Summary</h3>
            <select id="earningsPeriod" onchange="updateEarnings()">
                <option value="day">Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
            </select>
            <ul id="earningsList">
                <li>Order #101: ₱20.00</li>
                <li>Order #102: ₱15.50</li>
            </ul>
        </div>
    </div>
    <script>
        function updateEarnings() {
            const period = document.getElementById('earningsPeriod').value;
            const earningsList = document.getElementById('earningsList');
            earningsList.innerHTML = `
                <li>Order #201 (${period}): $25.00</li>
                <li>Order #202 (${period}): $30.00</li>
            `;
        }
    </script>
</body>

</html>