<?php
require('actions/database.php');
require('actions/securite.php');


$getQuestions = $bdd->prepare('
    SELECT q.*, u.nom, u.prenom 
    FROM question q
    JOIN users u ON q.idauteur = u.id
    WHERE q.idauteur = ?
    ORDER BY q.datepublication DESC
');
$getQuestions->execute([$_SESSION['id']]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'include/head.php'; ?>
    <style>
    :root {
        --primary: #4361ee;
        --light: #f8f9fa;
        --dark: #212529;
        --gray: #6c757d;
    }
    
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f7fa;
        line-height: 1.6;
    }
    
    .container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1rem;
    }
    
    .question-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        overflow: hidden;
    }
    
    .question-header {
        background: var(--primary);
        color: white;
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .question-title {
        font-size: 1.2rem;
        font-weight: 500;
        margin: 0;
    }
    
    .question-date {
        font-size: 0.9rem;
        opacity: 0.9;
    }
    
    .question-body {
        padding: 1.5rem;
    }
    
    .question-content {
        margin: 1rem 0;
        color: var(--dark);
        line-height: 1.7;
    }
    
    .answers-section {
        margin-top: 2rem;
        border-top: 1px solid #eee;
        padding-top: 1.5rem;
    }
    
    .answer {
        background: var(--light);
        border-left: 3px solid var(--primary);
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 0 4px 4px 0;
    }
    
    .answer-author {
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .answer-content {
        color: var(--dark);
        line-height: 1.6;
    }
    
    .no-answers {
        color: var(--gray);
        font-style: italic;
        text-align: center;
        padding: 1rem;
    }
    </style>
</head>
<body>
<br><br><br>
    <?php include 'include/navbar.php'; ?>

    <div class="container">
        <?php if (isset($_SESSION['id'])): ?>
            <?php if ($getQuestions->rowCount() > 0): ?>
                <?php while ($question = $getQuestions->fetch()): ?>
                    <div class="question-card">
                        <div class="question-header">
                            <h3 class="question-title"><?= htmlspecialchars($question['titre']) ?></h3>
                            <span class="question-date"><?= date('d/m/Y', strtotime($question['datepublication'])) ?></span>
                        </div>
                        
                        
                        <div class="question-body">
                            <div class="question-content">
                                <?= nl2br(htmlspecialchars($question['description'])) ?>
                            </div>
                            
                            <div class="answers-section">
                                <h4>Réponses</h4>
                                <?php
                                // Récupération des réponses (sans date)
                                $getAnswers = $bdd->prepare('
                                    SELECT r.contenu, u.nom, u.prenom 
                                    FROM reponse r
                                    JOIN users u ON r.idauteur = u.id
                                    WHERE r.idquestion = ?
                                    ORDER BY r.datepublication ASC
                                ');
                                $getAnswers->execute([$question['id']]);
                                
                                if ($getAnswers->rowCount() > 0):
                                    while ($answer = $getAnswers->fetch()):
                                ?>
                                        <div class="answer">
                                            <span class="answer-author">
                                                <?= htmlspecialchars($answer['prenom'] . ' ' . $answer['nom']) ?>
                                            </span>
                                            <div class="answer-content">
                                                <?= nl2br(htmlspecialchars($answer['contenu'])) ?>
                                            </div>
                                        </div>
                                <?php
                                    endwhile;
                                else:
                                ?>
                                    <div class="no-answers">Aucune réponse pour le moment</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="question-card">
                    <div class="question-body">
                        <p>Vous n'avez posé aucune question.</p>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="question-card">
                <div class="question-body">
                    <p>Veuillez vous connecter pour voir vos questions.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>