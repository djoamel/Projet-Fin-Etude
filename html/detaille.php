<?php 
require_once "conection.php";
session_start();
if (isset($_SESSION['id_r'])) {
    $user_id = $_SESSION['id_r'];
}
if (isset($_GET['d'])){
    $amin=$_GET['d'];
}

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
<a href="profile.php"> <span id="close">&times;</span> </a>


        <div class="admin-header">Recruter dashboard</div>
        <div class="admin-content">
            
            <table class="admin-table">
                <tr>
                    <th>first name </th>
                    <th>last name </th>
                    <th>Phone number</th>
                    <th>Study level</th>
                    <th>Kind of worker</th>
                    <th>Descreption</th>


                    
                </tr>
               <?php
                $query = mysqli_query($conn, "SELECT p.*, o.* FROM `postuler` p JOIN `offre` o ON p.id_offre = o.id_offre WHERE p.id_offre = '$amin' AND p.id_recruteure='$user_id'");

                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo '<tr>
                        <td>' . $row['firstname'] . '</td>       
                        <td>' . $row['lastname'] . '</td>         
                        <td>0' . $row['phonenumber'] . '</td>  
                        <td>' . $row['niveau_etude'] . '</td> 
                        <td>' . $row['Kind_worker'] . '</td>        
                        <td>' . $row['cv'] . '</td>              


                    </tr>';
                    }
                }
                
                 
              
                   
               
                ?>
                
            </table>
        </div>

</body>
</html>

