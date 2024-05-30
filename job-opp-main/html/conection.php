<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "joboppbased";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



