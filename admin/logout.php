<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../Pages/index.php");
exit();
