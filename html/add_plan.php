<?php 
include_once "conection.php";

session_start();







if (isset($_POST['send'])) {
    $plan_name = mysqli_real_escape_string($conn, $_POST['plan_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $max_offers = mysqli_real_escape_string($conn, $_POST['max_offers']);
    $detail_1 = mysqli_real_escape_string($conn, $_POST['detail_1']);
    $detail_2 = mysqli_real_escape_string($conn, $_POST['detail_2']);
    $detail_3 = mysqli_real_escape_string($conn, $_POST['detail_3']);

    // Insert into subscriptions table
    $query = "INSERT INTO subscriptions (name,price,duration, max_offres, c1, c2, c3) 
    VALUES (?,?,?,?,?,?,?)";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sdiiiss", $plan_name, $price, $duration, $max_offers, $detail_1, $detail_2, $detail_3);

    if ($stmt->execute()) {
        echo '<div class="jedi">Plan added successfully!</div>';
        echo '<script>
                setTimeout(function() {
                    window.location.href = "admin.php"; 
                }, 2500); 
              </script>';
    } else {
        echo '<div class="popup">Error adding plan: ' . $stmt->error . '</div>';
        echo '<script>
                setTimeout(function() {
                    window.location.href = "admin.php"; // Redirect to admin page
                }, 3000); 
              </script>';
    }

    echo '<script src="popup.js"></script>';
}

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
<form class="form1" method="post">
    <p class="message">Add plan:</p>
    <label>
        Plan Name
        <input id="ln" class="input" type="text" placeholder="Plan Name" required name="plan_name">
    </label>
    <label>
        Price
        <input id="ln" class="input" type="number" placeholder="Price" required name="price">
    </label>
    <label>
        Duration (days)
        <input id="ln" class="input" type="number" placeholder="Duration" required name="duration">
    </label>
    <label>
        Max Offers
        <input id="ln" class="input" type="number" placeholder="Max Offers" required name="max_offers">
    </label>
    <label>
        Details
        <input id="ln" class="input" type="text" placeholder="Detail 1" required name="detail_1"><br><br>
        <input id="ln" class="input" type="text" placeholder="Detail 2" required name="detail_2"><br><br>
        <input id="ln" class="input" type="text" placeholder="Detail 3"  name="detail_3">
    </label>
    <button class="submit" name="send">Send</button>
</form>




</div>



</body>
</html>