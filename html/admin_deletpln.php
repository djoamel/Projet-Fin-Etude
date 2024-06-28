<?php
require_once "conection.php";
if (isset($_GET['v'])){
$delet=$_GET['v'];
$deletoffre= mysqli_query($conn,"DELETE FROM `subscriptions` WHERE `id_sub`='$delet'");
header("location:admin.php");
die;
}

?>