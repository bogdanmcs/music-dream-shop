<?php
session_start();

$con = mysqli_connect("localhost","root","","musicdream");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(!isset($_COOKIE['user'])){
    header('location:../admin.php');
}

if(isset($_POST['searchid'])){
    $_SESSION['searchid'] = $_POST['searchid'];
    $varid = $_SESSION['searchid'];
    header("location:guitarsdb.php?search=$varid");
} elseif (isset($_POST['searchmodel'])){
    $_SESSION['searchmodel'] = $_POST['searchmodel'];
    $varm = $_SESSION['searchmodel'];
    header("location:guitarsdb.php?search=$varm");
} else {
    header("location:guitarsdb.php");
}

mysqli_close($con);
?>