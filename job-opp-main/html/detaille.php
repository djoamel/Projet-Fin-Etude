<?php 
require_once "conection.php";
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>job opp</title>
    <link rel="stylesheet" href="../css/detaille.css">
</head>
<body>


<div class="container">
        <div class="admin-header">Admin Dashboard</div>
        <div class="admin-content">
            <table class="admin-table">
                <tr>
                    <th>first name </th>
                    <th>last name </th>
                    <th>Phone number</th>
                    <th>Study level</th>
                    
                </tr>
               <?php
                $query = mysqli_query($conn, "SELECT u.*, p.*, o.* FROM `utilisatuer` u JOIN `postuler` p ON p.id_utilisateur = u.id_utilisateur JOIN `offre` o ON o.id_offre = p.id_offre WHERE o.id_recruteure = 'id_r'");

                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo '<tr>
                        <td>' . $row['firstname'] . '</td>       
                        <td>' . $row['lastname'] . '</td>         
                        <td>' . $row['phonenumber'] . '</td>  
                        <td>' . $row['niveau_etude'] . '</td>              
                    </tr>';
                    }
                }
                
                 
              
                   
               
                ?>
                
            </table>
        </div>

</body>
</html>

