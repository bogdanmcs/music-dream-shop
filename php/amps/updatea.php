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

if(count($_POST)>0) {
    mysqli_query($con,"UPDATE amps set id='" . $_POST['id'] . "', atype='" . $_POST['atype'] . "', model='" . $_POST['model'] . "' , 
    price='" . $_POST['price'] . "' , image='" . $_POST['image'] . "' WHERE id='" . $_POST['id'] . "'");
    header("location:ampsdb.php");
}
$result = mysqli_query($con,"SELECT * FROM amps WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>

<?php include("../../html/header/header.html") ?>

<div class="container-md text-md-center" style="height: auto; background-color: navajowhite; border-style: groove; margin-top: 5.5%">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4" style="background-color: navajowhite; border: 3px solid brown; border-radius: 20px; margin-top: 2%; margin-bottom: 2%">
            <form method="post" action="updatea.php">
                <br>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <br>
                <b style="font-size: 18px;">Type</b><br>
                <input type="text" required="required" name="atype" style="border: 1px solid black; box-shadow: 3px 5px 6px black;margin-top: 1%" value="<?php echo $row['atype']; ?>">
                <br> <br>
                <b style="font-size: 18px;">Model</b><br>
                <input type="text" required="required" name="model" style="border: 1px solid black; box-shadow: 3px 5px 6px black;margin-top: 1%" value="<?php echo $row['model']; ?>">
                <br> <br>
                <b style="font-size: 18px;">Price</b><br>
                <input type="text" required="required" name="price" style="border: 1px solid black; box-shadow: 3px 5px 6px black;margin-top: 1%" value="<?php echo $row['price']; ?>">
                <br> <br>
                <b style="font-size: 18px;">Imagee</b><br>
                <input type="text" required="required" name="image" style="border: 1px solid black; box-shadow: 3px 5px 6px black;margin-top: 1%" value="<?php echo $row['image']; ?>">
                <br><br>
                <input type="submit" name="save" value="Edit" style="margin-bottom: 2%; background-color: greenyellow; border-radius: 20px; font-size: 110%">
            </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>

<?php include("../../html/footer/footer.html") ?>

</body>
</html>



