<?php
require('actions/database.php'); 
session_start();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $idOfqst = htmlspecialchars($_GET['id']);
    
  
    $checkIfExists = $bdd->prepare('SELECT id, nomauteur, titre, contenu, description, datepublication, typeCancer, idauteur 
                              FROM question WHERE id = ?');    $checkIfExists->execute(array($idOfqst));
    
    if($checkIfExists->rowCount() > 0){
        $qstInfo = $checkIfExists->fetch();
        
        $question_title = $qstInfo['titre'];
        $question_content = $qstInfo['contenu'];
        $question_description = $qstInfo['description'];
        $question_date = $qstInfo['datepublication'];
        $question_typeCancer = $qstInfo['typeCancer'];
        $question_id_author = $qstInfo['idauteur'];
        $question_name_author = $qstInfo['nomauteur'];
        
 
    } else {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}