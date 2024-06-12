<?php 
include_once "conection.php";

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



if (!isset($_SESSION['email'])) {
    header("Location: offreopp.php");
    exit; 
}
if (isset($_GET['offre'])) {
  $offre = $_GET['offre'];
}
if (isset($_GET['k'])) {
    $k = $_GET['k'];
  }
if (isset($_SESSION['id_r'])) {
    header("Location: offreopp.php");
    exit; 
}
if (isset($_SESSION['id_u'])) {
    $id=$_SESSION['id_u'];
}
else{

}

?>


<?php 
if (isset($_POST['sen'])){
$number=$_POST['number'];
$sex=$_POST['sexe'];
$niveau_etude=$_POST['niveau_etude'];
$describ=$_POST['describ'];
$firstname=$_POST['first'];
$lastname=$_POST['last'];
$get_email=mysqli_query($conn,"SELECT email_entreprise FROM offre WHERE id_offre='$offre' limit 1");
$data = mysqli_fetch_assoc($get_email);
$email=$data['email_entreprise'];
$insert=mysqli_query ($conn,"INSERT INTO `postuler`(`id_utilisateur`, `id_offre`, `id_recruteure`, `firstname`, `lastname`, `sexe`, `phonenumber`, `niveau_etude`, `cv`) 
VALUES ('$id','$offre','$k','$firstname','$lastname','$sex','$number','$niveau_etude','$describ')");
if($insert)
{
  
  try
  {
    $mail = new PHPMailer(true);            
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'fusion10dbs@gmail.com';                    
    $mail->Password   = 'gavsxjwllcbrowig';                           
    $mail->SMTPSecure = 'tls';           
    $mail->Port       = 587;                                   
    $mail->setFrom('fusion10dbs@gmail.com');
    $mail->addAddress($email);    
    $mail->isHTML(true);
    $mail->Subject = 'Job request';
    $mail->Body  = "firstname: $firstname <br> lastname: $lastname  <br> Phone number: $number <br> Sexe: $sex <br> level of study: $niveau_etude <br> About me: $describ " ;
    $true=$mail->send();
      
      if($true)
      {
        $_SESSION['creat'] ="Vérifier Votre email pour vous Connectez.";
        header('Location:offreopp.php');
        die;
      }
      
      

    }catch(Exception $e){
      $_SESSION['creat'] ="Une erreur s'est produite. Veuillez réessayer.";
      header('Location:apply.php');
        die;
      
    }
    
    
}else
{
  $_SESSION['creat'] ="Une erreur s'est produite. Veuillez réessayer!";
}




}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/apply.css">
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
    <title>job opp</title>

    
</head>
<body class="bg-gray-100">
   


<div class="apply" >
<a href="offreopp.php"> <span id="close">&times;</span> </a>
<form class="form1" method="post">
<p class="message">Hope you get the job you want!</p>
                    <label>
                        first name
                        <input id="ln" class="input" type="text" placeholder="" required="" name="first">
                       
                    </label>
                    
                    <label>
                        last name
                        <input id="ln" class="input" type="text" placeholder="" required="" name="last">
                       
                    </label>
               
                    <label>
                        Phone number
                        <input id="ln" class="input" type="text" placeholder="" required="" name="number">
                       
                    </label>
        
                <label>
                    Your gender
                    <select name="sexe" id="" >
                      <option value="sexe" selected disabled>Sex</option>
                      <option value="homme">homme</option>
                      <option value="femme">femme</option>
            </select>
                </label> 
                <label for="">
                    Your level
                <select name="niveau_etude" id="niveau_etude" >
                        <option value="" disabled selected>Niveau d'étude</option>
                        <option value="Niveau Secondaire">Niveau Secondaire</option>
                        <option value="Niveau Terminal">Niveau Terminal</option>
                        <option value="Baccalauréat">Baccalauréat</option>
                        <option value="TS Bac +2">TS Bac +2</option>
                        <option value="Licence (LMD), Bac + 3">DLicence (LMD), Bac + 3</option>
                        <option value="Master 1, Licence  Bac + 4">Master 1, Licence  Bac + 4</option>
                        <option value="Master 2, Ingéniorat, Bac + 5">Master 2, Ingéniorat, Bac + 5</option>
                        <option value="Magistère Bac + 7">Magistère Bac + 7</option>
                        <option value="doctorat">Doctorat</option>
                        <option value="Non Diplômante">Non Diplômante</option>
                        <option value="Formation Professionnelle">Formation Professionnelle</option>
                        <option value="Certification">Certification</option>
                    </select>
                </label>
                
                <label for="">
                    
                    <textarea placeholder="Describe your self...." name="describ" id=""></textarea>
                    
                </label>


                <button  class="submit" name="sen">Send</button>

    </form>


</div>



</body>
</html>