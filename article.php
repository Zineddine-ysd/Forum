<?php 
require('actions/showarticle.php'); 
require('actions/publierrep.php');
require('actions/allrep.php');
if(!isset($question_title)) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'include/head.php'; ?>
    <title><?= htmlspecialchars($question_title) ?> - OncoClinic</title>
    <style>
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }
        .question-content {
            white-space: pre-line;
            line-height: 1.8;
            font-size: 16px;
            color: #444;
        }
        .question-meta {
            color: #666;
            font-size: 14px;
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        .answer-section {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #f0f0f0;
        }
        .answer-form {
            background: #f9f9f9;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .answer-form textarea {
            min-height: 120px;
            resize: vertical;
        }
        .answer-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .answer-card:hover {
            transform: translateY(-3px);
        }
        .answer-card .card-header {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            font-weight: 600;
            color: #3a506b;
            display: flex;
            align-items: center;
        }
        .answer-card .card-body {
            padding: 20px;
            color: #555;
            line-height: 1.7;
        }
        .author-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: bold;
        }
        .answer-meta {
            font-size: 13px;
            color: #888;
            margin-top: 15px;
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <br><br><br>
    <?php include 'include/navbar.php'; ?>
    
    <div class="container mt-4">
        <?php if(isset($question_title)): ?>
            <h1 class="mb-4" style="color: #2c3e50; font-weight: 700;"><?= htmlspecialchars($question_title) ?></h1>
            
            <?php if(isset($question_typeCancer)): ?>
                <div class="badge mb-3" style="background: linear-gradient(to right, #ff758c, #ff7eb3); color: white;">
                    <?= htmlspecialchars($question_typeCancer) ?>
                </div>
            <?php endif; ?>
            
            <div class="question-content mb-4">
                <?= nl2br(htmlspecialchars($question_content)) ?>
            </div>
            
            <?php if(isset($question_description)): ?>
                <div class="card bg-light mb-4 border-0" style="box-shadow: 0 3px 10px rgba(0,0,0,0.05);">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #3a506b;">Description complémentaire</h5>
                        <p class="card-text"><?= nl2br(htmlspecialchars($question_description)) ?></p>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="question-meta">
    <div class="d-flex align-items-center">
        <div class="author-avatar me-2">
            <?= strtoupper(substr($question_name_author, 0, 1)) ?>
        </div>
        <div>
            Publié par <strong><?= htmlspecialchars($question_name_author) ?></strong> 
            le <?= date('d/m/Y à H:i', strtotime($question_date)) ?>
        </div>
    </div>
</div>
        <?php else: ?>
            <div class="alert alert-danger">
                Question introuvable ou erreur de chargement
            </div>
        <?php endif; ?>

        <!-- Section des réponses -->
        <section class="answer-section">
            <h4 class="mb-4" style="color: #2c3e50; font-weight: 600;">
                <i class="fas fa-comments me-2"></i> Réponses
                <span class="badge bg-primary rounded-pill ms-2"><?= $getALL->rowCount() ?></span>
            </h4>

            <!-- Formulaire de réponse -->
            <?php if(isset($_SESSION['id'])): ?>
                <div class="answer-form">
                    <form method="POST">
                        <div class="form-group mb-3">
                            <label class="form-label" style="font-weight: 500;">Votre réponse</label>
                            <textarea name="answer" class="form-control" placeholder="Partagez votre expertise..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="validate" style="background: linear-gradient(to right, #4776E6, #8E54E9); border: none;">
                            <i class="fas fa-paper-plane me-2"></i> Publier votre réponse
                        </button>
                    </form>
                </div>
            <?php else: ?>
                <div class="alert alert-info">
                    <a href="signin.php" class="alert-link">Connectez-vous</a> pour répondre à cette question.
                </div>
            <?php endif; ?>

            <!-- Liste des réponses -->
            <div class="answers-list">
                <?php while($answer = $getALL->fetch()): ?>
                    <div class="card answer-card mb-3">
                        <div class="card-header">
                            <div class="author-avatar">
                                <?= strtoupper(substr($answer['nomauteur'], 0, 1)) ?>
                            </div>
                            <?= htmlspecialchars($answer['nomauteur']) ?>
                        </div>
                        <div class="card-body">
                            <div class="answer-content">
                                <?= nl2br(htmlspecialchars($answer['contenu'])) ?>
                            </div>
                            <div class="answer-meta">
                                <i class="far fa-clock me-1"></i>
                                <?= date('d/m/Y à H:i', strtotime($answer['date_publication'] ?? 'now')) ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                <?php if($getALL->rowCount() === 0): ?>
                    <div class="text-center py-4">
                        <i class="far fa-comment-dots fa-3x mb-3" style="color: #ddd;"></i>
                        <p class="text-muted">Aucune réponse pour le moment. Soyez le premier à répondre !</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>

    
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>