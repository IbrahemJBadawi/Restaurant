<?php
require('../config/constants.php');
?>
<html>

<head>
    <title>Food Order Website - Home Page</title>

    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <!-- Menu Section Starts -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <br>
            <?php

            ?>
            <br>


            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="fullname" placeholder="Enter Your Name">
                        </td>
                    </tr>

                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" placeholder="Your Username">
                        </td>
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td>
                            <input type="password" name="password" placeholder="Your Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>


        </div>
    </div>

    <div class="footer">
        <div class="wrapper">
            <p class="text-center">2021 All rights reserved, Food House</p>
        </div>
    </div>
    <!-- Footer Section Ends -->

</body>

</html>
<?php
require('../config/constants.php');
if (isset($_POST['submit'])) {
    $fullname = $_POST['username'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO admin (fullname, username, password) VALUES ('$fullname', '$username', '$password');";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['admin'] = "<h4 class='success'>admin added</h4>";
        header("LOCATION:manage-admin.php");
    } else {
        $_SESSION['admin'] =  "<h4 class='success'>admin not added</h4>";
        header("LOCATION:manage-admin.php");
    }
};
?>