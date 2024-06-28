<?php 
require_once "conection.php";
session_start();

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

?>
<?php

$error=0;

if($_SERVER['REQUEST_METHOD']=='POST')
{




        if(isset($_POST['save']))
        {


            if(isset($_POST['password']) && !empty($_POST['password']))
            {


                $password =mysqli_real_escape_string($conn,$_POST['password']);

                if(strpos($password, ' ') !== false)
                {
                    $error=1;
                    $_SESSION['e_password']="le Mot de passe ne doit pas contenir des espaces!";


                }else if(strlen($password) < 8)
                {
                    $error=1;
                    $_SESSION['e_password']="Le mot de passe doit contenir au moins 8 caractères!";
                }

            }else
            {
            $error=1;
                $_SESSION['e_password']="Obligatoire!";
            }

            if(isset($_POST['new_password']) && !empty($_POST['new_password']))
            {


                $new_password =mysqli_real_escape_string($conn,$_POST['new_password']);
                

                if(strpos($new_password, ' ') !== false)
                {
                    $error=1;
                    $_SESSION['e_new_password']="le Mot de passe ne doit pas contenir des espaces!";


                }elseif(strlen($new_password) < 8)
                {
                    $error=1;
                    $_SESSION['e_new_password']="Le mot de passe doit contenir au moins 8 caractères!";
				}
                

            }else
            {
            $error=1;
                $_SESSION['e_new_password']="Obligatoire!";
            }

            if($error==0)
            {
                $stmt = $conn->prepare("SELECT `password` FROM `recruteur` WHERE `id_recruteure`  = ? LIMIT 1");
                $stmt->bind_param("s",$user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
                if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $old_password = $row['password'];
                if ($password==$old_password) {
                    if($new_password!==$old_password)
                    {   
                        $stmt = $conn->prepare("UPDATE `recruteur` SET `password` = ? WHERE`id_recruteure` = ? AND `password`= ? LIMIT 1");
                        $stmt->bind_param("sss", $new_password,$user_id,$old_password);
                        $stmt->execute();
                        $stmt->close();
                        $_SESSION['password']= "Votre mot de passe a été modifié avec succès.";
                        echo '<div class="jedi">Password updated successfully!</div>';
                         echo '<script>
                setTimeout(function() {
                    window.location.href = "profile.php"; 
                }, 2500); 
              </script>';
                    }
                    else
                    {
                        $_SESSION['erreur']="vous etes deja utiliser ce mot de passe!";
                        
                    }
                }else
                {
                    $_SESSION['erreur']="Mot de pass incorect!";
                    
                    
                }

                }
            }else
            {
                

            }




        }
      
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>job opp</title>
    <link rel="stylesheet" href="../css/edit.css">
</head>
<body>


	
	<?php if(!empty($user_data)):?>
	<br>
    <br>
    <br>
        <div class="container">
        <div class="col-md-8">
            <div class="h2">Edit Profile</div>

            <form method="post">
                <table class="table table-striped">
                    <tr><th colspan="2">User Details:</th></tr>
                    <tr>
                        <th class="bi"> Password</th>
                        <td>
                            <input type="password" class="form-control" name="password" placeholder="Old password">
                            
                        </td>
                    </tr>
                    <tr>
                        <th class="bi"> New Password</th>
                        <td>
                            <input type="password" class="form-control" name="new_password" placeholder="New password">
                        </td>
                    </tr>
                </table>

                <div class="p-2">
                    <button class="btn btn-primary float-end" type="submit" name="save">Save</button>
                    <a href="profile.php">
                        <label class="btn btn-secondary">Back</label>
                    </a>
                </div>
            </form>
        </div>
    </div>
   
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    var popup = document.querySelector('.jedi');
    if (popup) {
        setTimeout(function() {
            popup.style.display = 'block';
            setTimeout(function() {
                popup.style.display = 'none';
            }, 6000); 
        }, 300); 
    }
});
</script>

</body>
</html>

