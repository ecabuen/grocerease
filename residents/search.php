<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        .image-banner {
            position: relative;
            background: url('./img/title-head.jpg') no-repeat center center/cover;
            height: 60vh;
            display: flex;
            align-items: flex-start; /* Align text to the top */
            justify-content: flex-start; /* Align text to the left */
            color: white;
            padding: 20px; /* Padding around the text */
            text-align: left; /* Left align the text */
        }

        .banner-text {
            padding: 20px;
            border-radius: 10px;
            padding-top: 100px;
        }

        .banner-text h1 {
            font-size: 4rem;
            margin: 0;
        }

        .banner-text p {
            font-size: 2rem;
            margin: 10px 0 0;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .image-banner {
                height: 50vh;
            }

            .banner-text h1 {
                font-size: 2rem;
            }

            .banner-text p {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .image-banner {
                height: 40vh;
            }

            .banner-text h1 {
                font-size: 1.5rem;
            }

            .banner-text p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Image Banner Section Start -->
    <div class="image-banner">
        <div class="banner-text">
            <h1>GrocerEase</h1>
            <p>Bringing the Market closer to you</p>
        </div>
    </div>
    <!-- Image Banner Section End -->
</body>
