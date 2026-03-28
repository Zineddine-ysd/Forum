<?php
require('actions/database.php');

if(isset($_POST['validate'])) {
    if(!empty($_POST['answer'])) {
        $user_answer = $_POST['answer']; // On évite nl2br ici

        $insertRep = $bdd->prepare('INSERT INTO reponse (idauteur, nomauteur, idquestion, contenu) VALUES (?, ?, ?, ?)');
        $insertRep->execute(array($_SESSION['id'], $_SESSION['firstname'], $idOfqst, $user_answer));
    }
}
