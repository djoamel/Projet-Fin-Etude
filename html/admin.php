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
            <li><a href="contact.php" >Contact</a></li>
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
    <div onclick="beyn()" id="hawes" class="searchh">
        <img class="adasa" src="../icon/search.png" alt="">
    </div>
    <div id="search" class="search" >
        <a onclick="khabi()" class="arj3" id="close" ><span   >&times;</span></a>

        <h5>Filter by section:</h5>
        <select id="cas" >
            <option  onclick="function()"  value="a">All</option>
            <option  onclick="function()"  value="b" >Recruter section</option>
            <option  onclick="function()"  value="c"  >offers section</option>
            <option  onclick="function()"  value="d" >users section</option>
            <option  onclick="function()"  value="e" >subscreption section</option>
        </select>
        
    </div>




    <div class="container">
        <div class="admin-header">Admin Dashboard</div>
        <div class="admin-content">
            <div id="rs" class="lawn" >
            <h2>Recruter section
            </h2>
            <table class="admin-table">
                <tr>
                    <th>first name recruter</th>
                    <th>last name recruter</th>
                    <th>Email</th>
                    <th>plan</th>
                    <th>experation date</th>
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
                    <td>'.$row['id_sub'].'</td>              
                    <td>'.$row['sub_exp'].'</td>              

                    <td>
                        <a onclick="return confirm(\'Are you sure? deleting the profile will delete all its offers!\');" href="admin_deletrecru.php?v='.$row['id_recruteure'].'">
                            <button class="btn btn-warning">Delete</button>
                            
                       
                    </td>
                    </tr>';
                    } 
                 }
                 
              
                   
               
                ?>
                
            </table>
            </div>
        </div>
        <br>
        <br>
        <div id="os" class="lawn" >
            <h2>Offers section
            </h2>
        <table class="admin-table">
                <tr>
                    <th>first name recruter</th>
                    <th>last name recruter</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Kind worker</th>
                    <th>Contract type</th>
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
                    <button  class="btn btn-primary">Valid</button>
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
        </div>
        <br>
        <br>

        <div id="us" class="lawn" >
            <h2>Users section
            </h2>
            <table class="admin-table">
                <tr>
                    <th>first name user</th>
                    <th>last name user</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Change role</th>
                    <th>delete user</th>

                    
                </tr>
               <?php
                 $query=mysqli_query($conn,"SELECT * FROM utilisatuer ");

                 if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo '<tr>
                    <td>'.$row['nom'].'</td>       
                    <td>'.$row['prénom'].'</td>         
                    <td>'.$row['email'].'</td>    
                    <td>'.$row['Role'].'</td>     
                     <td>';
        
        if ($row['Role'] === 'Simple') {
            echo '<a onclick="return confirm(\'Are you sure you want to make this user an admin?\');" href="make_admin.php?v=' . $row['id_utilisateur'] . '">
                    <button  class="btn btn-primary">Make admin</button>
                  </a>';
        } else if ($row['Role'] === 'Admin'){
            echo '<button class="btn btn-primary akhdr">Admin</button>';
        }

        echo '</td>

                    





                    
                    <td>
                        <a onclick="return confirm(\'Are you sure you want to delete this user!\');" href="admin_deletusr.php?v='.$row['id_utilisateur'].'">
                            <button class="btn btn-warning">Delete</button>
                            
                       
                    </td>
                    </tr>';
                    } 
                 }
                 
              
                   
               
                ?>
                
            </table>
            </div>
            <br>
            <br>
            <div id="ss" class="lawn" >
            <h2>Subscreptions section
            </h2>
            <table class="admin-table">
                <tr>
                    <th>Plan</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Max offers</th>
                    <th>Details</th>
                    <th>Edit plan</th>
                    <th>Delete plan</th>


                    
                </tr>
               <?php
                 $query=mysqli_query($conn,"SELECT * FROM subscriptions ");

                 if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo '<tr>
                    <td>'.$row['id_sub'].'</td>       
                    <td>'.$row['name'].'</td>       
                    <td>'.$row['price'].'</td>         
                    <td>'.$row['duration'].'</td>
                    <td>'.$row['max_offres'].'</td>
                    <td>-'.$row['c1'].'<br><br>-'.$row['c2'].'<br><br>-'.$row['c3'].'
                    </td>
                    <td>
                    <a href="edit_plan.php?v=' . $row['id_sub'] . '">
                    <button  class="btn btn-primary">Edit</button>
                  </a>

                    </td>

                    <td>
                        <a onclick="return confirm(\'Are you sure you want to delete this plan!\');" href="admin_deletpln.php?v='.$row['id_sub'].'">
                            <button class="btn btn-warning">Delete</button>
                            
                       
                    </td>
                    </tr>';
                    } 
                 }

                 
                 
              
                   
               
                ?>
                
                
                
            </table>
            <br>
            <a href="add_plan.php">
                    <button  class="btn  btn-primary">Add</button>
                  </a>
            </div>




      
        <br>
        <br>
        <div class="button-container">

            <a href="logout.php">
                <button class="btn btn-danger">Logout</button>
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