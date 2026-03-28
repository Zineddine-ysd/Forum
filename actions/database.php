<?php
try {
    $host = "sql213.infinityfree.com";
    $dbname = "if0_41101594_forum";
    $user = "if0_41101594";
    $password = "o9kZiLgsSPuXCq4";

    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

date_default_timezone_set('Africa/Algiers');
$bdd->exec("SET time_zone = '+01:00'");
?>
