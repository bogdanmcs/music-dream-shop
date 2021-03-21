<?php
session_start();

if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if(isset($_GET['id'])){
    if(!isset($_SESSION['cart'])){
        array_push($_SESSION['cart'], array("idu" => $_GET['id'], "db" => $_GET['db'], "q" => $_GET['q']));
    } else {
        $i = 0;
        $ok = 0;
        while(isset($_SESSION['cart'][$i])){
            if($_SESSION['cart'][$i]['idu'] == $_GET['id'] && $_SESSION['cart'][$i]['db'] == $_GET['db']){
                $_SESSION['cart'][$i]['q'] = $_SESSION['cart'][$i]['q'] + 1 ;
                $ok = 1;
            }
                $i = $i + 1;
        }
        if($ok == 0){
            array_push($_SESSION['cart'], array("idu" => $_GET['id'], "db" => $_GET['db'], "q" => $_GET['q']));
        }
    }
} else {
    header("location:../products.php");
}
?>

<?php include("../../html/header/header.html") ?>

    <div class="container-md" style="height: auto; background-color: navajowhite; border-style: groove; margin-top: 5.5%">
        <div class="row">
            <b style="margin-top: 1%; margin-left: 1%"><p>Product added. </p></b>
            <a style="margin-left: 1%; margin-top: 1%" href="shoppingcart.php">View your shopping cart!</a>
        </div>
        <div class="row">
            <h6 style="margin-left: 1%"><button onclick="goBack1()">Continue shopping</button></h6>
        </div>
    </div>

<?php include("../../html/footer/footer.html") ?>