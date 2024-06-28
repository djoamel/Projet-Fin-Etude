<?php 
include_once "conection.php";

session_start();

if (!isset($_SESSION['id_r'])) {
    header("Location: espace recruteure.php");
    exit; 
}

if (isset($_SESSION['id_r'])) {
    $user_id = $_SESSION['id_r'];
}
if (isset($_POST['send'])) {
   
$e=0;

    if(empty($_POST['card_type']))
        {
            $e=1;
            $_SESSION['back']="Required!";

        }else
        {
            $cardtype=$_POST['card_type'];
            if(!in_array($cardtype,['Dahabiya Card','Societe Generale Card','Cpa Card','BNA Card']))
            {
                    $e=1;
                    $_SESSION['back']="Invalid Type Card!";
            }
        }

    if(empty($_POST['card_number']))
        {
            $e=1;
            $_SESSION['back']="Required!";

        }else
        {
            
            if (!preg_match('/^\d{12}$/', $_POST['card_number'])) {
                $_SESSION['back']=" Invalid card number!";
                $e= 1; 
             } else {
                $cardnumber=$_POST['card_number'];
            
            }
           
        }

    if(empty($_POST['expiration_date']))
        {
            $e=1;
            $_SESSION['back']="Required!";

        }else
        {
            
            if (!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $_POST['expiration_date'])) {
                $_SESSION['back']=" Invalid expiration date!";
                $e= 1; 
             } else {
                $exp=$_POST['expiration_date'];
            
            }
           
        }

    if(empty($_POST['ccv']))
        {
            $e=1;
            $_SESSION['back']="Required!";

        }else
        {
            if (!preg_match('/^\d{3}$/', $_POST['ccv'])) {
                $_SESSION['back']=" Invalid CCV!";
                $e=1; 
             } else {
                $ccv=$_POST['ccv'];
            
            }
               
           
        }

    if ($e==0){
            $subscription_id = $_POST['subscription_id'];
            $recruteur_id = $user_id;

            $query = "SELECT sub_exp FROM recruteur WHERE id_recruteure = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $recruteur_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $subscription_info = $result->fetch_assoc();
        
            if ($subscription_info) {
                $subscription_expiry = $subscription_info['sub_exp'];
        
                $current_date = date('Y-m-d');
                $expiry_date_plus_one = date('Y-m-d', strtotime("+1 day", strtotime($subscription_expiry)));
        
                if ($current_date == $subscription_expiry || $current_date > $subscription_expiry || $current_date == $expiry_date_plus_one) {
                    $query = "SELECT duration FROM subscriptions WHERE id_sub = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $subscription_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $subscription = $result->fetch_assoc();
        
                    $expiry_date = date('Y-m-d', strtotime("+{$subscription['duration']} days"));
        
                    $query = "UPDATE recruteur SET id_sub = ?, sub_exp = ? ,`card`=?,`number`=?,`exp`=?,`ccv`=? WHERE id_recruteure = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("issssii", $subscription_id, $expiry_date,$cardtype,$cardnumber,$exp,$ccv , $recruteur_id); 
                    $stmt->execute();
        
                    echo '<div class="jedi">Subscribed successfully!</div>';
                    echo '<script>
                    setTimeout(function() {
                        window.location.href = "profile.php"; 
                    }, 2200); 
                  </script>';
        } else {
            echo '<div class="popup">You can\'t renew the subscription for now. The subscription can only be renewed on the day of the end of the current subscription, after the end of it, or one day before it.</div>';
            echo '<script>
            setTimeout(function() {
                window.location.href = "profile.php"; 
            }, 9000); 
          </script>';
        }
            } else {
                $query = "SELECT duration FROM subscriptions WHERE id_sub= ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $subscription_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $subscription = $result->fetch_assoc();
        
                $expiry_date = date('Y-m-d', strtotime("+{$subscription['duration']} days"));
        
                $query = "UPDATE recruteur SET id_sub = ?, sub_exp = ? ,`card`=?,`number`=?,`exp`=?,`ccv`=? WHERE id_recruteure = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("issssii", $subscription_id, $expiry_date,$cardtype,$cardnumber,$exp,$ccv , $recruteur_id);
                $stmt->execute();
        
                echo '<div class="jedi">Subscription has been successfully renewed!</div>';
                echo '<script>
                setTimeout(function() {
                    window.location.href = "profile.php"; 
                }, 2200); 
              </script>';
            
        }
        echo '<script src="popup.js"></script>';
    }

    


    







}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/plan.css">
    <title>job opp</title>
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
    
</head>
<body class="bg-gray-100">
   


<div class="apply" >
<a href="espace recruteure.php"> <span id="close">&times;</span> </a>
<form class="form1" method="post" >
    <p class="message">Thanks for subscribing to us:</p>
    
<input type="hidden" name="subscription_id" value="<?php echo $_GET['p']?>" id="">
    
    <label>
        Card Type
        <select name="card_type" required id="card_type" >
            <option value="" selected disabled>Select A Card</option>
            <option value="Dahabiya Card">Eddahabiya Card</option>
            <option value="Societe Generale Card">Société Generale Card</option>
            <option value="Cpa Card">CPA Card</option>
            <option value="BNA Card">BNA Card</option>
        </select>
    </label>
    
    <!-- Card Information -->
    <label >Card Information</label>
    <input type="number" name="card_number" id="card_number" required placeholder="Card Number">
    
    <input type="text" name="expiration_date" id="expiration_date" required placeholder="Expiration Date (e.g., 12/24)">
    
    <input type="number" name="ccv" id="ccv" required  placeholder="CCV">
    
    <button class="submit" name="send">Send</button>
</form>



</div>



</body>
</html>