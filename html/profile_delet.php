


<?php 
require_once "conection.php";
session_start();

// Vérification et récupération des données utilisateur
if (isset($_SESSION['id_r'])) {
    $user_id = $_SESSION['id_r'];

    // Requête pour récupérer les données de l'utilisateur
    $query = "SELECT `nom`, `sexe`, `prénom`, `email` FROM `recruteur` WHERE `id_recruteure` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user_data = $result->fetch_assoc();
        $firstname = $user_data['prénom'];
        $lastname = $user_data['nom'];
        $email = $user_data['email'];
        $gender = $user_data['sexe'];
    } else {
        // L'utilisateur n'existe pas ou une erreur s'est produite lors de la récupération des données
        // Vous pouvez gérer cela en affichant un message d'erreur ou en redirigeant l'utilisateur
        // header("Location: erreur.php");
        // exit();
    }
}
if (isset($_POST['delete'])) {
    $query = "DELETE FROM `recruteur` WHERE `id_recruteure` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    header ('location:logout.php');
    die;
   }
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job opp</title>
    <link rel="stylesheet" href="../css/delete.css">
   
</head>


<body>
    <div  class="dlt" >
    
            <div class="dakhel">
                <div class="h2">Delete Profile</div>

                <!-- Formulaire de confirmation -->
                <div class="alert">Are you sure you want to delete your profile?</div>

                <form method="post">
                    <div class="p-2">
                        <button class="btn btn-danger float-end" type="submit" name="delete">Delete</button>
                        <a href="profile.php" class="btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
    </div>

        

</body>
</html>
