<?php
require('../config/constants.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = "DELETE from category where id =$id";
    $res = mysqli_query($conn, $q);

    if ($res) {
        $_SESSION['category'] = "<h4 class='success'>category deleted</h4>";
        header("location:manage-category.php");

    } else {
        $_SESSION['category'] = "<h4 class='error'>category not deleted</h4>";
        header("location:manage-category.php");
    }
} else {
    header("location:manage-category.php");
}
