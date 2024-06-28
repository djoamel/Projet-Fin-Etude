<?php
require 'conection.php';

if (isset($_POST['update'])) {
    $id_offre = mysqli_real_escape_string($conn, $_POST['id_offre']);
    $nom_entreprise = mysqli_real_escape_string($conn, $_POST['nom_entreprise']);
    $tel_entreprise = mysqli_real_escape_string($conn, $_POST['tel_entreprise']);
    $type_de_contrat = mysqli_real_escape_string($conn, $_POST['type_de_contrat']);
    $naw3 = mysqli_real_escape_string($conn, $_POST['naw3']);
    $email_entreprise = mysqli_real_escape_string($conn, $_POST['email_entreprise']);
    $Kind_worker = mysqli_real_escape_string($conn, $_POST['Kind_worker']);
    $détaille_offre = mysqli_real_escape_string($conn, $_POST['détaille_offre']);

    error_log("POST data: id_offre=$id_offre, nom_entreprise=$nom_entreprise, tel_entreprise=$tel_entreprise, type_de_contrat=$type_de_contrat, naw3=$naw3, email_entreprise=$email_entreprise, Kind_worker=$Kind_worker, détaille_offre=$détaille_offre");

    $query = "UPDATE offre SET nom_entreprise = '$nom_entreprise', tel_entreprise = '$tel_entreprise', type_de_contrat = '$type_de_contrat', naw3 = '$naw3', email_entreprise = '$email_entreprise', Kind_worker = '$Kind_worker', détaille_offre = '$détaille_offre' WHERE id_offre = '$id_offre'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<div class="jedi">Offer updated successfully!</div>';
        echo '<script>
                setTimeout(function() {
                    window.location.href = "profile.php"; 
                }, 2200); 
              </script>';
    } else {
        echo '<div class="popup">Error updating offer: ' . mysqli_error($conn) . '</div>';
        echo '<script>
                setTimeout(function() {
                    window.location.href = "profile.php"; 
                }, 2200); 
              </script>';
    }

    echo '<script src="popup.js"></script>';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job opp</title>
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
    <link rel="stylesheet" href="../css/update.css">

</head>
<body>
    <div class="pht" >
        <img class="img" src="../images/upd.png" alt="">
    </div>