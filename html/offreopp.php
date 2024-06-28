<?php 
require_once "conection.php";
session_start();


  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job opp</title>
    <meta http-equiv="refresh" content="">
    <link rel="stylesheet" href="../css/offreopp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <li><a id="faha" href="offreopp.php">Offer</a></li>
            <li><a href="search.php">Search</a><i class="fa fa-search" style="font-size:15px" ></i></li>
            <li><a href="aboutus.php" >About us</a></li>
            <li><a href="contact.php" >Contact</a></li>



            <?php 
            if (!isset($_SESSION['id_u']))
         
         
         {
            echo'<li><a href="espace recruteure.php">Recruiting area</a></li>';
         }
         ?>

<?php 
              if (!isset($_SESSION['email']))
         
         
            {
           echo '<li ><a  href="index.php"  >Sign In</a><i class="fa fa-sign-in" aria-hidden="true" style="font-size:15px" ></i></li>';
              }
              else if (!isset($_SESSION['id_u']));
              ?>

            
<?php 
              if (isset($_SESSION['id_r']))
         
         
            {
           echo '<li><a href="profile.php" >Profile</a></li>';
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

        <!-- menu responsive -->
        <div class="toggle_menu"></div>
        
    </header>



    <div id="signInPopup" class="popu">
  <p>Sign in first to apply to an offer!</p>
</div>



<div class="advertise">
    <?php
    $get_offers = mysqli_query($conn, "SELECT o.*, r.* FROM `offre` o JOIN `recruteur` r ON o.id_recruteure = r.id_recruteure WHERE o.naw3 = 'special' AND o.valide = 'V' AND r.sub_exp > CURDATE()");
    if (mysqli_num_rows($get_offers) > 0) {
        echo '<h1>Special offers</h1>';
        while ($row = mysqli_fetch_assoc($get_offers)) {
            $offer_id = $row['id_offre'];
            echo '
            <div class="alll">
                <h2>' . $row['nom_entreprise'] . ':</h2>
                <div class="ad_img">
                    <img src="./offer/' . $row['logo'] . '">
                    <div class="text">
                        <div class="card-details">
                            <h3>Kind of worker:</h3>
                            <p>' . $row['Kind_worker'] . '</p>
                            <h3>Contract type:</h3>
                            <p>' . $row['type_de_contrat'] . '</p>
                            <h6>For more information: 0' . $row['tel_entreprise'] . '</h6>
                            <a href="apply.php?offre=' . $offer_id . '&k=' . $row['id_recruteure'] . '"><button class="butn1">Apply</button></a>
                        </div>
                        <button onclick="openm(' . $offer_id . ')" class="card-button">Learn more</button>
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
     $get_offers=mysqli_query($conn," SELECT o.*, r.* FROM `offre` o JOIN `recruteur` r ON o.id_recruteure = r.id_recruteure WHERE o.naw3 = 'simple' AND o.valide = 'V' AND r.sub_exp > CURDATE() ");
     if(mysqli_num_rows($get_offers) > 0)
     {
         
         while($row=mysqli_fetch_assoc($get_offers))
          {
             echo'

             
             <div class="card">
             <div class="front">
                 <div class="circle" >
                 <img src="./offer/'.$row['logo'].'">

                 </div>
                 <div class="ktiba" >
                     <h3>'.$row['nom_entreprise'].':</h3>
                     <h5>'.$row['Kind_worker'].'</h5>
                     <h4>Contract type:</h4>
                     <h5>'.$row['type_de_contrat'].'</h5>
                     <h6>For more information:0'.$row['tel_entreprise'].'</h6>
                     
                 </div>
                 <div class="sahm">
                     <p class="r">rotate</p>
                     <p class="s"> →</p>
                 </div>
                 
                 
             </div>
             <div class="back">
                 <div class="ktiba">
                     <h5> '.$row['détaille_offre'].' </h5>
                 </div>
                 <a  href="apply.php?offre='.$row['id_offre'].'&k='.$row['id_recruteure'].'" > <button class="button" >Apply</button></a>
                 </div>
             </div>
         


             ';
         }
    }
    ?>
            </div>
        </div>




        
           
        <footer>
          <div class="services_list">
              <div class="service">
                  <img src="../icon/clock.png" alt="">
                  <h2>Opening</h2>
                  <p>10h30 à 23h45</p>
                  <p>23h45 à 9h30</p>
              </div>

              <div class="service">
                <img src="../icon/pin.png" alt="">
                <h2>Adresses</h2>
                <p>France-Paris</p>
                <p>Annaba-Algérie</p>
            </div>
            <div class="service">
                <img src="../icon/email.png" alt="">
                <h2>Emails</h2>
                <p>fusion10dbs@gmail.com</p>
                <p>Fer905758@gmail.com</p>
            </div>
            <div class="service">
                <img src="../icon/call.png" alt="">
                <h2>Numbers</h2>
                <p>+213 782999224</p>
                <p>+213 699442990</p>
            </div>
            
            <hr>
          </div>

          <p class="footer_text">Directed by <span class="span">DJAMEL MLM Dev</span> | All rights reserved.</p>
          
      </footer>
<script src="window.js" ></script>
    <script>

<?php if (!isset($_SESSION['email'])): ?>
    
    setTimeout(function(){
        document.getElementById('signInPopup').style.display = 'block';
      }, 400);
      
      
      setTimeout(function(){
        document.getElementById('signInPopup').style.display = 'none';
      }, 3000);
  <?php endif; ?>


  var open_1=document.getElementById('open2');
var closem_1=document.getElementById('close2');
var windw_1=document.getElementById('windw2');

function openm(offerId) {
    document.getElementById('windw' + offerId).style.display = 'block';
}

function closem(offerId) {
    document.getElementById('windw' + offerId).style.display = 'none';
}















var small_menu = document.querySelector('.toggle_menu')
var menu = document.querySelector('.menu')

small_menu.onclick = function(){
     small_menu.classList.toggle('active');
     menu.classList.toggle('responsive');
}
  



        
    </script>
   
</body>
</html>