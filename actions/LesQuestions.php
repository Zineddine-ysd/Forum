<?php
require('actions/database.php'); 
session_start();

$getAllMyQuestions = null; // Initialisation pour éviter l'erreur si l'utilisateur n'est pas connecté

if (isset($_SESSION['id'])) {
    $getAllMyQuestions = $bdd->prepare('SELECT id, titre, description FROM question WHERE idauteur=? ORDER BY id DESC');
    $getAllMyQuestions->execute(array($_SESSION['id']));
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'include/head.php'; ?>
</head>
<br><br>
<body>

    <?php include 'include/navbar.php'; ?>

    <div class="container mt-5">
    

        <?php if ($getAllMyQuestions && $getAllMyQuestions->rowCount() > 0) { ?>
            <?php while ($question = $getAllMyQuestions->fetch()) { ?>
                <div class="card shadow">
                    <h5 class="card-header">
                        <?php echo htmlspecialchars($question['titre']); ?>
                    </h5>
                    <div class="card-body">
                        <p class="card-text">
                            <?php echo nl2br(htmlspecialchars($question['description'])); ?>
                        </p>
                   
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="text-center">
               
            </div>
        <?php } ?>
    </div>

</body>
</html>
