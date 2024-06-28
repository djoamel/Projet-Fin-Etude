<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job opp</title>
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
    <link rel="stylesheet" href="../css/thanks.css">
    
</head>
<body>

<div class="pht" >
        <img class="img" src="../images/thnks.png" alt="">
    </div>

    <div id="jedi">
        <p><?php echo isset($_SESSION['feedback']) ? $_SESSION['feedback'] : 'Feedback not received'; ?></p>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Show the message after 1 second
            setTimeout(function() {
                document.getElementById('jedi').style.display = 'block';
            }, 400);

            // Hide the message after 3 seconds
            setTimeout(function() {
                document.getElementById('jedi').style.display = 'none';
            }, 4000);

            // Redirect to the contact page after 4 seconds
            setTimeout(function() {
                window.location.href = 'contact.php';  // Change to your contact page URL
            }, 3000);
        });
    </script>
</body>
</html>
<?php
session_unset();
session_destroy();
?>
