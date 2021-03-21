<?php
session_start();

$con=mysqli_connect("localhost","root","","musicdream");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(!isset($_COOKIE['user'])){
    header('location:../admin.php');
}

if(isset($_POST['save']))
{
    $ptype = $_POST['ptype'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $sql = "INSERT INTO picks (ptype, price, image)
	 VALUES ('$ptype','$price','$image')";
    if (mysqli_query($con, $sql)) {
        header('location:picksdb.php');
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
