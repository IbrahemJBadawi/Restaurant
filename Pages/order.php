<?php
require('../config/constants.php');

// Check if the food ID is provided in the URL
if (isset($_GET['food-id'])) {
    $foodId = $_GET['food-id'];
    // Fetch the food details from the database
    $q = "SELECT * FROM food WHERE id = $foodId";
    $res = mysqli_query($conn, $q);
    // Check if the food exists
    if (mysqli_num_rows($res) > 0) {
        // Food found, retrieve its details
        $food = mysqli_fetch_assoc($res);
        $Food = $food['title'];
        $Price = $food['Price'];
        $image = $food['Image'];
        $description = $food['Description'];
    } else {
        header("location:index.php");
    }
} else {
    header("location:index.php");
}
$Order_date = date('Y-m-d H:i:s');
$Status_order = 'Active';
$featured = 'Yes';
$active = 'Yes';
?>

<?php
require('../config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" Food="Logo">
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

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">

            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img name="image_name" src="<?php echo $image; ?>" alt="<?php echo $Food; ?>" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4 name="Food"><?php echo $Food; ?></h4>
                        <p class="food-Price" name="Price">$<?php echo $Price; ?></p>
                        <div class="order-label">Quantity</div>
                        <input type="number" name="Qty" class="input-responsive" value="1" required>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="fullname" placeholder="E.g. web2 alaqsa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@web2 alaqsa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

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
            <p>All rights reserved. Designed By <a href="#"> web2 alaqsa</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $Qty = $_POST['Qty'];
    $Customer_name = $_POST['fullname'];
    $Contact = $_POST['contact'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];

    // Calculate the Total based on Price and Quantity
    $Total = $Price * $Qty;

    $q = "INSERT INTO order_food (Food, Price, Qty, Total, Order_date, Status_order, Customer_name, Contact, Email, Address)
     VALUES ('$Food', '$Price', '$Qty', '$Total', '$Order_date', '$Status_order', '$Customer_name', '$Contact', '$Email', '$Address')";
    $res = mysqli_query($conn, $q);
    if ($res) {
        $_SESSION['order_food'] = "<h4 class='success'>order added</h4>";
        header("LOCATION:index.php");
        exit();
    } else {
        $_SESSION['order_food'] = "<h4 class='error'>order not added</h4>";
        header("LOCATION:index.php");
        exit();
    }
}
?>