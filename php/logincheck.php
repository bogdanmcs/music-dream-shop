<?php
session_start();

$con=mysqli_connect("localhost","root","","musicdream");
if($con){
    echo "connection succesful";
} else {
    echo "no connection";
}

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM adminlogin WHERE username='$username' AND password='$password'";
    $query = mysqli_query($con, $sql);

    $row = mysqli_num_rows($query);

    if($row == 1){
        echo "login successful";
        setcookie('user', $username, time() + (86400 * 30), "/");
        header('location:admingogo.php');
    } else {
        echo "login failed";
        header('location:admin.php'); }
}

?>
