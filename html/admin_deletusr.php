<?php
require_once "conection.php";
if (isset($_GET['v'])){
$delet=$_GET['v'];
$deletoffre= mysqli_query($conn,"DELETE FROM `utilisatuer` WHERE `id_utilisateur`='$delet'");
header("location:admin.php");
die;
}

?>