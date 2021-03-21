<?php
session_start();
if(isset($_COOKIE['user']) && !empty(isset($_COOKIE['user']))){
    header('location:admingogo.php'); }
unset($_SESSION['filterby1']);
?>

<?php include("../html/header/header.html") ?>

<div class="container-md" style="height: auto; background-color: navajowhite; border-style: groove; margin-top: 5%; margin-bottom: 12.6%">
    <div class="row">
        <div class="col-md-4">
            <form action='logincheck.php' method='POST'>
                    <h2 style="color:red; font-family: 'Comic Sans MS'; margin-top: 1%; text-decoration: underline">Admin login</h2>
                    <br>
                    <b style="font-size: 18px; color: dodgerblue">Username</b><br>
                    <input type="text" required="required" name='username' id='username' style="border: 1px solid black; box-shadow: 3px 5px 6px black;margin-top: 1%">
                    <br><br>
                    <b style="font-size: 18px; color: dodgerblue">Password</b><br>
                    <input type="password" required="required" name='password' id='password' style="border: 1px solid black; box-shadow: 3px 5px 6px black;margin-top: 1%">
                    <br><br>
                    <input type="submit" name="submit" value="Log in" style="margin-bottom: 2%; background-color: orangered; color: white; border-radius: 20px; font-size: 110%">
            </form>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
        <br/><br/>
    </div>
</div>

<?php include("../html/footer/footer.html") ?>
