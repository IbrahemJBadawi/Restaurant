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
                    <img src="Images/logo.png" alt="Restaurant Logo" class="img-responsive">
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

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            // Connect to the database
            require('../config/constants.php');

            // Fetch food categories from the database
            $q = "SELECT * FROM food";
            $res = mysqli_query($conn, $q);

            // Loop through each food and display it dynamically
            while ($food = mysqli_fetch_assoc($res)) {
                $id = $food['id'];
                $title = $food['title'];
                $Image_name = $food['Image'];

                echo '
                <a href="food-foods.php?food=' . $id . '">
                    <div class="box-3 float-container">
                        <img src="' . $Image_name . '" alt="' . $title . '" class="img-responsive img-curve">
                        <h3 class="float-text text-white">' . $title . '</h3>
                    </div>
                </a>
            ';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            // Connect to the database
            require('../config/constants.php');

            // Fetch food categories from the database
            $q = "SELECT * FROM food";
            $res = mysqli_query($conn, $q);

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

                    <a href="order.php?food-id=' . $id . '" class="btn btn-primary">Order Now</a>
                </div>
            </div>

        ';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>

            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
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