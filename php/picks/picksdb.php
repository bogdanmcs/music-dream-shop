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

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($con, "DELETE FROM picks WHERE id=$id");
    header('location:picksdb.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> MusicDream </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .test33{
            background: #00b33c;
            color: black;
            border: 2px solid black;
            padding: 5px;
            border-radius: 20px;
        }
        .test33:hover{
            background: #00b33c;
            color: red;
            text-decoration: none;
            border: 2px solid black;
            padding: 5px;
            border-radius: 20px;
        }
    </style>
</head>
<body style="background-color: antiquewhite">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand " style="font-size: 25px; color: red; font-family: 'Bauhaus 93' ">MusicDream</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link neon" href="../../index.php" style="color: white">Home </a>  </li>
            <li class="nav-item">  <a class="nav-link neon" href="../products.php" style="color: white">Products </a> </li>
            <li class="nav-item dropdown">
                <a class="nav-link  dropdown-toggle neon" href="#" data-toggle="dropdown" style="color: white">  Categories  </a>
                <ul class="dropdown-menu" style="background-color: #343a40">
                    <div class="dropdown-header">INSTRUMENTS</div>
                    <li><a class="dropdown-item neon" href="../guitars/guitars.php" style="color: white; background-color: #343a40"> Guitar </a></li>
                    <li><a class="dropdown-item neon" href="bass.php" style="color: white; background-color: #343a40"> Bass </a></li>
                    <div class="dropdown-header">ACCESSORIES</div>
                    <li><a class="dropdown-item neon" href="../amps/amp.php" style="color: white; background-color: #343a40"> Amps</a></li>
                    <li><a class="dropdown-item neon" href="../picks/pick.php" style="color: white; background-color: #343a40"> Picks </a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link neon" href="../admin.php" style="color: white"> Admin </a></li>
            <li class="nav-item"><a class="nav-link neon" href="/php/shoppingcart/shoppingcart.php" style="color: white"> ShopCart</a></li>
        </ul>
    </div>
</nav>

<div class="container-md" style="height: auto; background-color: navajowhite; border-style: groove; margin-top: 5.5%">
    <h5 style="margin-top: 2%"> <a class="test33" href="picksdb_create.php"> Create New </a> </h5>

    <form class="form-inline my-2 my-lg-0" method="POST" action="test_search_p.php" style="padding-top: 1%">
        <input class="form-control mr-sm-2" type="text" name="searchid" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search by id</button>
    </form>

    <form class="form-inline my-2 my-lg-0" method="POST" action="test_search_p.php" style="padding-top: 1%">
        <input class="form-control mr-sm-2" type="text" name="searchmodel"  aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search by model</button>
    </form>
    <form class="form-inline" action="picksdb.php" style="margin-top: 1%">
        <button type="submit" class="btn btn-info">Show All</button>
    </form>


    <?php
    $result = mysqli_query($con,"SELECT * FROM picks");

    if(isset($_SESSION['searchid'])){
        $varid = $_SESSION['searchid'];
        $result = mysqli_query($con,"SELECT * FROM picks WHERE id LIKE '%$varid%'");
        unset($_SESSION['searchid']);
    } elseif (isset($_SESSION['searchmodel'])) {
        $varm = $_SESSION['searchmodel'];
        $result = mysqli_query($con,"SELECT * FROM picks WHERE ptype LIKE '%$varm%'");
        unset($_SESSION['searchmodel']);
    }
    ?>

    <div class="table-responsive-lg" style="height: auto;margin-top: 1%; color: black">
        <table class="table table-bordered table-active">
            <thead>
            <tr style="color: black">
                <th scope="col">id</th>
                <th scope="col">Type</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td> <?php echo $row['id']; ?> </td>
                <td> <?php echo $row['ptype']; ?> </td>
                <td> <?php echo $row['price']; ?> </td>
                <td> <a href="updatep.php?id=<?php echo $row['id']; ?>" style="color:green">Edit</a> </td>
                <td><a href="picksdb.php?del=<?php echo $row['id']; ?>" style="padding-left: 5%;color: red">Delete</a> </td>
            </tr>
            </tbody>
            <?php
            }} else {echo "Record(s) not found.";}
            mysqli_close($con);
            ?>
        </table>
    </div>
</div>

<?php include("../../html/footer/footer.html") ?>

</body>
</html>

