<?php
require_once "conection.php";
if (isset($_GET['v'])){
$update=$_GET['v'];
$updateoffre= mysqli_query($conn,"UPDATE  `offre` SET valide='V' WHERE id_offre='$update'");
header("location:admin.php");
die;
}

?>