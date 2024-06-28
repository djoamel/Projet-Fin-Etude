<?php
include_once "conection.php";
session_start();

if (isset($_GET['id_offre'])) {
    $id_offre = $_GET['id_offre'];
    $query = "SELECT * FROM offre WHERE id_offre = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_offre);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $offer = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "Offer not found.";
        header("Location: profile.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: profile.php");
    exit();
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit_offre.css">
    <title>job opp</title>
    <link rel="shortcut icon" href="../images/Capture d’écran (7).png" type="image/x-icon">
    
</head>
<body class="bg-gray-100">
   


<div class="apply" >
<a href="profile.php"> <span id="close">&times;</span> </a>


<form class="form1" method="post" action="update_offre.php">
    <p class="message">Edit Offer:</p>
    <input type="hidden" name="id_offre" value="<?php echo $offer['id_offre']; ?>">
    <label>
        Company name
        <input class="input" type="text" required name="nom_entreprise" value="<?php echo $offer['nom_entreprise']; ?>">
    </label>
    <label>
        Phone number
        <input class="input" type="number" required name="tel_entreprise" value="<?php echo $offer['tel_entreprise']; ?>">
    </label>
    <label>
        Contract type
        <select class="contract" name="type_de_contrat" required>
            <option value="Permanent Contract" <?php if ($offer['type_de_contrat'] == 'Permanent Contract') echo 'selected'; ?>>PC (Permanent Contract)</option>
            <option value="Fixed term contract" <?php if ($offer['type_de_contrat'] == 'Fixed term contract') echo 'selected'; ?>>FTC (Fixed term contract)</option>
            <option value="Work study contract" <?php if ($offer['type_de_contrat'] == 'Work study contract') echo 'selected'; ?>>Work study contract</option>
            <option value="Studentjob" <?php if ($offer['type_de_contrat'] == 'Studentjob') echo 'selected'; ?>>Studentjob</option>
        </select>
    </label>
    <label>
        Offer type
        <select class="contract" name="naw3" required>
            <option value="special" <?php if ($offer['naw3'] == 'special') echo 'selected'; ?>>Special</option>
            <option value="simple" <?php if ($offer['naw3'] == 'simple') echo 'selected'; ?>>Simple</option>
        </select>
    </label>
    <label>
        Email address
        <input class="input" type="email" required name="email_entreprise" value="<?php echo $offer['email_entreprise']; ?>">
    </label>
    <label>
        Kind of worker
        <input class="input" type="text" required name="Kind_worker" value="<?php echo $offer['Kind_worker']; ?>">
    </label>
    <label>
        Description
        <textarea name="détaille_offre" required><?php echo $offer['détaille_offre']; ?></textarea>
    </label>
    <button class="submit" name="update">Update</button>
</form>


       


</div>



</body>
</html>