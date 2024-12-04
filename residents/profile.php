<?php
// Include database connection (adjust the path as needed)
include('../connection/connect.php'); 

// Start session to access user_id
session_start();

// Check if user is logged in by verifying the session
$user_logged_in = isset($_SESSION['user_id']); // true if logged in

if ($user_logged_in) {
    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Prepare the SQL query to select the resident's data
    $query = "SELECT * FROM residents WHERE id = ?";

    // Prepare the statement
    if ($stmt = $db->prepare($query)) {
        // Bind the user_id to the placeholder
        $stmt->bind_param("i", $user_id);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if a row is returned (user found)
        if ($result->num_rows > 0) {
            // Fetch the user's data
            $user_data = $result->fetch_assoc();

            // Get the email from the fetched data
            $user_email = $user_data['email']; // Assuming the email column is named 'email'

            // Display the email or use it as needed
            echo "User's email: " . $user_email;
        } else {
            // No user found with the given ID
            echo "No user found.";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Query preparation failed
        echo "Error preparing statement: " . $db->error;
    }
} else {
    // User is not logged in
    echo "Please log in to access your information.";
}

// Close the database connection
$db->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocerease</title>
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/hover-min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Ensure all images and elements are responsive */
        /* Ensure all images and elements are responsive */
        img.img-responsive {
            max-width: 100%;
            height: auto;
        }

        /* Profile layout */
        .profile-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-container .user-info {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            /* Ensure items wrap on smaller screens */
        }

        .profile-container .user-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-container .user-info h2 {
            margin: 0;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50,
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .input-group input,
        .input-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .input-group input[type="file"] {
            padding: 5px;
        }

        .btn-update {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        .btn-update:hover {
            background-color: #45a049;
        }

        /* Modal styles */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            /* Semi-transparent background */
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
        }

        .modal-close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .modal-close:hover,
        .modal-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .password-section {
            margin-top: 40px;
        }

        .password-section .input-group {
            margin-bottom: 25px;
        }

        /* Mobile-friendly adjustments */
        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
                /* Stack profile and info on smaller screens */
                text-align: center;
            }

            .profile-container .user-info {
                flex-direction: column;
                align-items: center;
            }

            .profile-container .user-info img {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .form-container {
                padding: 15px;
            }

            .btn-update {
                width: 100%;
                /* Ensure button takes full width */
                margin-top: 15px;
            }

            .modal-content {
                width: 90%;
                /* Modal takes more space on smaller screens */
            }
        }

        /* Extra small devices (portrait phones, less than 576px) */
        @media (max-width: 576px) {
            .form-container {
                padding: 10px;
            }

            .input-group input,
            .input-group textarea {
                padding: 8px;
            }

            .btn-update {
                padding: 10px;
                font-size: 14px;
            }

            .modal-content {
                width: 95%;
                /* Modal width on very small screens */
            }
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>

    <!-- Navigation Section End -->

    <div class="form-container">
        <h2>Update Your Information</h2>

        <!-- Profile Section -->
        <div class="profile-container">
            <div class="user-info">
                <!-- Check if a profile picture exists, if not, use a default image -->
                <img src="<?php echo isset($_SESSION['profile_picture']) && $_SESSION['profile_picture'] ? $_SESSION['profile_picture'] : 'img/icon.jpg'; ?>" alt="Profile Picture">
                <div>
                    <h2><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></h2>
                    <p><?php echo $user_email; ?></p> <!-- Corrected this line to echo the email -->
                </div>
            </div>
        </div>

        <!-- Form for Updating Information -->
        <form action="update_info.php" method="POST" enctype="multipart/form-data">
            <!-- First Name -->
            <div class="input-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first-name" value="<?php echo $_SESSION['firstname']; ?>" required>
            </div>

            <!-- Last Name -->
            <div class="input-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last-name" value="<?php echo $_SESSION['lastname']; ?>" required>
            </div>

            <!-- Email Address -->
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="<?php echo $user_email; ?>" required> <!-- Corrected this line as well -->
            </div>

            <!-- Profile Picture Upload -->
            <div class="input-group">
                <label for="profile-picture">Profile Picture</label>
                <input type="file" id="profile-picture" name="profile-picture" accept="image/*">
            </div>

            <!-- Change Password Button -->
            <a id="changePasswordBtn">Change Password</a> <!-- Fixed missing closing tag for anchor -->

            <!-- Submit Button -->
            <button type="submit" class="btn-update">Update Information</button>
        </form>

        <!-- Password Change Modal -->
        <div id="passwordModal" class="modal">
            <div class="modal-content">
                <span class="modal-close" id="closeModal">&times;</span>
                <h2>Change Your Password</h2>
                <form action="change_password.php" method="POST">
                    <!-- New Password -->
                    <div class="input-group">
                        <label for="new-password">New Password</label>
                        <input type="password" id="new-password" name="new-password" placeholder="Enter new password">
                    </div>

                    <!-- Confirm New Password -->
                    <div class="input-group">
                        <label for="confirm-password">Confirm New Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm new password">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-update">Change Password</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle modal opening and closing -->
    <script>
        // Get modal and button elements
        var modal = document.getElementById("passwordModal");
        var btn = document.getElementById("changePasswordBtn");
        var closeModal = document.getElementById("closeModal");

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        closeModal.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
