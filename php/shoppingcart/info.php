<?php
include("../../html/header/header.html");
?>

<div class="container-md text-md-center" style="height: auto; background-color: navajowhite; border-style: groove; margin-top: 5%">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="background-color: navajowhite; border: 3px solid brown; border-radius: 20px; margin-top: 2%; margin-bottom: 2%">
            <h3 style="text-decoration: underline; margin-top: 2%">Order info</h3>
            <form method="post" action="thx.php">
                <br>
                <b style="font-size: 18px;">First name</b><br>
                <input type="text" required="required" name="fname" style="border: 1px solid black; box-shadow: 3px 5px 6px black;margin-top: 1%">
                <br><br>
                <b style="font-size: 18px; ">Last name</b><br>
                <input type="text" required="required" name="lname" style="border: 1px solid black; box-shadow: 3px 5px 6px black;margin-top: 1%">
                <br><br>
                <b style="font-size: 18px; ">Email</b><br>
                <input type="text" required="required"  style="border: 1px solid black; box-shadow: 3px 5px 6px black;margin-top: 1%">
                <br><br>
                <b style="font-size: 18px; ">Address</b><br>
                <input type="text" required="required"  style="border: 1px solid black; box-shadow: 3px 5px 6px black;margin-top: 1%">
                <br><br>
                <b style="font-size: 18px; ">Phone number</b><br>
                <input type="text" required="required"  style="border: 1px solid black; box-shadow: 3px 5px 6px black;margin-top: 1%">
                <br><br><br>
                <input type="submit" name="save" value="Finish order" style="margin-bottom: 2%; background-color: greenyellow; border-radius: 20px; font-size: 110%">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php
include("../../html/footer/footer.html");
?>
