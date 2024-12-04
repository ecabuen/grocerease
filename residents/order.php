<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocerease</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <!-- Hover CSS -->
    <link rel="stylesheet" href="css/hover-min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    /* Make the table scrollable on smaller screens */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .tbl-full {
        width: 50%;
        border-collapse: collapse;
    }

    .tbl-full th,
    .tbl-full td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .tbl-full th {
        background-color: #f4f4f4;
    }

    .tbl-full img {
        max-width: 50px;
        height: auto;
    }

    .btn-delete {
        color: red;
        font-size: 20px;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<body>
    <?php include('header.php'); ?>

    <!-- Food Order Section Start -->
    <section class="order">
        <div class="container">
            <h2 class="text-center">Confirm your order.</h2>
            <table class="tbl-full" border="0">
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Cheese</td>
                    <td>1</td>
                    <td><a href="#" class="btn-delete">&times;</a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Cheese</td>
                    <td>1</td>
                    <td><a href="#" class="btn-delete">&times;</a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Cheese</td>
                    <td>1</td>
                    <td><a href="#" class="btn-delete">&times;</a></td>
                </tr>

            </table>
            <form>
                <input type="submit" value="Confirm Order" class="btn-primary">
            </form>
        </div>

    </section>
    <!-- Food Order Section End -->

   

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Jquery UI -->
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- Custom JS -->
    <script src="js/custom.js"></script>
</body>

</html>