<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username) || empty($password)) {
    echo '<script>
            window.onload = function() {
              Swal.fire({
                icon: "error",
                title: "Please enter both username and password!",
                showConfirmButton: true,
                confirmButtonText: "OK",
              });
            };
          </script>';
  } else {
    $loginquery = "SELECT * FROM admin WHERE username='$username' && password='" . md5($password) . "'";
    $result = mysqli_query($db, $loginquery);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
      $_SESSION["id"] = $row['id'];
      echo '<script>
              window.onload = function() {
                Swal.fire({
                  icon: "success",
                  title: "Login Successful!",
                  showConfirmButton: true,
                  confirmButtonText: "OK",
                }).then(() => {
                  window.location.href = "dashboard.php";
                });
              };
            </script>';
    } else {
      echo '<script>
                window.onload = function() {
                  Swal.fire({
                    icon: "error",
                    title: "Invalid Username or Password!",
                    showConfirmButton: true,
                    confirmButtonText: "OK",
                  });
                };
              </script>';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #fff;
    }

    .container {
      max-width: 400px;
      width: 100%;
      background: #fff;
      border-radius: 12px;
      padding: 40px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      color: #333;
    }

    .container h1 {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 20px;
      color: #4a90e2;
    }

    .form .thumbnail {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .form .thumbnail i {
      font-size: 80px;
      color: #4a90e2;
    }

    .form input[type="text"],
    .form input[type="password"] {
      width: 100%;
      padding: 10px 15px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
    }

    .form input[type="submit"] {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: #4a90e2;
      color: #fff;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
    }

    .form input[type="submit"]:hover {
      background: #50c9c3;
    }

    .form a {
      display: block;
      margin-top: 10px;
      text-align: center;
      color: #4a90e2;
      text-decoration: none;
    }

    .form a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .container {
        padding: 20px;
      }
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="container">
    <h1>Admin Login</h1>
    <div class="form">
      <div class="thumbnail">
        <i class="fas fa-user-circle"></i>
      </div>
      <form class="login-form" action="index.php" method="post">
        <input type="text" placeholder="Username" name="username" required />
        <input type="password" placeholder="Password" name="password" required />
        <input type="submit" name="submit" value="Login" />
      </form>
      <a href="#">Forgot Password?</a>
    </div>
  </div>
</body>

</html>
