<?php
require_once "conection.php";
if (isset($_GET['v'])){
$update=$_GET['v'];
$updateoffre= mysqli_query($conn,"UPDATE  `recruteur` SET id_sub=NULL , sub_exp=NULL  WHERE id_recruteure='$update'");
header("location:profile.php");
die;
}

?>