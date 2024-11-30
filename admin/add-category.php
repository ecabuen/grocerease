<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_FILES['image']['name'])) {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>All fields must be filled!</strong>
                </div>';
    } else {
        $fname = $_FILES['image']['name']; // Original file name
        $temp = $_FILES['image']['tmp_name'];
        $fsize = $_FILES['image']['size'];
        $extension = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
        $store = "../residents/img/category/" . $fname; // Save file with original name

        if (in_array($extension, ['jpg', 'png', 'gif', 'jpeg'])) {
            if ($fsize >= 1000000) {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Max Image Size is 1024kb!</strong> Try a different Image.
                        </div>';
            } else {
                $name = mysqli_real_escape_string($db, $_POST['name']);
                $sql = "INSERT INTO categories (name, image) VALUES ('$name', '$fname')";
                if (mysqli_query($db, $sql)) {
                    if (move_uploaded_file($temp, $store)) {
                        echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "Category Added",
                                    text: "New category added successfully!",
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(() => {
                                    window.location.href = "all-category.php";
                                });
                            </script>';
                    } else {
                        $error = '<div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Error!</strong> File could not be uploaded.
                                </div>';
                    }
                } else {
                    $error = '<div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Error!</strong> Could not insert data into the database.
                            </div>';
                }
            }
        } else {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Invalid extension!</strong> Only png, jpg, and gif are accepted.
                    </div>';
        }
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Add Category</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-container h2 {
            color: #333;
        }

        #image-preview {
            display: block;
            margin-top: 15px;
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="header">
        <?php include('admin-header.php'); ?>
    </div>
    <div id="main-wrapper">
        <div id="sidebar">
            <?php include('admin-sidebar.php'); ?>
        </div>

        <div class="form-container">
            <h2 class="text-center mb-4">Add Category</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
                </div>
                <div class="form-group">
                    <label for="image">Category Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                    <img id="image-preview" src="#" alt="Image Preview" style="display:none;">
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-block">Save</button>
            </form>
        </div>
    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        });
    </script>
</body>

</html>
