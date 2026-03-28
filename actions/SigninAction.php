<?php
session_start();
require('actions/database.php');

if(isset($_POST['valide'])){

    if(!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['mdp'])) {
        
        // Récupération des valeurs du formulaire
        $user_firstname = htmlspecialchars($_POST['firstname']); // Nom
        $user_lastname = htmlspecialchars($_POST['lastname']);   // Prénom
        $user_mdp = $_POST['mdp']; // Pas besoin de htmlspecialchars() sur le mot de passe

        // Vérification si l'utilisateur existe dans la base
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE nom = ? AND prenom = ?');
        $checkIfUserExists->execute(array($user_firstname, $user_lastname));

        if($checkIfUserExists->rowCount() > 0){
            $usersInfos = $checkIfUserExists->fetch();

            // Debugging : afficher les infos récupérées
            echo "Saisi : Nom = $user_firstname | Prénom = $user_lastname | MDP = $user_mdp <br>";
            echo "BDD : Nom = {$usersInfos['nom']} | Prénom = {$usersInfos['prenom']} | MDP Hash = {$usersInfos['mdp']} <br>";

            if(password_verify($user_mdp, $usersInfos['mdp'])){
                // Authentification réussie
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom']; 
                $_SESSION['firstname'] = $usersInfos['prenom']; 

                header('Location: ../index.php');
                exit();
            } else {
                $errorMSG = "Mot de passe incorrect !";
            }
        } else {
            $errorMSG = "Utilisateur non trouvé !";
        }
    } else {
        $errorMSG = "Veuillez remplir tous les champs.";
    }
}

if (isset($errorMSG)) {
    echo "<p style='color:red;'>$errorMSG</p>";
}
?>
