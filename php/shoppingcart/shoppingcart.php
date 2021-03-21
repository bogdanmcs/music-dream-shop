<?php
session_start();
$con=mysqli_connect("localhost","root","","musicdream");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

include("../../html/header/header.html");

if(isset($_GET['com']) && isset($_SESSION['cart'])){
    if($_GET['com'] == 'del'){
        $x = $_GET['k'];
        unset($_SESSION['cart'][$x]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        header("location: shoppingcart.php");
    } elseif ($_GET['com'] == 'plus' ){
        $x = $_GET['k'];
        $_SESSION['cart'][$x]['q'] =  $_SESSION['cart'][$x]['q'] + 1;
        header("location: shoppingcart.php");
    } elseif ($_GET['com'] == 'minus') {
        $x = $_GET['k'];
        if($_SESSION['cart'][$x]['q'] > 1){
            $_SESSION['cart'][$x]['q'] =  $_SESSION['cart'][$x]['q'] - 1;
            header("location:shoppingcart.php");
        } else {
            header("location:shoppingcart.php?com=del&k=$x");
        }
    }
}
?>

<div class="container-md text-md-center" style="height: auto; background-color: navajowhite; border-style: groove; margin-top: 5%">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3 class="neon23" style="margin-top: 5%"> Shopping cart </h3 class="neon23">
        </div>
        <div class="col-md-4"></div>
    </div>
<?php
if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
{
    $k = 0;
    //print_r($_SESSION['cart']);
    $cart = array();
    $cart = $_SESSION['cart'];

    $total = 0; // total sum

    while(isset($cart[$k])){
        if($cart[$k]['db'] == 'guitars'){
            $id = $cart[$k]['idu'];
            $result = mysqli_query($con, "SELECT * FROM guitars WHERE id ='$id'");
            if(mysqli_num_rows($result) > 0){
                if($row = mysqli_fetch_array($result)){
                    $total = $total + $row['price'] * $cart[$k]['q'];
                    ?>

                    <div class="row" style="margin-top: 4%;border-top: 2px solid black;">
                        <div class="col-md-2" style="margin-top: 2%">
                            <img src="<?php echo $row['image'];?>" class="myn2" style="width: 100%">
                        </div>
                        <div class="col-md-4 align-content-center" style="margin-top: 2%">
                            <p> <?php echo $row['gtype'];?></p>
                            <p> <?php echo $row['brand']; echo " "; echo $row['model']; echo " "; echo $row['color'];?></p>
                            <p> Price: <?php echo $row['price'];?> RON</p>
                            <p> Quantity: <?php echo $cart[$k]['q'];?> </p>
                        </div>

                       <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=del&k=<?php echo $k;?>"><button onclick="delAlert()">Delete</button></a></div>
                       <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=plus&k=<?php echo $k;?>"><button>+1</button></a></div>
                       <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=minus&k=<?php echo $k;?>"><button>-1</button></a></div>

                    </div>

                    <?php
                }
            }
        } elseif ($cart[$k]['db'] == 'basses'){
            $id = $cart[$k]['idu'];
            $result = mysqli_query($con, "SELECT * FROM basses WHERE id ='$id'");

            if(mysqli_num_rows($result) > 0){
                if($row = mysqli_fetch_array($result)){
                    $total = $total + $row['price'] * $cart[$k]['q'];
                    ?>

                    <div class="row" style="margin-top: 4%;border-top: 2px solid black;">
                        <div class="col-md-2" style="margin-top: 2%">
                            <img src="<?php echo $row['image'];?>" class="myn2" style="width: 100%">
                        </div>
                        <div class="col-md-4 align-content-center" style="margin-top: 2%">
                            <p> <?php echo $row['btype'];?></p>
                            <p> <?php echo $row['brand']; echo " "; echo $row['model']; echo " ";?></p>
                            <p> Price: <?php echo $row['price'];?> RON</p>
                            <p> Quantity: <?php echo $cart[$k]['q'];?> </p>
                        </div>

                        <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=del&k=<?php echo $k;?>"><button onclick="delAlert()">Delete</button></a></div>
                        <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=plus&k=<?php echo $k;?>"><button>+1</button></a></div>
                        <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=minus&k=<?php echo $k;?>"><button>-1</button></a></div>

                    </div>

                    <?php
                }
            }
        } elseif ($cart[$k]['db'] == 'amps'){
            $id = $cart[$k]['idu'];
            $result = mysqli_query($con, "SELECT * FROM amps WHERE id ='$id'");

            if(mysqli_num_rows($result) > 0){
                if($row = mysqli_fetch_array($result)){
                    $total = $total + $row['price'] * $cart[$k]['q'];
                    ?>

                    <div class="row" style="margin-top: 4%;border-top: 2px solid black;">
                        <div class="col-md-2" style="margin-top: 2%">
                            <img src="<?php echo $row['image'];?>" class="myn2" style="width: 100%">
                        </div>
                        <div class="col-md-4 align-content-center" style="margin-top: 2%">
                            <p> <?php echo $row['atype'];?></p>
                            <p> <?php echo $row['model'];?></p>
                            <p> Price: <?php echo $row['price'];?> RON</p>
                            <p> Quantity: <?php echo $cart[$k]['q'];?> </p>
                        </div>

                        <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=del&k=<?php echo $k;?>"><button onclick="delAlert()">Delete</button></a></div>
                        <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=plus&k=<?php echo $k;?>"><button>+1</button></a></div>
                        <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=minus&k=<?php echo $k;?>"><button>-1</button></a></div>

                    </div>

                    <?php
                }
            }
        } elseif ($cart[$k]['db'] == 'picks'){
            $id = $cart[$k]['idu'];
            $result = mysqli_query($con, "SELECT * FROM picks WHERE id ='$id'");

            if(mysqli_num_rows($result) > 0){
                if($row = mysqli_fetch_array($result)){
                    $total = $total + $row['price'] * $cart[$k]['q'];
                    ?>

                    <div class="row" style="margin-top: 4%;border-top: 2px solid black;">
                        <div class="col-md-2" style="margin-top: 2%">
                            <img src="<?php echo $row['image'];?>" class="myn2" style="width: 100%">
                        </div>
                        <div class="col-md-4 align-content-center" style="margin-top: 2%">
                            <p> <?php echo $row['ptype'];?></p>
                            <p> Price: <?php echo $row['price'];?> RON</p>
                            <p> Quantity: <?php echo $cart[$k]['q'];?> </p>
                        </div>

                        <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=del&k=<?php echo $k;?>"><button onclick="delAlert()">Delete</button></a></div>
                        <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=plus&k=<?php echo $k;?>"><button>+1</button></a></div>
                        <div class="col-md-2" style="margin-top: 5%"><a href="shoppingcart.php?com=minus&k=<?php echo $k;?>"><button>-1</button></a></div>
                    </div>

                    <?php
                }
            }
        }
        $k=$k+1;
        if($total > 500)
            $total2 = $total;
        else
            $total2 = $total + 15;
    }
    // total ?>
    <div class="row" style="border-top: 5px solid black; margin-top: 5%">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top: 2%">
            <h4 style="">Subtotal: <?php echo $total; echo " ";?>RON</h4>
            <?php
            if($total > 500)
            {
                ?>
            <h4 style="t"> Taxa livrare:
                <a style="text-decoration: line-through"> 15 RON</a>
                <a> 0 RON</a>
            </h4>

            <?php }
            else
                {
                    ?>
                    <?php ?>
                    <h4 style="t">Taxa livrare: 15 RON</h4>
                    <?php
                }
            ?>
            <h4 style="text-decoration: underline">Total: <?php echo $total2; echo " ";?>RON</h4>
            <h4 style="padding-top: 4%; padding-bottom: 3%"><a href="info.php">Proceed</a></h4>
        </div>
    </div>

<?php
} else { ?>
    <h4> Your shopping cart is empty.</h4>
<?php
} ?>
</div>

<?php
include("../../html/footer/footer.html");
mysqli_close($con);
?>
