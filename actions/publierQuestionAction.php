<?php 
require('actions/database.php');

if(isset($_POST['valide'])){ // Changé de 'validate' à 'valide'

    if(!empty($_POST['title']) && !empty($_POST['Decription']) && !empty($_POST['content']) && !empty($_POST['typeCancer'])){

        $question_title = $_POST['title'];
        $question_description = $_POST['Decription'];
        $question_content = $_POST['content'];
        $question_date = date('Y-m-d');
        $question_typeCancer = $_POST['typeCancer'];
        $question_id_author = $_SESSION['id'];
        $question_name_author = $_SESSION['firstname'];

        try {
            $insertQuestion = $bdd->prepare('INSERT INTO question(titre, contenu, description, typeCancer, datepublication, nomauteur, idauteur) 
            VALUES (?, ?, ?, ?, NOW(), ?, ?)');
$insertQuestion->execute(array(
$question_title,
$question_content,
$question_description,
$question_typeCancer,
$_SESSION['firstname'],
$_SESSION['id']
));
            $successMsg = "Votre message a été introduit avec succès";
        } catch(PDOException $e) {
            $errorMSG = "Erreur lors de l'insertion : " . $e->getMessage();
        }
    } else {
        $errorMSG = "Veuillez compléter tous les champs";
    }
}
