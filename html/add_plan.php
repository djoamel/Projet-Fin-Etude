<?php 
include_once "conection.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add_plan.css">
    <title>job opp</title>
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
    
</head>
<body class="bg-gray-100">
   


<div class="apply" >
<a href="admin.php"> <span id="close">&times;</span> </a>
<form class="form1" method="post" >
    <p class="message">Add plan:</p>
                    <label>
                        plan name
                        <input id="ln" class="input" type="text" placeholder="" required="" name="first">
                       
                    </label>
                    <label>
                        price
                        <input id="ln" class="input" type="number" placeholder="" required="" name="first">
                       
                    </label>
                    <label>
                        duration
                        <input id="ln" class="input" type="number" placeholder="" required="" name="first">
                       
                    </label>
                    <label>
                        max offers
                        <input id="ln" class="input" type="number" placeholder="" required="" name="first">
                       
                    </label>
                    <label>
                        details
                        <input id="ln" class="input" type="text" placeholder="" required="" name="first"><br><br>
                       
                        <input id="ln" class="input" type="text" placeholder="" required="" name="first"><br><br>
                       
                        <input id="ln" class="input" type="text" placeholder="" required="" name="first">
                       
                    </label>
    

    
    
    
    
    <button class="submit" name="send">Send</button>
</form>



</div>



</body>
</html>