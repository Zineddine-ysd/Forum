<?php
require('actions/database.php');
//validation du formulaire
if(isset($_POST['valide'])){

    //verification si les champs sont complets
    if(!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['mdp'])) {
        //donnees user
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        // Vérifier si l'utilisateur existe déjà
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT * FROM users WHERE nom=? AND prenom=?');
        $checkIfUserAlreadyExists->execute(array($user_lastname, $user_firstname));

        if($checkIfUserAlreadyExists->rowCount() == 0) {
            // Insérer l'utilisateur s'il n'existe pas
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(nom,prenom,mdp) VALUES(?,?,?)');
            $insertUserOnWebsite->execute(array($user_lastname, $user_firstname, $user_mdp));
          
            // Récupérer les informations de l'utilisateur pour la session
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, nom, prenom FROM users WHERE nom=? AND prenom=?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname));
        
            $usersInfos = $getInfosOfThisUserReq->fetch();
            
            //authentification 
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
        
            // redirection vers l'accueil 
            header('Location: ../index.php');
            exit();
        } else {
            $errorMSG = "Utilisateur existant";
        }

    } else {
        $errorMSG = "Veuillez insérer les données dans les champs";
    }
}
?>
