<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

// Make sure the category ID exists and is valid before deleting
if (isset($_GET['cat_del']) && is_numeric($_GET['cat_del'])) {
    $categoryId = $_GET['cat_del'];

    // Delete category from the database
    $sql = "DELETE FROM categories WHERE id = '$categoryId'";

    if (mysqli_query($db, $sql)) {
        // Redirect back to the categories page with a success message
        header("Location: all-category.php?msg=success");
    } else {
        // Handle error if deletion fails
        header("Location: all-category.php?msg=error");
    }
} else {
    // Invalid category ID, redirect back
    header("Location: all-category.php");
}
?>
