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
    $gtype = $_POST['gtype'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $sql = "INSERT INTO guitars ( gtype, brand, model, color, price, image)
	 VALUES ('$gtype','$brand','$model', '$color','$price','$image')";
    if (mysqli_query($con, $sql)) {
        header('location:guitarsdb.php');
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
