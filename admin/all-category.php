<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    if ($msg == 'success') {
        echo "<script>
            Swal.fire({
                title: 'Deleted!',
                text: 'Category deleted successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'all-category.php';
            });
        </script>";
    } elseif ($msg == 'error') {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Failed to delete the category.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>";
    }
}

if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    // Fetch the category data
    $sql = "SELECT * FROM categories WHERE id = $categoryId";
    $result = mysqli_query($db, $sql);

    if ($result) {
        $category = mysqli_fetch_assoc($result);
        echo json_encode($category);
    } else {
        echo json_encode(['error' => 'Category not found']);
    }
}

// Fetch the category for editing if id is provided
$categoryIdToEdit = isset($_GET['id']) ? $_GET['id'] : null;
$categoryData = null;
if ($categoryIdToEdit) {
    $sql = "SELECT * FROM categories WHERE id = $categoryIdToEdit";
    $result = mysqli_query($db, $sql);
    $categoryData = mysqli_fetch_assoc($result);
    // Ensure the category data is correctly fetched and available
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Categories</title>

    <!-- Bootstrap CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom CSS for table styling -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .table thead th {
            color: black !important;
            background-color: #f8f9fa !important;
            font-weight: bold;
        }

        .table tbody tr td {
            color: black;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .edit-form {
            display: none;
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            width: 50%;
            margin: 20px auto;
        }
    </style>
</head>

<body class="fix-header fix-sidebar">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="header">
        <?php include('admin-header.php'); ?>
    </div>

    <div id="main-wrapper">
        <div id="sidebar">
            <?php include('admin-sidebar.php'); ?>
        </div>

        <div id="main-wrapper">
            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-lg-12">
                                <div class="card card-outline-primary">
                                    <div class="card-header" style="background-color: #2f3d4a;">
                                        <h4 class="m-b-0 text-white">Categories</h4>
                                    </div>

                                    <div class="table-responsive m-t-40">
                                        <table id="categoriesTable"
                                            class="display nowrap table table-hover table-striped table-bordered"
                                            cellspacing="0" width="100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Image</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Fetch categories from the database
                                                $sql = "SELECT * FROM categories";
                                                $result = mysqli_query($db, $sql);

                                                // Check if there are categories
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $categoryId = $row['id'];
                                                        $categoryName = htmlspecialchars($row['name']);
                                                        $categoryImage = htmlspecialchars($row['image']);
                                                        echo "
                                                    <tr>
                                                        <td>$categoryId</td>
                                                        <td>$categoryName</td>
                                                        <td><img src='/grocerease/residents/img/category/$categoryImage' alt='$categoryName' width='100'></td>
                                                        <td>
                                                            <button class='btn btn-warning btn-sm' onclick='editCategory($categoryId)'>Edit</button>
                                                            <button class='btn btn-danger btn-sm' onclick='confirmDelete(event, $categoryId)'>Delete</button>
                                                        </td>
                                                    </tr>
                                                    ";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4' class='text-center'>No categories found.</td></tr>";
                                                }

                                                // Close database connection
                                                mysqli_close($db);
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Category Form -->
                    <div class="edit-form" id="editCategoryForm" style="display: none;">
                        <h5>Edit Category</h5>
                        <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="category_id" value="">

                            <div class="form-group">
                                <label for="categoryName">Category Name:</label>
                                <input type="text" id="categoryName" name="category_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="categoryImage">Category Image:</label>
                                <input type="file" id="categoryImage" name="category_image" class="form-control">
                            </div>

                            <button type="submit" name="updateCategory" class="btn btn-success">Update Category</button>
                            <button type="button" class="btn btn-secondary" onclick="closeEditForm()">Cancel</button>
                        </form>
                    </div>



                    <?php
                    if (isset($_POST['updateCategory'])) {
                        $categoryId = $_POST['category_id'];
                        $categoryName = mysqli_real_escape_string($db, $_POST['category_name']);
                        $categoryImage = $_FILES['category_image']['name'];
                        $imageTmpName = $_FILES['category_image']['tmp_name'];

                        if ($categoryImage) {
                            $imagePath = 'residents/img/category/' . $categoryImage;
                            move_uploaded_file($imageTmpName, $imagePath);
                            $sql = "UPDATE categories SET name = '$categoryName', image = '$categoryImage' WHERE id = $categoryId";
                        } else {
                            $sql = "UPDATE categories SET name = '$categoryName' WHERE id = $categoryId";
                        }

                        if (mysqli_query($db, $sql)) {
                            echo "<script>
                                    Swal.fire({
                                        title: 'Success!',
                                        text: 'Category updated successfully.',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        window.location.href = 'all-category.php';
                                    });
                                  </script>";
                        } else {
                            echo "<script>
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Failed to update category.',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                  </script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function () {
            $('#categoriesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true
            });
        });

        function confirmDelete(event, categoryId) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this category. This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `delete-category.php?cat_del=${categoryId}`;
                }
            });
        }

        function editCategory(categoryId) {
            // Show the edit form
            document.getElementById('editCategoryForm').style.display = 'block';

            // Fetch category data from the server using AJAX
            $.ajax({
                url: 'all-category.php',  // A new PHP file to fetch category data
                type: 'GET',
                data: { id: categoryId },
                success: function (response) {
                    // Assuming the response is JSON, populate the form
                    var categoryData = JSON.parse(response);
                    document.getElementById('categoryName').value = categoryData.name;
                    document.getElementById('categoryImage').value = categoryData.image;  // Handle image display if needed
                    document.querySelector('input[name="category_id"]').value = categoryData.id;
                },
                error: function () {
                    alert('Error fetching category data');
                }
            });
        }

        function closeEditForm() {
            document.getElementById('editCategoryForm').style.display = 'none';
        }

    </script>
</body>

</html>
