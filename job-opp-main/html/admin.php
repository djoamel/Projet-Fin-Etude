<?php 
require_once "conection.php";
session_start();

            if (!isset($_SESSION['id_a'])){
                header("Location: index.php");
                     exit; 
            }
         
         ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job opp</title>
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
    <link rel="stylesheet" href="../css/admin.css">
    
</head>
<header>
        <div class="logo">
            <p><span>job</span>opportunity</p>
        </div>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="offreopp.php">Offer</a></li>
            <li><a href="aboutus.php">About us</a></li>
            <li><a href="espace recruteure.php">Recruiting area</a></li>
            <?php 
                if (isset($_SESSION['id_r'])) {
                    echo '<li><a href="profile.php">Profile</a></li>';
                }
            ?>


<?php 
            if (isset($_SESSION['id_a']))
         
         
         {
            echo'<li><a href="admin.php">Admin</a></li>';
         }
         ?>

            <?php 
              if (isset($_SESSION['id_u'])||isset($_SESSION['id_r'])|| (isset($_SESSION['id_a'])))
         
         
            {
           echo '<li><a href="logout.php" >logout</a></li>';
              }
              ?>
        </ul>

        <div class="toggle_menu"></div>
    </header>
<body>




    <div class="container">
        <div class="admin-header">Admin Dashboard</div>
        <div class="admin-content">
            <table class="admin-table">
                <tr>
                    <th>first name recruter</th>
                    <th>last name recruter</th>
                    <th>Email</th>
                    <th>delete recruter</th>
                    
                </tr>
               <?php
                 $query=mysqli_query($conn,"SELECT * FROM recruteur ");

                 if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo '<tr>
                    <td>'.$row['nom'].'</td>       
                    <td>'.$row['prénom'].'</td>         
                    <td>'.$row['email'].'</td>              
                    <td>
                        <a onclick="return confirm(\'Are you sure? deleting the profile will delete all its offers!\');" href="admin_deletrecru.php?v='.$row['id_recruteure'].'">
                            <button class="btn btn-warning">Delete</button>
                            <br>
                            <br>
                       
                    </td>
                    </tr>';
                    } 
                 }
                 
              
                   
               
                ?>
                
            </table>
        </div>
        <br>
        <br>
      
        <table class="admin-table">
                <tr>
                    <th>first name recruter</th>
                    <th>last name recruter</th>
                    <th>Email</th>
                    <th>Compagnie</th>
                    <th>Kind worker</th>
                    <th>Type de Contrat</th>
                    <th>Validate</th>
                    <th>delete offer</th>
                </tr>
                <?php
$get_offers = mysqli_query($conn, "SELECT o.*, r.* FROM offre o JOIN recruteur r ON o.id_recruteure = r.id_recruteure");

if (mysqli_num_rows($get_offers) > 0) {
    while ($row = mysqli_fetch_assoc($get_offers)) {
        echo '<tr>
            <td>' . $row['nom'] . '</td>
            <td>' . $row['prénom'] . '</td>
            <td>' . $row['email'] . '</td>
            <td>' . $row['nom_entreprise'] . '</td>
            <td>' . $row['Kind_worker'] . '</td>
            <td>' . $row['type_de_contrat'] . '</td>
            <td>';
        
        if ($row['valide'] === 'F') {
            echo '<a onclick="return confirm(\'Are you sure you want to validate this offer?\');" href="validate_offre.php?v=' . $row['id_offre'] . '">
                    <button onclick="change(this)" class="btn btn-primary">Valid</button>
                  </a>';
        } else if ($row['valide'] === 'V'){
            echo '<button class="btn btn-primary akhdr">Validated</button>';
        }

        echo '</td>
            <td>
                <a onclick="return confirm(\'Are you sure you want to delete this offer?\');" href="admin_deletoffre.php?v=' . $row['id_offre'] . '">
                    <button class="btn btn-warning">Delete</button>
                </a>
            </td>
        </tr>';
    }
}
?>

                <!-- Ajoutez d'autres lignes pour chaque recruteur -->
            </table>
        <div class="button-container">

            <a href="logout.php">
                <button class="btn btn-info">Logout</button>
            </a>
        </div>
    </div>
    
    <script src="window.js" >
        var small_menu = document.querySelector('.toggle_menu')
var menu = document.querySelector('.menu')

small_menu.onclick = function(){
     small_menu.classList.toggle('active');
     menu.classList.toggle('responsive');
}
  


    </script>
</body> 
</html>