<?php
session_start();
unset($_SESSION['filterby1']);
$con=mysqli_connect("localhost","root","","musicdream");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(!isset($_COOKIE['user'])){
    header('location:admin.php');
}
?>

<?php include("../html/header/header.html") ?>

<div class="container-md" style="height: auto; background-color: navajowhite; border-style: groove; margin-top: 5%; margin-bottom: 14%">
    <div class="row" style="margin-top: 2%;">
        <div class="col-md-3 text-md-center"><h4 style="color: red; margin-top: 1%; font-family: 'Comic Sans MS'; text-decoration: underline"> Logged in, <?php echo $_COOKIE['user'];?>!</h4></div>
        <div class="col-md-4"><sh6 style="margin-top: 2%"> <a href="logout.php" class="btn btn-danger"> Logout </a> </sh6></div>
        <div class="col-md-5"></div>
    </div>
        <h6 style="margin-top: 3%; font-size: 20px; margin-left: 3%"> <a class="prodcs" style="" href="guitars/guitarsdb.php"> Manage guitars </a> </h6>
        <h6 style="margin-top: 2%; font-size: 20px; margin-left: 3%"> <a class="prodcs" href="basses/bassesdb.php"> Manage basses </a> </h6>
        <h6 style="margin-top: 2%; font-size: 20px; margin-left: 3%"> <a class="prodcs" href="amps/ampsdb.php"> Manage amps </a> </h6>
        <h6 style="margin-top: 2%; margin-bottom: 2%; font-size: 20px; margin-left: 3%"> <a class="prodcs" href="picks/picksdb.php"> Manage picks </a> </h6>
</div>

<?php include("../html/footer/footer.html") ?>

</body>
</html>
