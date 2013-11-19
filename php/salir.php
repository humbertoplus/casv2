<?php
session_start();
session_destroy();
setcookie("sesion", "",time()-1,"/");
header("Location: ../index.php");
?>