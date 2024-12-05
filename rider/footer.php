
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>


        @media (max-width: 768px) {
            .grid-3 {
                grid-template-columns: repeat(2, 1fr);
            }

            h3 {
                font-size: 1.25rem;
            }

            p {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .grid-3 {
                grid-template-columns: 1fr;
            }

            .social-links ul {
                flex-direction: column;
                align-items: center;
            }

            h3 {
                font-size: 1.2rem;
            }

            p {
                font-size: 0.85rem;
            }

            .site-links a {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <!-- Footer Section Start -->
    <section class="footer">
        <div class="container">
            <div class="grid-3">
                <div class="text-center">
                    <h3 style="color: #333;">About Us</h3><br>
                    <p>At GrocerEase Express, we bring fresh groceries from Tuy Market to your doorstep, making shopping easy and convenient for everyone in Barangay Rillo. Our service supports local vendors and provides job opportunities for riders while ensuring a hassle-free experience for residents.</p>
                </div>
                <div class="text-center">
                    <h3 style="color: #333;">Site Map</h3><br>
                    <div class="site-links">
                        <a href="home.php" style="color: #333;">Home</a>
                        <a href="categories.php" style="color: #333;">Categories</a>
                        <a href="order.php" style="color: #333;">List</a>
                        <a href="order-status.php" style="color: #333;">Status</a>
                        <!-- <a href="login.php" style="color: #333;">Login</a> -->
                    </div>
                </div>

                <div class="social-links">
                    <h3 style="color: #333;">Social Links</h3><br>
                    <div class="social">
                        <ul>
                            <li><a href="#"><img src="https://img.icons8.com/color/48/null/facebook-new.png" alt="Facebook" /></a></li>
                            <li><a href="#"><img src="https://img.icons8.com/fluency/48/null/instagram-new.png" alt="Instagram" /></a></li>
                            <li><a href="#"><img src="https://img.icons8.com/color/48/null/twitter--v1.png" alt="Twitter" /></a></li>
                            <li><a href="#"><img src="https://img.icons8.com/color/48/null/linkedin-circled--v1.png" alt="LinkedIn" /></a></li>
                            <li><a href="#"><img src="https://img.icons8.com/color/48/null/youtube-play.png" alt="YouTube" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="js/custom.js"></script>
</body>
