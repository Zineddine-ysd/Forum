<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["auth"])) {
    header('Location: ../signin.php'); // Suppression de l'espace après 'Location'
    exit(); // Important pour arrêter l'exécution du script
}
?>
