<?php 
include_once "conection.php";

session_start();




// Assume $conn is your database connection
require 'conection.php'; // Adjust the path as needed

if (isset($_GET['v'])) {
    $plan_id = $_GET['v'];

    // Retrieve plan details from the database
    $query = "SELECT * FROM subscriptions WHERE id_sub = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $plan_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $plan = $result->fetch_assoc();

    if ($plan) {
        // Plan found, populate the form with current details
    } else {
        echo "Plan not found.";
    }
} else {
    echo "No plan ID provided.";
}






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit_plan.css">
    <title>job opp</title>
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
    
</head>
<body class="bg-gray-100">
   


<div class="apply" >
<a href="admin.php"> <span id="close">&times;</span> </a>










<form class="form1" method="post" action="update_plan.php">
    <p class="message">Edit Plan:</p>
    <input type="hidden" name="plan_id" value="<?php echo $plan['id_sub']; ?>">
    <label>
        Plan Name
        <input id="ln" class="input" type="text" placeholder="Plan Name" required name="plan_name" value="<?php echo $plan['name']; ?>">
    </label>
    <label>
        Price
        <input id="ln" class="input" type="number" placeholder="Price" required name="price" value="<?php echo $plan['price']; ?>">
    </label>
    <label>
        Duration (days)
        <input id="ln" class="input" type="number" placeholder="Duration" required name="duration" value="<?php echo $plan['duration']; ?>">
    </label>
    <label>
        Max Offers
        <input id="ln" class="input" type="number" placeholder="Max Offers" required name="max" value="<?php echo $plan['max_offres']; ?>">
    </label>
    <label>
        Details
        <input id="ln" class="input" type="text" placeholder="Detail 1" required name="dtl" value="<?php echo $plan['c1']; ?>"><br><br>
        <input id="ln" class="input" type="text" placeholder="Detail 2" required name="c2" value="<?php echo $plan['c2']; ?>"><br><br>
        <input id="ln" class="input" type="text" placeholder="Detail 3" required name="c3" value="<?php echo $plan['c3']; ?>">
    </label>
    <button class="submit" name="update">Update</button>
</form>




       


</div>



</body>
</html>