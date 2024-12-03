<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

// Handle category deletion
if (isset($_GET['cat_del'])) {
    $categoryId = intval($_GET['cat_del']);
    $sql = "DELETE FROM categories WHERE id = $categoryId";
    if (mysqli_query($db, $sql)) {
        header("Location: all-category.php?msg=success");
        exit;
    } else {
        header("Location: all-category.php?msg=error");
        exit;
    }
}

// Handle fetching category details for editing
if (isset($_GET['id'])) {
    $categoryId = intval($_GET['id']);
    $sql = "SELECT * FROM categories WHERE id = $categoryId";
    $result = mysqli_query($db, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $category = mysqli_fetch_assoc($result);
        echo json_encode($category);
        exit;
    } else {
        echo json_encode(['error' => 'Category not found']);
        exit;
    }
}

// Handle category update
if (isset($_POST['updateCategory'])) {
    $categoryId = $_POST['category_id'];
    $categoryName = mysqli_real_escape_string($db, $_POST['category_name']);
    $categoryImage = $_FILES['category_image']['name'];
    $imageTmpName = $_FILES['category_image']['tmp_name'];

    if ($categoryImage) {
        $imagePath = '../residents/img/category/' . $categoryImage;
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

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories</title>

    <!-- Bootstrap CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
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
                                        <table id="categoriesTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Image</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM categories";
                                                $result = mysqli_query($db, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "
                                                    <tr>
                                                        <td>{$row['id']}</td>
                                                        <td>{$row['name']}</td>
                                                        <td><img src='/grocerease/residents/img/category/{$row['image']}' alt='{$row['name']}' width='100'></td>
                                                        <td>
                                                            <button class='btn btn-warning btn-sm' onclick='editCategory({$row['id']})'>Edit</button>
                                                            <button class='btn btn-danger btn-sm' onclick='confirmDelete(event, {$row['id']})'>Delete</button>
                                                        </td>
                                                    </tr>
                                                    ";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4' class='text-center'>No categories found.</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Editing -->
                    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="editForm" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" name="category_id" id="category_id">
                                        <div class="mb-3">
                                            <label for="category_name" class="form-label">Category Name</label>
                                            <input type="text" id="category_name" name="category_name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category_image" class="form-label">Category Image</label>
                                            <input type="file" id="category_image" name="category_image" class="form-control">
                                            <img id="category_image_preview" src="https://via.placeholder.com/100" alt="Category Image Preview" class="mt-2" width="100">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="updateCategory" class="btn btn-success">Save Changes</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#categoriesTable').DataTable({
                "pageLength": 5,
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
                    window.location.href = `all-category.php?cat_del=${categoryId}`;
                }
            });
        }

        function editCategory(categoryId) {
            $.ajax({
                url: 'all-category.php',
                type: 'GET',
                data: { id: categoryId },
                success: function (response) {
                    const category = JSON.parse(response);
                    if (category.error) {
                        Swal.fire('Error!', category.error, 'error');
                    } else {
                        $('#category_id').val(category.id);
                        $('#category_name').val(category.name);
                        const imgPlaceholder = category.image
                            ? `/grocerease/residents/img/category/${category.image}`
                            : 'https://via.placeholder.com/100';
                        $('#category_image_preview').attr('src', imgPlaceholder);
                        $('#editCategoryModal').modal('show');
                    }
                },
                error: function () {
                    Swal.fire('Error!', 'Failed to fetch category details.', 'error');
                }
            });
        }
    </script>
</body>

</html>
