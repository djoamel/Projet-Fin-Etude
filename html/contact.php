
<?php 
include_once "conection.php";

session_start();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job opp</title>
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <header>
        <div class="logo">
            <p><span>job</span>opportunity</p>
        </div>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="offreopp.php">Offer</a></li>
            <li><a href="aboutus.php" >About us</a></li>
            <li><a id="faha" href="contact.php" >Contact</a></li>

            <?php 
            if (!isset($_SESSION['id_u']))
         
         
         {
            echo'<li><a href="espace recruteure.php">Recruiting area</a></li>';
         }
         ?>
            
            <?php 
              if (!isset($_SESSION['email']))
         
         
            {
           echo '<li id="open"><a href="index.php" >Sign In</a><i class="fa fa-sign-in" aria-hidden="true" style="font-size:15px" ></i></li>';
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


    <div class="cntr">
    <div class="apply" >

    <form class="form1" method="post" action="feedback.php">
    <p class="message">Give us your feedback:</p>
    
    <label>
        Full name
        <input class="input" type="text" name="full_name" required>
    </label>
    
    <label>
        Email
        <input class="input" type="email" name="email" required>
    </label>
    
    <label>
        Message
        <textarea name="message" id="" required></textarea>
    </label>
    
    <button class="submit" name="send">Send</button>
</form>




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
</body>