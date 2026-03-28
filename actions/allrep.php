<?php require ('actions/database.php');


$getALL = $bdd->prepare('SELECT idauteur,nomauteur,idquestion,contenu FROM reponse WHERE idquestion=?  ORDER BY id DESC' );
$getALL->execute(array($idOfqst));
