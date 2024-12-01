<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (empty($_SESSION["id"])) {
    header('location:index.php');
} else {
    ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link rel="icon" href="images/mkefavicon.png" type="image/x-icon">

        <!-- Fonts and Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f5f5f5;
            }

            .page-wrapper {
                margin-left: 250px;
                /* Default sidebar width */
                padding: 20px;
                transition: margin-left 0.3s;
            }

            @media (max-width: 768px) {
                .page-wrapper {
                    margin-left: 60px;
                    /* Adjust for collapsed sidebar */
                }
            }

            .card {
                border: none;
                border-radius: 15px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                transition: transform 0.2s;
            }

            .card:hover {
                transform: translateY(-5px);
            }

            .card-header {
                background-color: #ffb566;
                border-radius: 15px 15px 0 0;
                color: #ffffff;
                ;
                font-size: 1.25rem;
            }

            .card-header h4 {
                color: #ffffff !important;
            }

            .card-icon {
                font-size: 3rem;
                color: #ffb566;
            }

            .media-body h2 {
                font-size: 2rem;
                font-weight: 600;
            }

            .media-body p {
                font-size: 1rem;
                color: #777;
            }

            .container-fluid {
                padding-top: 30px;
            }
        </style>
    </head>

    <body class="fix-header fix-sidebar">
        <div id="main-wrapper">
            <?php include('admin-header.php'); ?>
            <?php include('admin-sidebar.php'); ?>

            <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="col-lg-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="m-0">Admin Dashboard</h4>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <!-- Dashboard Cards -->
                                    <?php
                                    $cards = [
                                        ['icon' => 'fa-home', 'title' => 'Branches', 'value' => 0],
                                        ['icon' => 'fa-cutlery', 'title' => 'Dishes', 'value' => 0],
                                        ['icon' => 'fa-users', 'title' => 'Users', 'value' => 0],
                                        ['icon' => 'fa-shopping-cart', 'title' => 'Total Orders', 'value' => 0],
                                        ['icon' => 'fa-spinner', 'title' => 'Processing Orders', 'value' => 0],
                                        ['icon' => 'fa-check', 'title' => 'Delivered Orders', 'value' => 0],
                                        ['icon' => 'fa-times', 'title' => 'Cancelled Orders', 'value' => 0],
                                        ['icon' => 'fa-peso-sign', 'title' => 'Total Earnings', 'value' => '₱0'],
                                    ];

                                    foreach ($cards as $card) {
                                        echo "<div class='col-md-3'>
                                            <div class='card p-3'>
                                                <div class='d-flex align-items-center'>
                                                    <div class='card-icon me-3'>
                                                        <i class='fa {$card['icon']}'></i>
                                                    </div>
                                                    <div class='media-body'>
                                                        <h2>{$card['value']}</h2>
                                                        <p>{$card['title']}</p>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scripts -->
            <script src="js/lib/jquery/jquery.min.js"></script>
            <script src="js/lib/bootstrap/js/popper.min.js"></script>
            <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
            <script src="js/jquery.slimscroll.js"></script>
            <script src="js/sidebarmenu.js"></script>
            <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
            <script src="js/custom.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


        </div>
    </body>

    </html>
<?php } ?>
