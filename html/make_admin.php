<?php
require_once "conection.php";
if (isset($_GET['v'])){
$update=$_GET['v'];
$updateoffre= mysqli_query($conn,"UPDATE  `utilisatuer` SET Role='Admin' WHERE id_utilisateur='$update'");
header("location:admin.php");
die;
}

?>