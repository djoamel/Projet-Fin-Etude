<?php 
require_once "conection.php";
session_start();


// Vérification et récupération des données utilisateur
if (isset($_SESSION['id_r'])) {
    $user_id = $_SESSION['id_r'];

    // Requête pour récupérer les données de l'utilisateur
    $query = "SELECT r.*, s.name AS subscription_name, s.price, s.max_offres, r.sub_exp
              FROM recruteur r 
              LEFT JOIN subscriptions s ON r.id_sub = s.id_sub 
              WHERE r.id_recruteure = ?";
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
        $exp_date = $user_data['sub_exp'];

        // Check if the user has a subscription
        if (is_null($user_data['id_sub'])) {
            $name = '/';
            $price = '/';
            $max = '/';
            $expp = '/';
        } else {
            $name = $user_data['subscription_name'];
            $price = $user_data['price'];
            $max = $user_data['max_offres'];
            $expp = $exp_date;

            // Check if the subscription is expired
            $current_date = date('Y-m-d');
            if ($exp_date <= $current_date) {
                $name = '/';
                $price = '/';
                $max = '/';
                $expp = 'expired';
            }
        }
    } else {
        // Handle the case where no matching user is found
        $firstname = $lastname = $email = $gender = $name = $price = $max = $expp = 'Not available';
    }
}


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job opp</title>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
</head>
<body>
    
    <header>
        <div class="logo">
            <p><span>job</span>opportunity</p>
        </div>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="offreopp.php">Offer</a></li>
            <li><a href="aboutus.php">About us</a></li>
            <li><a href="contact.php" >Contact</a></li>
            <li><a href="espace recruteure.php">Recruiting area</a></li>
            <li><a id="faha" href="profile.php">Profile</a></li>
            <?php 
                if (isset($_SESSION['id_r'])) {
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
            ?>
        </ul>
        <div class="toggle_menu"></div>
        
    </header>

    
</head>
<body>

<div id="popup" class="popup">
  <p>Votre mot de passe a été modifié avec succès.</p>
</div>
    <div class="container">
        <div class="profile-header">User Profile:</div>
        <div class="profile-content">
            <table class="profile-table">
                <tr><th colspan="2">User Details:</th></tr>
                <tr><th>Email</th><td><?php echo $email; ?></td></tr>
                <tr><th>First name</th><td><?php echo $firstname; ?></td></tr>
                <tr><th>Last name</th><td><?php echo $lastname; ?></td></tr>
                <tr><th>Gender</th><td><?php echo $gender; ?></td></tr>
                <tr><th>Plan</th><td><?php echo $name; ?></td></tr>
                <tr><th>Price</th><td><?php echo $price; ?>DA</td></tr>
                <tr><th>Max of offers</th><td><?php echo $max; ?></td></tr>
                <tr><th>Expreation date</th><td><?php echo $expp; ?></td></tr>
                <tr>
                <th>Membership</th>
                <td>
                    <?php
                    if ($expp == 'expired') {
                        echo '<a href="espace recruteure.php#crt">
                                <button class="btn btn-primary">Renew</button>
                              </a>';
                    } else {
                        echo '<a onclick="return confirm(\'Are you sure you want to cancel your membership?\');" href="cancel_plan.php?v=' . $user_id . '">
                                <button class="btn btn-warning">Cancel</button>
                              </a>';
                    }
                    ?>
                </td>
            </tr>



            </table>
        </div>
        <div class="button-container">
            <a href="profile-edit.php">
                <button class="btn btn-primary">Edit</button>
            </a>
            <a href="profile_delet.php">
                <button class="btn btn-warning">Delete</button>
            </a>
            <a href="logout.php">
                <button class="btn btn-info">Logout</button>
            </a>
        </div>
    </div>

   
    <div class="advertise">
    <?php
    $get_offers = mysqli_query($conn, "SELECT * FROM `offre` WHERE  naw3='special' AND id_recruteure='$user_id'");
    if (mysqli_num_rows($get_offers) > 0) {
        echo '<h1>Special offers</h1>';
        while ($row = mysqli_fetch_assoc($get_offers)) {
            $offer_id = $row['id_offre'];
            echo '
            <div class="alll">
            
                <h2>' . $row['nom_entreprise'] . ':</h2>
                <div class="eta">
                    ';
        if ($row['valide'] == 'V') {
            echo '<h7 class="v" >VALIDATED</h7>';
        } else {
            echo '<h7 class="f" > NOT VALIDATED</h7>';
        }
        echo '
                </div>
                <div class="ad_img">
                
                    <img src="./offer/' . $row['logo'] . '">
                    <div class="text">
                        <div class="card-details">
                            <h3>Kind of worker:</h3>
                            <p>' . $row['Kind_worker'] . '</p>
                            <h3>Contract type:</h3>
                            <p>' . $row['type_de_contrat'] . '</p>
                            <h6>For more information: 0' . $row['tel_entreprise'] . '</h6>
                            <a href="edit_offre.php?id_offre=' . $row['id_offre'] . '"><button class="butn1">Edit</button></a>
                            <a href="deletoffre.php?d='.$row['id_offre'].'"> <button class="butn2" >Delete</button></a>
                        </div>
                        <a href="detaille.php?d='.$row['id_offre'].'"><button class="card-button">Details</button></a>
                    </div>
                </div>
                <div id="windw' . $offer_id . '" class="offer-detail-window">
                    <div class="dakhel2">
                        <span onclick="closem(' . $offer_id . ')" class="close-button">&times;</span>
                        <div class="more">
                            <h5>' . $row['détaille_offre'] . '</h5>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }
    ?>
</div>

    



        <div class="zayed">
        <h1>Offers:</h1>
            <div class="card-contain" >
            <?php
$get_offers = mysqli_query($conn, "SELECT * FROM `offre` WHERE naw3='simple' AND id_recruteure='$user_id'");
if (mysqli_num_rows($get_offers) > 0) {
    while ($row = mysqli_fetch_assoc($get_offers)) {
        echo '
        <div class="card">
            <div class="front">
                <div class="circle">
                    <img src="./offer/' . $row['logo'] . '">
                </div>
                <div class="ktiba">
                    <h3>' . $row['nom_entreprise'] . ':</h3>
                    <h5>' . $row['Kind_worker'] . '</h5>
                    <h4>Type of contract:</h4>
                    <h5>' . $row['type_de_contrat'] . '</h5>
                    <h6>For more information:0' . $row['tel_entreprise'] . '</h6>
                </div>
                <div class="etat">
                    ';
        if ($row['valide'] == 'V') {
            echo '<h2 class="v" >VALIDATED</h2>';
        } else {
            echo '<h2 class="f" > NOT VALIDATED</h2>';
        }
        echo '
                </div>
                <div class="sahm">
                    <p class="r">rotate</p>
                    <p class="s"> →</p>
                </div>
            </div>
            <div class="back">
                <div class="ktiba">
                    <h5>' . $row['détaille_offre'] . '</h5>
                </div>
                <a href="detaille.php?d=' . $row['id_offre'] . '"><button id="openl" onclick="openl()" class="button">Details</button></a>
                            <a href="edit_offre.php?id_offre=' . $row['id_offre'] . '"><button class="butn1">Edit</button></a>

                <a href="deletoffre.php?d=' . $row['id_offre'] . '"><button id="openl" class="buttond">delete</button></a>
            </div>
        </div>
        ';
    }
}
?>

            </div>
        </div>



   
    
        <script>
      var small_menu = document.querySelector('.toggle_menu')
var menu = document.querySelector('.menu')

small_menu.onclick = function(){
     small_menu.classList.toggle('active');
     menu.classList.toggle('responsive');

}





var open_1=document.getElementById('open2');
var closem_1=document.getElementById('close2');
var windw_1=document.getElementById('windw2');

function openm(offerId) {
    document.getElementById('windw' + offerId).style.display = 'block';
}

function closem(offerId) {
    document.getElementById('windw' + offerId).style.display = 'none';
}
      </script>
</body>

</html>
