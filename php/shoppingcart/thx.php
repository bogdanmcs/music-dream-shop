<?php
session_start();

$con=mysqli_connect("localhost","root","","musicdream");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

include("../../html/header/header.html");

unset($_SESSION['cart']);

?>

<div class="container-md text-md-center" style="height: auto; background-color: navajowhite; border-style: groove; margin-top: 5%">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h4 style="margin-top: 2%; text-decoration: underline"> Thank you for your order, <?php echo $_POST['fname']; echo " "; echo $_POST['lname'];?>!</h4> <br><br>
            <h2 style="margin-left: 1%"><a href="../../index.php">Go to home page</a></h2>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php
include("../../html/footer/footer.html");
?>

