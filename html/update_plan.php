<?php

require 'conection.php'; 

if (isset($_POST['update'])) {
    $plan_id = mysqli_real_escape_string($conn, $_POST['plan_id']);
    $plan_name = mysqli_real_escape_string($conn, $_POST['plan_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $max_offres = mysqli_real_escape_string($conn, $_POST['max']);
    $detail_1 = mysqli_real_escape_string($conn, $_POST['dtl']);
    $detail_2 = mysqli_real_escape_string($conn, $_POST['c2']);
    $detail_3 = mysqli_real_escape_string($conn, $_POST['c3']);
    
    
    error_log("POST data: plan_id=$plan_id, plan_name=$plan_name, price=$price, duration=$duration, max_offres=$max_offres, detail_1=$detail_1, detail_2=$detail_2, detail_3=$detail_3");

    
    $query = "UPDATE subscriptions SET name = '$plan_name', price = '$price', duration = '$duration', max_offres = '$max_offres', c1 = '$detail_1', c2 = '$detail_2', c3 = '$detail_3' WHERE id_sub = '$plan_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<div class="jedi">Plan updated successfully!</div>';
        echo '<script>
                setTimeout(function() {
                    window.location.href = "admin.php"; 
                }, 2200); 
              </script>';
    } else {
        echo '<div class="popup">Error updating plan: ' . mysqli_error($conn) . '</div>';
        echo '<script>
                setTimeout(function() {
                    window.location.href = "admin.php"; // Redirect to admin page
                }, 2200); 
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
    <title>job opp</title>
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
    <link rel="stylesheet" href="../css/update.css">

</head>
<body>
    <div class="pht" >
        <img class="img" src="../images/upd.png" alt="">
    </div>
























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
