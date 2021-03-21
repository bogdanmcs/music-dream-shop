<?php
session_start();
$con=mysqli_connect("localhost","root","","musicdream");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<?php include("../../html/header/header.html") ?>

<div class="container-md" style="height: auto; background-color: navajowhite; border-style: groove; margin-top: 5%">

    <!-- UNIQUE PRODUCT-->
    <?php
    if(isset($_GET['id'])){
        $var = $_GET['id'];
        $result = mysqli_query($con,"SELECT * FROM guitars WHERE id='$var'");
        $row = mysqli_fetch_array($result);
        ?>
        <h6 style="color: dodgerblue; margin-top: 1%">
            <a href="../products.php">Products</a>
            <a style="color: black">></a> <a href="#" onclick="goBack1()">Guitars</a>
            <a style="color: black">> <?php echo $row['gtype'];?>-<?php echo $row['brand'];?>-<?php echo $row['model'];?></a>
        </h6>
        <div class="row" style="margin-top: 4%">
            <div class="col-md-4">
                <a> <img src="<?php echo $row['image'];?>" class="myn2" style="width: 100%"> </a>
            </div>
            <div class="col-md-4">
                <h3 style="text-decoration: underline"> Details: </h3>
                <h6 style="margin-top: 4%"> <a style="color: black">
                        <?php echo $row['gtype'];?> <?php echo $row['brand']; ?> <?php echo $row['color']; ?>
                    </a> </h6>
                <h4><?php echo $row['price'];?>  RON</h4>
                <h4 style="margin-top: 5%"> <a href="../shoppingcart/shoppingcart2.php?id=<?php echo $row['id'];?>&db=guitars&q=1" style="text-decoration: none"> Add to cart</a> </h4>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <?php
    } else {
        ?>
        <!-- UNIQUE PRODUCT-->
        <h6 style="color: dodgerblue; margin-top: 1%">
            <a href="../products.php">Products</a>
            <a style="color: black">> Guitars</a>
        </h6>
        <h5 style="margin-top: 2%"> <a style="border: 3px solid black; padding: 3px; border-radius: 20px; background-color: white">Sort by</a> </h5>
        <p style="margin-top: 1%"><a href="guitars.php?sortby=pricehilo">Price (Highest-Lowest)</a></p>
        <p><a href="guitars.php?sortby=pricelohi">Price (Lowest-Highest)</a></p>
        <p><a href="guitars.php">Newest(default)</a></p>
        <p><a href="guitars.php?sortby=old">Oldest</a></p>
        <h5 style="margin-top: 2%"> <a style="border: 3px solid black; padding: 3px; border-radius: 20px; background-color: white">Filters</a> </h5>
        <p style="margin-top: 1%"><a href="guitars.php?filterby1=Elec">Electric guitars</a></p>
        <p><a href="guitars.php?filterby1=Aco">Acoustic guitars</a></p>
        <p><a href="guitars.php?filterby1=Clas">Classic guitars</a></p>
        <p><a href="guitars.php?filterby1=del">Remove filter</a></p>


        <?php
        $result = mysqli_query($con,"SELECT * FROM guitars ORDER BY id DESC");

        if ((isset($_GET['filterby1']) || isset($_SESSION['filterby1'])) && isset($_GET['sortby'])){
            if(isset($_GET['filterby1']) && $_GET['filterby1'] == 'del'){
                unset($_SESSION['filterby1']);
                header("location:guitars.php");
            } else{
                if(isset($_GET['filterby1'])){
                    $_SESSION['filterby1'] = $_GET['filterby1'];
                }
                //
                $varf = $_SESSION['filterby1'];
                $vars = $_GET['sortby'];
                if($vars == 'pricehilo'){
                    $result = mysqli_query($con,"SELECT * FROM guitars WHERE gtype LIKE '%$varf%' ORDER BY price DESC");
                } elseif ($vars == 'pricelohi'){
                    $result = mysqli_query($con,"SELECT * FROM guitars WHERE gtype LIKE '%$varf%' ORDER BY price ASC");
                } elseif ($vars == 'old') {
                    $result = mysqli_query($con,"SELECT * FROM guitars WHERE gtype LIKE '%$varf%' ORDER BY id ASC");
                } else {
                    $result = mysqli_query($con,"SELECT * FROM guitars WHERE gtype LIKE '%$varf%' ORDER BY id DESC");
                }
            }
        } elseif ((isset($_GET['filterby1']) || isset($_SESSION['filterby1'])) && !isset($_GET['sortby1'])){ // just filter
            if(isset($_GET['filterby1'])){
                $_SESSION['filterby1'] = $_GET['filterby1'];
            }
            if($_SESSION['filterby1'] == 'del'){
                unset($_SESSION['filterby1']);
            } else {
                $varf = $_SESSION['filterby1'];
                $result = mysqli_query($con,"SELECT * FROM guitars WHERE gtype LIKE '%$varf%' ORDER BY id DESC");
            }

        } elseif (isset($_GET['sortby'])) { // just sort
            $vars = $_GET['sortby'];
            if($vars == 'pricehilo'){
                $result = mysqli_query($con,"SELECT * FROM guitars ORDER BY price DESC");
            } elseif ($vars == 'pricelohi'){
                $result = mysqli_query($con,"SELECT * FROM guitars ORDER BY price ASC");
            } elseif ($vars == 'old') {
                $result = mysqli_query($con,"SELECT * FROM guitars ORDER BY id ASC");
            }
        }

        while($row = mysqli_fetch_array($result)) {
            ?>

            <div class="row" style="margin-top: 5%; background-color: ">
                <div class="col-md-2 text-center" style="margin-top: 3%">
                    <a href="guitars.php?id=<?php echo $row['id'];?>"> <img src="<?php echo $row['image']; ?>" class="myn2" style="width: 100%"> </a>
                    <h6 style="margin-top: 4%"> <a href="guitars.php?id=<?php echo $row['id'];?>" style="color: black">
                            <?php echo $row['gtype'];?> <?php echo $row['brand']; ?> <?php echo $row['model']; ?>
                        </a> </h6>
                    <h5><?php echo $row['price'];?> RON</h5>
                    <h4 style=""> <a href="../shoppingcart/shoppingcart2.php?id=<?php echo $row['id'];?>&db=guitars&q=1" style="text-decoration: none"> Add to cart</a> </h4>
                </div>
                <?php
                if($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="col-md-2 text-center" style="margin-top: 3%">
                        <a href="guitars.php?id=<?php echo $row['id'];?>"> <img src="<?php echo $row['image']; ?>" class="myn2" style="width: 100%"> </a>
                        <h6 style="margin-top: 4%"> <a href="guitars.php?id=<?php echo $row['id'];?>" style="color: black">
                                <?php echo $row['gtype'];?> <?php echo $row['brand']; ?> <?php echo $row['model']; ?>
                            </a> </h6>
                        <h5><?php echo $row['price'];?> RON</h5>
                        <h4> <a href="../shoppingcart/shoppingcart2.php?id=<?php echo $row['id'];?>&db=guitars&q=1" style="text-decoration: none"> Add to cart</a> </h4>
                    </div>
                    <?php
                    if($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="col-md-2 text-center" style="margin-top: 3%">
                            <a href="guitars.php?id=<?php echo $row['id'];?>"> <img src="<?php echo $row['image']; ?>" class="myn2" style="width: 100%"> </a>
                            <h6 style="margin-top: 4%"> <a href="guitars.php?id=<?php echo $row['id'];?>" style="color: black">
                                    <?php echo $row['gtype'];?> <?php echo $row['brand']; ?> <?php echo $row['model']; ?>
                                </a> </h6>
                            <h5><?php echo $row['price'];?> RON</h5>
                            <h4> <a href="../shoppingcart/shoppingcart2.php?id=<?php echo $row['id'];?>&db=guitars&q=1" style="text-decoration: none"> Add to cart</a> </h4>
                        </div>
                        <?php
                        if($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-md-2 text-center" style="margin-top: 3%">
                                <a href="guitars.php?id=<?php echo $row['id'];?>"> <img src="<?php echo $row['image']; ?>" class="myn2" style="width: 100%"> </a>
                                <h6 style="margin-top: 4%"> <a href="guitars.php?id=<?php echo $row['id'];?>" style="color: black">
                                        <?php echo $row['gtype'];?> <?php echo $row['brand']; ?>  <?php echo $row['model']; ?>
                                    </a> </h6>
                                <h5><?php echo $row['price'];?> RON</h5>
                                <h4> <a href="../shoppingcart/shoppingcart2.php?id=<?php echo $row['id'];?>&db=guitars&q=1" style="text-decoration: none"> Add to cart</a> </h4>
                            </div>
                            <?php
                            if($row = mysqli_fetch_array($result)) {
                                ?>
                                <div class="col-md-2 text-center" style="margin-top: 3%">
                                    <a href="guitars.php?id=<?php echo $row['id'];?>"> <img src="<?php echo $row['image']; ?>" class="myn2" style="width: 100%"> </a>
                                    <h6 style="margin-top: 4%"> <a href="guitars.php?id=<?php echo $row['id'];?>" style="color: black">
                                            <?php echo $row['gtype'];?> <?php echo $row['brand']; ?>  <?php echo $row['model']; ?>
                                        </a> </h6>
                                    <h5><?php echo $row['price'];?> RON</h5>
                                    <h4> <a href="../shoppingcart/shoppingcart2.php?id=<?php echo $row['id'];?>&db=guitars&q=1" style="text-decoration: none"> Add to cart</a> </h4>
                                </div>
                                <?php
                                if($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <div class="col-md-2 text-center" style="margin-top: 3%">
                                        <a href="guitars.php?id=<?php echo $row['id'];?>"> <img src="<?php echo $row['image']; ?>" class="myn2" style="width: 100%"> </a>
                                        <h6 style="margin-top: 4%"> <a href="guitars.php?id=<?php echo $row['id'];?>" style="color: black">
                                                <?php echo $row['gtype'];?> <?php echo $row['brand']; ?>  <?php echo $row['model']; ?>
                                            </a> </h6>
                                        <h5><?php echo $row['price'];?> RON</h5>
                                        <h4> <a href="../shoppingcart/shoppingcart2.php?id=<?php echo $row['id'];?>&db=guitars&q=1" style="text-decoration: none"> Add to cart</a> </h4>
                                    </div>

                                    <!-- Termina verificare pt existenta produselor. First not found-> end everything -->
                                    <?php
                                }}}}}
                ?>
            </div>

            <?php
        }}

    mysqli_close($con);
    ?>

</div>

<?php include("../../html/footer/footer.html") ?>

</body>
</html>
