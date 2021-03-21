<?php
setcookie('user', "", time() - 3600, "/");
header('location:admin.php');
?>