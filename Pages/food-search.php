<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="../admin/login.php">login</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->


    <!-- fOOD MEnu Section Starts Here -->


    <?php
    // Connect to the database
    require('../config/constants.php');
    if (isset($_POST['search'])) {
        $searchChar = $_POST['search'];
        // Fetch food categories from the database
        $q = "SELECT * FROM food WHERE title LIKE '%$searchChar%'";
        $res = mysqli_query($conn, $q);
        if (mysqli_num_rows($res) > 0) {
            echo '
                    <!-- fOOD sEARCH Section Starts Here -->
                    <section class="food-search text-center">
                        <div class="container">
                    
                            <h2>Foods on Your Search <a href="#" class="text-white">' . $searchChar . '</a></h2>
                    
                        </div>
                    </section>
                    <!-- fOOD sEARCH Section Ends Here -->
                    <section class="food-menu">
                        <div class="container">
                            <h2 class="text-center">Food Menu</h2>
                        ';
            // Loop through each food and display it dynamically
            while ($food = mysqli_fetch_assoc($res)) {
                $id = $food['id'];
                $title = $food['title'];
                $price = $food['Price'];
                $Image_name = $food['Image'];
                $Description = $food['Description'];

                echo '

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="' . $Image_name . '" alt="' . $title . '" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4>' . $title . '</h4>
                        <p class="food-price">' . $price . '</p>
                        <p class="food-detail">
                            ' . $Description . '
                        </p>
                        <br>

                        <a href="order.html" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

            ';
            }
        }
    } else {
        echo "<p>No data.</p>";
    }


    // Close the database connection
    mysqli_close($conn);
    ?>

    <div class="clearfix"></div>



    </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">web2Alqsa</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>

</html>