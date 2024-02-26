<?php 
session_start();
if (isset($_POST['logout'])) {
    require('bdconnect.php'); // Assurez-vous que ce fichier est inclus ici

    $now = new DateTime();
    $lastLogout = $now->format('Y-m-d H:i:s');
    $sqlUpdateLogout = "UPDATE users SET last_logout_datetime = :lastLogout WHERE id_user_at = :userId";
    $stmt = $conn->prepare($sqlUpdateLogout);
    $stmt->bindParam(':lastLogout', $lastLogout);
    $stmt->bindParam(':userId', $_SESSION['id_user']);
    $stmt->execute();

    session_destroy();
    header('Location: index.php');
} 

 ?>