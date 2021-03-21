<?php
session_start();
include("../html/header/header.html");
unset($_SESSION['filterby1']); ?>

<div class="container-md" style="height: auto; background-color: navajowhite; border-style: groove; margin-top: 5%; border-bottom: none">
    <!-- PRODUCTS RANGE-->
    <h6 style="color: dodgerblue; margin-top: 1%"> Products </h6>
    <!-- PRODUCTS RANGE-->
    <h1 class="neon23" data-text="U" style="height: auto; max-width: 100%; margin-top: 4%"><span class="flicker-slow2" style="height: auto; max-width: 100%;">INSTRUMENTS</span></h1>

    <div class="row" style="margin-top: 3%">
        <div class="col-md-3 text-center">
            <a href="guitars/guitars.php"> <img src="https://cdn.mos.cms.futurecdn.net/2ahx5EMCazvGZWA224XxFb-320-80.jpg" class="myn2" style="width: 100%"> </a>
            <h4 style="margin-top: 7%"> <a href="guitars/guitars.php" class="prodcs" style="text-decoration: none"> Guitars </a> </h4>
        </div>
        <div class="col-md-3 text-center">
            <a href="basses/bass.php"> <img src="https://cdn.mos.cms.futurecdn.net/2ReWYiiWjCaxgujxoBLobk-320-80.jpg" class="myn2" style="width: 100%"> </a>
            <h4 style="margin-top: 7%"> <a href="basses/bass.php" class="prodcs" style="text-decoration: none"> Basses </a> </h4>
        </div>
        <div class="col-md-3">

        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>

<div class="container-md" style="height: auto; background-color: navajowhite; border-style: groove; border-top: none">
    <h1 class="neon23" data-text="U" style="height: auto; max-width: 100%; padding-top: 8%"><span class="flicker-slow" style="height: auto; max-width: 100%;">ACCESSIORIES</span> </h1>
    <div class="row" style="margin-top: 3%">
        <div class="col-md-3 text-center">
            <a href="amps/amp.php"> <img src="https://cdn.mos.cms.futurecdn.net/gw3qbuQo6PQiVFcyj5RLhE-320-80.jpg" class="myn2" style="width: 100%"> </a>
            <h4 style="margin-top: 7%"> <a href="amps/amp.php" class="prodcs" style="text-decoration: none"> Amps </a> </h4>
        </div>
        <div class="col-md-3 text-center">
            <a href="picks/pick.php"> <img src="data:image/jpeg;base64,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" class="myn2" style="width: 100%"> </a>
            <h4 style="margin-top: 7%"> <a href="picks/pick.php" class="prodcs" style="text-decoration: none"> Picks </a> </h4>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <br/>
    <br/>
    <br/>
</div>

<?php include("../html/footer/footer.html") ?>

</body>
</html>
